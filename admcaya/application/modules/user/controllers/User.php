<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('global_m', 'user_m'));
		$this->template->set_layout('dashboard');
	}
	
	function index()
	{
		$slug = 'list-user';
		
		// Check is menu active or not
		if ( ! $this->global_m->is_menu_active($slug)) show_error('This menu is not activated, '.anchor(base_url('dashboard'), 'Back to dashboard'));
		
		if ($this->data['admin']['level'] != 'admin')
		{
			if ( ! $this->data['is_allowed'] = $this->global_m->is_roles_allowed($this->data['admin']['level'], $slug)) show_error('Your role is denied for accessing this page, '.anchor(base_url('dashboard'), 'Back to dashboard'));
			//var_dump($this->data['is_allowed']); exit;
		}
		
		$this->data['user'] = $this->user_m->all();	
		$this->template->append_metadata('<script src="'. base_url(). 'user/asset/user.js"></script>');
		$this->template->build('default', $this->data);
	}
	
	function add()
	{
		if ($this->data['admin']['level'] !== "admin") show_error('Your role is denied for accessing this page, '.anchor(base_url('dashboard'), 'Back to dashboard'));
		$this->data['data_roles'] = $this->user_m->data_roles();
		$this->data['category'] = $this->user_m->get_category();
		$this->template->build('create', $this->data);
	}
	
	function edit($user_id = false)
	{

		if ($this->data['admin']['level'] !== "admin") show_error('Your role is denied for accessing this page, '.anchor(base_url('dashboard'), 'Back to dashboard')); 
			$this->data['data_roles'] = $this->user_m->data_roles();
			$this->data['user'] = $this->user_m->get_one($user_id);
			$this->template->build('edit', $this->data);
		
	}
	
	function create()
	{
		if (is_ajax)
		{
			// fullname
			$this->form_validation->set_rules('fullname', 'Fullname','trim|required|ucwords|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// username
			$this->form_validation->set_rules('username', 'Username','trim|required|xss_clean|is_unique[tbl_users.username]|max_length[50]');
			// email
			$this->form_validation->set_rules('email', 'Email','trim|valid_email|xss_clean|is_unique[tbl_users.email]');
			// password
			$this->form_validation->set_rules('password', 'Password','trim|required|xss_clean');
			// roles
			$this->form_validation->set_rules('roles', 'Roles','trim|required|xss_clean');
			
			
			if ($this->form_validation->run($this))
			{
				if ($this->authentication->create($this->input->post(NULL, TRUE)))
				{
					// Flash message
					$this->session->set_flashdata('success', 'User has been added successful.');
					
					$response = array(
						'status'=>'success',
						'message'=>'User has been added successful.',
					);
				}
				else
				{
					$response = array(
						'status'=>'error',
						'message'=>'There is something went wrong.',
					);
				}
			}
			else
			{
				$response = array(
					'status'=>'error',
					'message'=> array(
						'fullname' => form_error('fullname'),
						'username' => form_error('username'),
						'email' => form_error('email'),
						'password' => form_error('password'),
						'roles' => form_error('roles'),
					)	
				);
			}
			
			echo json_encode($response);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}
	
	
	
	function update($user_id = false)
	{
		if (is_ajax)
		{
			// fullname
			$this->form_validation->set_rules('fullname', 'Fullname','trim|required|ucwords|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// email
			$this->form_validation->set_rules('email', 'Email','trim|valid_email|xss_clean|callback_is_email_exists['.$user_id.']');
			// username
			$this->form_validation->set_rules('username', 'Username','trim|required|xss_clean|max_length[50]');

			// telephone
			$this->form_validation->set_rules('telephone', 'Phone Number','trim|required|numeric|min_length[5]|max_length[15]');

			// password
			$this->form_validation->set_rules('password', 'Password','trim|xss_clean');
			// roles
			$this->form_validation->set_rules('roles', 'Roles','trim|required|xss_clean');
			// blocking
			$this->form_validation->set_rules('block', 'Block Access','trim|required|xss_clean');
			
			if ($this->form_validation->run($this))
			{
				$this->data['user'] = $this->user_m->get_one($user_id);
				
				if ($this->user_m->update($user_id, $this->data['user']['password'], $this->input->post(NULL, TRUE)))
				{
					$this->session->set_flashdata('update_success', 'User has been Update successful.');
					$response = array(
						'status'=>'success',
						'message'=>'User data has been updated.',
					);
				}
				else
				{
					$response = array(
						'status'=>'error',
						'message'=>'There is something went wrong.',
					);
				}
			}
			else
			{
				$response = array(
					'status'=>'error',
					'message'=> array(
						'fullname' => form_error('fullname'),
						'telephone' => form_error('telephone'),
						'email' => form_error('email'),
						'username' => form_error('username'),
						'password' => form_error('password'),
						'roles' => form_error('roles'),
					)	
				);
			}
			
			echo json_encode($response);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}

	public function is_email_exists($email,$userid)
	{
		if ($this->user_m->email_exist($email, $userid))
		{
			$this->form_validation->set_message('is_email_exists', 'Email already exist');
			return FALSE;
		}
		else
		{
			return true;
		}
	}
	
	function roles()
	{
		$slug = 'roles';
		
		// Check is menu active or not
		if ( ! $this->global_m->is_menu_active($slug)) show_error('This menu is not activated, '.anchor(base_url('dashboard'), 'Back to dashboard'));
		
		if ($this->data['admin']['level'] != 'admin')
		{
			if ( ! $this->data['is_allowed'] = $this->global_m->is_roles_allowed($this->data['admin']['level'], $slug)) show_error('Your role is denied for accessing this page, '.anchor(base_url('dashboard'), 'Back to dashboard'));
			//var_dump($this->data['is_allowed']); exit;
		}
		
		$this->data['roles'] = $this->user_m->roles_list();
		
		if ($this->data['roles'])
		{
			foreach ($this->data['roles'] as $key => $val)
			{
				$this->data['roles'][$key]['permission'] = $this->user_m->roles_permission($val['type_slug']);
			}
		}
		
		$this->template->append_metadata('<script src="'. base_url(). 'user/asset/user.js"></script>');
		$this->template->build('roles', $this->data);
	}
	
	function add_roles()
	{

		$this->data['data_roles'] = $this->user_m->data_roles();
		$this->data['category'] = $this->user_m->get_category();
		$this->template->build('roles_create', $this->data);
	}
	
	function create_roles()
	{
		if (is_ajax)
		{
			// roles name
			$this->form_validation->set_rules('roles', 'Roles Name','trim|required|xss_clean');
			
			if ($this->form_validation->run($this))
			{
				if ($this->user_m->create_roles($this->input->post(NULL, TRUE)))
				{
					$this->user_m->create_roles_permission($this->input->post(NULL, TRUE));
					
					$response = array(
						'status'=>'success',
						'message'=>'New roles has been added.',
					);
				}
				else
				{
					$response = array(
						'status'=>'error',
						'message'=>'There is something went wrong.',
					);
				}
			}
			else
			{
				$response = array(
					'status'=>'error',
					'message'=> array(
						'name' => form_error('name'),
					)	
				);
			}
			
			echo json_encode($response);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}
	
	function add_roles_permission()
	{

		if ($this->data['admin']['level'] !== "admin") show_error('Your role is denied for accessing this page, '.anchor(base_url('dashboard'), 'Back to dashboard'));		
		$this->data['data_roles'] = $this->user_m->data_roles();
		$this->data['category'] = $this->user_m->get_category();
		$this->template->build('roles_permission_create', $this->data);
	}
	
	function create_roles_permission()
	{
		if (is_ajax)
		{
			// roles name
			$this->form_validation->set_rules('roles', 'Roles Name','trim|required|xss_clean');
			// permission
			$this->form_validation->set_rules('category_id[]', 'Category','trim|xss_clean');
			
			if ($this->form_validation->run($this))
			{
				if ($this->user_m->create_roles_permission($this->input->post(NULL, TRUE)))
				{
					// Flash message
					$this->session->set_flashdata('success', 'Permission has been added successful.');
					
					$response = array(
						'status'=>'success',
						'message'=>'Permission has been added successful.',
					);
				}
				else
				{
					$response = array(
						'status'=>'error',
						'message'=>'There is something went wrong.',
					);
				}
			}
			else
			{
				$response = array(
					'status'=>'error',
					'message'=> array(
						'name' => form_error('name'),
					)	
				);
			}
			
			echo json_encode($response);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}
	
	function edit_roles($roles_id = false)
	{
		
		$this->data['data_roles'] = $this->user_m->data_roles();
		$this->data['roles'] = $this->user_m->get_one_roles($roles_id);
		$this->data['current_permission'] = $this->user_m->current_permission($this->data['roles']['type_slug']);
		$this->data['category'] = $this->user_m->get_category();
		$this->template->build('roles_edit', $this->data);
	}
	
	function update_roles_permission()
	{
		if (is_ajax)
		{
			// roles name
			$this->form_validation->set_rules('roles', 'Roles Name','trim|required|xss_clean');
			
			if ($this->form_validation->run($this))
			{
				// Insert new permisssion if any new
				if (isset($_POST['category_id']))
				{
					$this->user_m->create_roles_permission($this->input->post(NULL, TRUE));
				}

				$this->session->set_flashdata('success', 'Role has been update successful.');
				
				$response = array(
					'status'=>'success',
					'message'=>'Roles permission has been updated.',
				);
			}
			else
			{
				$response = array(
					'status'=>'error',
					'message'=> array(
						'name' => form_error('name'),
						'data_table'=>$res,
					),
						
				);
			}
			
			echo json_encode($response);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}
	
	function account_setting()
	{

		$this->data['user'] = $this->user_m->get_one($this->data['admin']['id_user']);
		$this->data['data_roles'] = $this->user_m->data_roles();
		$this->data['category'] = $this->user_m->get_category();
		$this->template->build('account_setting', $this->data);
		
	}
	
	function account_setting_post()
	{
		if (is_ajax)
		{
			// fullname
			$this->form_validation->set_rules('fullname', 'Fullname','trim|required|ucwords|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// username
			$this->form_validation->set_rules('username', 'Username','trim|required|xss_clean');

			// telephone
			$this->form_validation->set_rules('telephone', 'Phone Number','trim|required|numeric|max_length[15]');

			// password
			$this->form_validation->set_rules('password', 'Password','trim|xss_clean');
			
			
			if ($this->form_validation->run($this))
			{
				$this->data['user'] = $this->user_m->get_one($this->data['admin']['id_user']);
				
				if ($this->user_m->account_setting_update($this->data['admin']['id_user'], $this->data['admin']['password'], $this->input->post(NULL, TRUE), $this->data['admin']['level']))
				{
					// Flash message
					$this->session->set_flashdata('update_success', 'Account has been update successful.');
					
					$response = array(
						'status'=>'success',
						'message'=>'Account has been update successful.',
					);
				}
				else
				{
					$response = array(
						'status'=>'error',
						'message'=>'There is something went wrong.',
					);
				}
			}
			else
			{
				$response = array(
					'status'=>'error',
					'message'=> array(
						'fullname' => form_error('fullname'),
						'username' => form_error('username'),
						'telephone' => form_error('telephone'),
						'password' => form_error('password'),
						'roles' => form_error('roles'),
					)	
				);
			}
			
			echo json_encode($response);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}
	
	function delete_roles_permission($id = false)
	{
		if (is_ajax)
		{
			if ($this->user_m->delete_roles_permission($id))
			{
				$this->db->insert('tbl_log', array(
					'username' => $this->data['admin']['nama_lengkap'],
					'activity_type' => 'delete roles permission',
					'account_type' => 'admin',
					'level' => $this->data['admin']['level'],
					'status' => 'success',
					'message' => '',
					'ip_address' => $this->input->ip_address(),
					'user_agent' => $this->input->user_agent(),
					'created' => date('Y-m-d H:i:s')
				));
				
				$response = array('status'=>'success', 'message'=>'News in category has been deleted.');
			}
			else
			{
				$this->db->insert('tbl_log', array(
					'username' => $this->data['admin']['nama_lengkap'],
					'activity_type' => 'delete roles permission',
					'account_type' => 'admin',
					'level' => $this->data['admin']['level'],
					'status' => 'failed',
					'message' => '',
					'ip_address' => $this->input->ip_address(),
					'user_agent' => $this->input->user_agent(),
					'created' => date('Y-m-d H:i:s')
				));
				
				$response = array('status'=>'errro', 'message'=>'Delete news in category failed');
			}
		}
		else
		{
			show_error('No direct script access allowed');
		}
		
		echo json_encode($response);
	}


	function addroles()
	{
		if (is_ajax)
		{
			// roles
			$this->form_validation->set_rules('rolesname', 'rolesname','trim|required|ucwords|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');

			if ($this->form_validation->run($this))
			{
				if ($this->user_m->addrolescat($this->input->post(NULL, TRUE)))
				{
					// Flash message
					$this->session->set_flashdata('success', 'Roles has been added successful.');
					
					$response = array(
						'status'=>'success',
						'message'=>'Roles has been added successful.',
					);
				}
				else
				{
					$response = array(
						'status'=>'error',
						'message'=>'There is something went wrong.',
					);
				}
			}
			else
			{
				$response = array(
					'status'=>'error',
					'message'=> array(
						'rolesname' => form_error('rolesname'),
					)	
				);
			}
			
			echo json_encode($response);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}

	function is_unique($str, $field)
    {
        sscanf($field, '%[^.].%[^.]', $table, $field);
        return is_object($this->CI->db)
            ? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() === 0)
            : FALSE;
    }
	
	
}

/* End of file user.php */
/* Location: ./application/modules/controllers/user.php */