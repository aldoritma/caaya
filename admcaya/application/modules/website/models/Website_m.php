<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Website_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function get_identity()
	{
		$this->db->order_by('id_identitas', 'desc');
		$this->db->limit(1);
		
		$res = $this->db->get('identitas');
		
		if ($res->num_rows() > 0) return $res->row_array();
		return false;	
	}
	
	
	function total_menu($uri_menu_type)
	{	
		$this->db->where('app', $uri_menu_type);
		return $this->db->count_all_results('tbl_menuwebsite');
	}
	
	function get_menu($uri_menu_type, $per_page, $offset)
	{	
		if ($offset != 0) $offset = ($offset-1) * $per_page;
		
		$this->db->select('*');
		$this->db->from('tbl_menuwebsite');
		$this->db->where('app', $uri_menu_type);
		$this->db->limit($per_page, $offset);
		$this->db->order_by('id', 'asc');
		$this->db->order_by('sort', 'asc');
		
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}
	
	function navigation_option($app = '')
	{
		$this->db->where('app', $app);
		$navigation = $this->db->get('tbl_menuwebsite')->result_array();
		
		if ($navigation)
		{
			foreach ($navigation as $nav)
			{
				$dropdownlist[0] = "Main Navigation";
				$dropdownlist[$nav['id']] = $nav['title'];
			}
		}
		else
		{
			$dropdownlist[0] = "Main Navigation";
		}
		
		return $dropdownlist;
	}
	
	function get_parent($app_menu = '', $id = '')
	{
		$this->db->select('parent_id, title');
		$this->db->from('tbl_menuwebsite');
		$this->db->where(array('app'=>$app_menu, 'id'=>$id));
		
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}
	
	function get_category()
	{
		$this->db->where('aktif', 'Y');
		$category = $this->db->get('kategori')->result_array();
		
		foreach ($category as $cat)
		{
			$dropdownlist[0] = "Choose One";
			$dropdownlist[$cat['kategori_seo']] = $cat['nama_kategori'];
		}
		
		return $dropdownlist;
	}
	
	
	
	function navigation_create($input = '')
	{
		$create = $this->db->insert('tbl_menuwebsite', array(
			'parent_id' => $input['parent_id'],
			'icon' => isset($input['icon']) ? $input['icon'] : "",
			'dropdown' => isset($input['is_dropdown']) ? $input['is_dropdown'] : "",
			'title' => $input['title'],
			'slug' => url_title($input['title'], 'dash', TRUE),
			'url' => $input['url'],
			'app' => $input['app_menu'],
		));
		
		return $create;
	}
	
	function get_one_navigation($id = '')
	{	
		$this->db->select('*');
		$this->db->from('tbl_menuwebsite');
		$this->db->where('id', $id);
		$this->db->limit(1);
		
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}
	
	function navigation_update($navi_id = '', $input = '')
	{
		$update = $this->db->update('tbl_menuwebsite', array(
			'parent_id' => $input['parent_id'],
			'icon' => isset($input['icon']) ? $input['icon'] : "",
			'dropdown' => isset($input['is_dropdown']) ? $input['is_dropdown'] : "",
			'title' => $input['title'],
			'slug' => url_title($input['title'], 'dash', TRUE),
			'url' => $input['url'],
			'app' => $input['app_menu'],
			'is_active' => isset($input['is_active']) ? $input['is_active'] : 0,
		), 'id ='. $navi_id);
		
		return $update;
	}
	
	function get_slug_parent($id = '')
	{
		$slug_parent = $this->db->get_where('tbl_menuwebsite', array('id'=>$id));
		
		if ($slug_parent->num_rows() > 0)
		{
			return $slug_parent->row_array();
		}
		else
		{
			return FALSE;
		}
	}
	
}

/* End of file website_m.php */
/* Location: ./application/modules/website/models/website_m.php */