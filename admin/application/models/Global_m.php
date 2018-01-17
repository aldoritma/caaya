<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Global_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function get_menu($parent_id = '', $roles = '')
	{
		$data = array();
		$this->db->select('DISTINCT m.id, m.parent_id, m.title, m.slug, m.url, m.dropdown, m.icon', false);
		$this->db->from('tbl_menuwebsite m');
		
		if ($roles !== 'admin')
		{
			$this->db->join('tbl_rolespermission p', 'p.menu_id = m.id', 'left');
			$this->db->where(array('parent_id'=>$parent_id, 'app'=>'back-end', 'is_active'=>1, 'p.roles'=>$roles));
		}
		else
		{
			$this->db->where(array('parent_id'=>$parent_id, 'app'=>'back-end', 'is_active'=>1));
		}
		
		// $this->db->order_by('sort', 'asc');
		
		$result = $this->db->get();
	
		foreach ($result->result() as $row)
		{
			$data[] = array(
				'id' => $row->id,
				'title'	=> $row->title,
				'slug' => $row->slug,
				'url' => $row->url,
				'icon' => $row->icon,
				'dropdown' => $row->dropdown,
				'child'	=> $this->get_menu($row->id, $roles),
				'deep_child' => $this->get_menu($row->id, $roles)
			);
		}
		return $data;
	}
	
	function is_roles_allowed($roles = '', $slug)
	{
		$this->db->select('m.slug');
		$this->db->from('tbl_rolespermission rp');
		$this->db->join('tbl_menuwebsite m', 'm.id = rp.menu_id', 'left');
		$this->db->where(array('rp.roles'=>$roles, 'm.url'=>$slug));
			
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}
	
	function is_menu_active($slug = '')
	{
		$this->db->select('url');
		$this->db->from('tbl_menuwebsite');
		$this->db->where(array('url'=>$slug, 'is_active'=>1));
			
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}
	
	function get_identity()
	{
		$this->db->order_by('id_identitas', 'desc');
		$this->db->limit(1);
		$res = $this->db->get('identitas');
		if ($res->num_rows() > 0) return $res->row_array();
		return false;	
	}
	

}

/* End of file global_m.php */
/* Location: ./application/models/global_m.php */