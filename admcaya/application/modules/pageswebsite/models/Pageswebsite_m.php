<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Pageswebsite_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
	 function allabout($per_page, $offset)
    {   
        if ($offset != 0) $offset = ($offset-1) * $per_page;
        $this->db->from('tbl_about a');
		$this->db->order_by("a.id", 'DESC');
        $this->db->limit($per_page, $offset);
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res->result_array();
        return false;
    }

    function total_data()
	{
		return $this->db->count_all_results('tbl_faq');
	}

	// insert about
	function create($input = '',$image = '')
	{
		$create = $this->db->insert('tbl_about', array(
			'title' => $input['title'],
			'img' => isset($image) ? $image : "",
			'description' => $input['description'],
			'created' => date('Y-m-d H:i:s')
		));
		
		return $create;
	}

	// update faq
	function update($id = '', $input = '',$image = '')
	{
		$update = $this->db->update('tbl_about', array(
			'title' => $input['title'],
			'img' => isset($image) ? $image : "",
			'description' => $input['description'],
			'created' => date('Y-m-d H:i:s')
		), 'id = '. $id);
		
		return $update;
	}

	function get_image($id = FALSE)
	{
		$this->db->select('id,img');
		$this->db->from('tbl_about');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$res = $this->db->get();
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}


	function get_one($id = false)
	{

		$res = $this->db->get_where('tbl_about', array('id' => $id));
		if ($res->num_rows() > 0) return $res->row_array();
		return false;

	}
	function delabout($id = false)
	{
		return $this->db->delete('tbl_about', array('id'=>$id));
	}	

	function categoryid($id)
	{
		$roles = $this->db->get('tbl_categoryfaq')->result_array();
		
		foreach ($roles as $roles)
		{
			$dropdownlist[''] = 'Choose One';
			$dropdownlist[$roles['id']] = stripslashes(html_entity_decode($roles['title']));
		}
		
		return $dropdownlist;
	}

	function allslide($id,$per_page, $offset)
    {   
        if ($offset != 0) $offset = ($offset-1) * $per_page;
        $this->db->from('tbl_aboutslide');
        $this->db->where('aboutid', $id);
		$this->db->order_by("id", 'DESC');
        $this->db->limit($per_page, $offset);
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res->result_array();
        return false;
    }

    function total_dataslide($id = false)
	{
		$this->db->where('aboutid', $id);
		return $this->db->count_all_results('tbl_aboutslide');
	}


	function saveslide($id,$input = '')
	{
		
		$create = $this->db->insert('tbl_aboutslide', array(
			'aboutid' => $id,
			'description' => $input['description'],
			'created' => date('Y-m-d H:i:s'),
		));
		return $create;
	}

	
	function get_about($id = false)
	{
		$res = $this->db->get_where('tbl_aboutslide', array('aboutid' => $id));
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}

	function get_aboutid($id = false)
	{
		$res = $this->db->get_where('tbl_aboutslide', array('id' => $id));
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}

	function delslideall($id = false)
	{
		return $this->db->delete('tbl_aboutslide', array('aboutid'=>$id));
	}

	function delslide($id = false)
	{
		return $this->db->delete('tbl_aboutslide', array('id'=>$id));
	}


	function updateSlide($id = false, $input = '')
	{
		$update = $this->db->update('tbl_aboutslide', array(
			'description' => $input['description'],
		), 'id ='. $id);
		return $update;
	}
}

/* End of file faq_m.php */
/* Location: ./application/modules/faq/models/faq_m.php */