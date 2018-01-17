<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class User_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function all($sort_type = 'asc', $sort_by = 'nama_lengkap')
	{
		$this->db->select('id_user, username, nama_lengkap, email, foto, level, blokir');
		$this->db->from('tbl_users');
		$this->db->order_by($sort_by, $sort_type);
		
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}
	
	function get_one($user_id = false)
	{
		$this->db->select('id_user, username, nama_lengkap, email, no_telp, password, foto, level, blokir');
		$this->db->from('tbl_users');
		$this->db->where('id_user', $user_id);
		
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->row_array();
		return false;	
	}
	
	function data_roles()
	{
		$roles = $this->db->get('tbl_usertype')->result_array();
		
		foreach ($roles as $roles)
		{
			$dropdownlist[''] = 'Choose One';
			$dropdownlist[$roles['type_slug']] = ucwords($roles['type_name']);
		}
		
		return $dropdownlist;
	}
	
	function update($user_id = false, $current_password = '', $input = '')
	{
		$update = $this->db->update('tbl_users', array(
			'username'		=> $input['username'],
			'password' 		=> isset($input['password']) && trim($input['password']) != "" ? md5(sha1($input['password'] . $this->config->item('password_key', 'auth'))) : $current_password,
			'nama_lengkap' 	=> $input['fullname'],
			'email' 		=> $input['email'],
			'username'		=> $input['username'],
			'no_telp'		=> $input['telephone'],
			'level'			=> $input['roles'],
			'blokir'		=> $input['block']
		), 'id_user ='. $user_id);
		
		return $update;
	}
	
	function email_exist($email = '', $user_id = '')
	{
		$this->db->select('email');
		$this->db->from('tbl_users');
		$this->db->where(array('email'=>$email, 'id_user !='=>$user_id));
		$this->db->limit(1);
		
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return true;
		return false;
	}
	
	function roles_list()
	{
		$res = $this->db->get('tbl_usertype');
		
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}
	
	function create_roles($input = '')
	{
		$create = $this->db->insert('tbl_usertype', array(
			'type_name' => $input['roles'],
			'type_slug' => url_title($input['roles'], 'dash', true),
		));
	}
	
	function create_roles_permission($input = '')
	{
		for ($i = 0; $i < count($input['category_id']); $i++)
		{
			$data_post = array(
				'roles' => $input['roles'],
				'menu_id' => $input['category_id'][$i],
			);
			
			$insert = $this->db->insert('tbl_rolespermission', $data_post);
		}
		
		return $insert;
	}
	
	function get_one_roles($roles_id = '')
	{
		$res = $this->db->get_where('tbl_usertype', array('type_id'=>$roles_id));
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}
	
	function update_roles($roles_id = false, $input = '')
	{
		$update = $this->db->update('tbl_usertype', array(
			'type_name' => $input['name'],
		), 'type_id ='. $roles_id);
		
		return $update;
	}
	
	function get_category($parent_id = '')
	{
		$data = array();
		
		$this->db->select('id, parent_id, title');
		$this->db->from('tbl_menuwebsite');
		$this->db->where(array('parent_id'=>$parent_id, 'app'=>'back-end', 'is_active'=>1));
		$this->db->order_by('sort', 'asc');
		
		$result = $this->db->get();
	
		foreach ($result->result() as $row)
		{
			$data[] = array(
				'id' => $row->id,
				'title'	=> $row->title,
				// show child category if available
				'child'	=> $this->get_category($row->id)
			);
		}
		return $data;
	}
	
	function account_setting($user_id = false)
	{
		$this->db->select('id_user, username, nama_lengkap, email, no_telp, password, foto, level, blokir');
		$this->db->from('tbl_users');
		$this->db->where('id_user', $user_id);
		
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->row_array();
		return false;	
	}
	
	function account_setting_update($user_id = false, $current_password = '', $input = '', $current_roles)
	{
		$update = $this->db->update('tbl_users', array(
			'nama_lengkap'		=> $input['fullname'],
			'password' 		=> isset($input['password']) && trim($input['password']) != "" ? md5(sha1($input['password'] . $this->config->item('password_key', 'auth'))) : $current_password,
			'username'		=> $input['username'],
			'no_telp'		=> $input['telephone'],
			'level'			=> isset($input['roles']) ? $input['roles'] : $current_roles,
		), 'id_user ='. $user_id);
		
		return $update;
	}
	
	function roles_permission($roles = '')
	{
		$this->db->select('b.url');
		$this->db->from('tbl_rolespermission a');
		$this->db->join('tbl_menuwebsite b', 'b.id = a.menu_id');
		$this->db->where('a.roles', $roles);
		
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}
	
	function current_permission($roles = '')
	{
		$this->db->select('a.id, a.menu_id, b.title');
		$this->db->from('tbl_rolespermission a');
		$this->db->join('tbl_menuwebsite b', 'b.id = a.menu_id');
		$this->db->where('a.roles', $roles);
		
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}
	
	function delete_roles_permission($id = false)
	{
		$delete = $this->db->delete('tbl_rolespermission', array('id'=>$id));
		
		return $delete;
	}

	function addrolescat($input = '')
	{
		$create = $this->db->insert('tbl_usertype', array(
			'type_name' => $input['rolesname'],
			'type_slug' => $input['rolesname'],
			'type_date' => date('Y-m-d H:i:s'),
		));
		
		return $create;

	}

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */