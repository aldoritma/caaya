<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Faq_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
	 function allfaq($per_page, $offset)
    {   
        if ($offset != 0) $offset = ($offset-1) * $per_page;
       	$this->db->select('a.id as idfaq,a.title,a.catid,a.description,a.created,b.id,b.title as titlefaq');
		$this->db->from('tbl_faq a');
		$this->db->join('tbl_categoryfaq b', 'a.catid=b.id','left');
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

	// insert faq
	function createfaq($input = '')
	{
		$create = $this->db->insert('tbl_faq', array(
			'title' => $input['title'],
			'catid' => $input['catcontent'],
			'description' => $input['description'],
			'created' => date('Y-m-d H:i:s')
		));
		
		return $create;
	}

	// update faq
	function update($id = '', $input = '')
	{

		$update = $this->db->update('tbl_faq', array(
			'title' => $input['title'],
			'catid' => $input['catcontent'],
			'description' => $input['description'],
			'created' => date('Y-m-d H:i:s')
		), 'id = '. $id);
		
		return $update;
	}

	function get_one($id = false)
	{

		$res = $this->db->get_where('tbl_faq', array('id' => $id));
		if ($res->num_rows() > 0) return $res->row_array();
		return false;

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

	function delfaq($id = false)
	{
		return $this->db->delete('tbl_faq', array('id'=>$id));
	}


	function allcat()
	{	
		$this->db->from('tbl_categoryfaq');
		$this->db->order_by("id", 'ASC');
		$res = $this->db->get();
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}

	function listcategory()
	{

		$roles = $this->db->get('tbl_categoryfaq')->result_array();
		foreach ($roles as $roles)
		{
			$dropdownlist[''] = 'Choose One';
			$dropdownlist[$roles['id']] = stripslashes(html_entity_decode($roles['title']));
		}
		
		return $dropdownlist;
	}


	function savecategory($input = '')
	{
		
		$create = $this->db->insert('tbl_categoryfaq', array(
			'title' => $input['catname'],
		));
		return $create;
	}

	
	function get_onecat($id = false)
	{
		$res = $this->db->get_where('tbl_categoryfaq', array('id' => $id));
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}

	function delcategory($id = false)
	{
		return $this->db->delete('tbl_categoryfaq', array('id'=>$id));
	}


	function updateCategory($id = false, $input = '')
	{
		$update = $this->db->update('tbl_categoryfaq', array(
			'title' => $input['catname'],
		), 'id ='. $id);
		return $update;
	}
}

/* End of file faq_m.php */
/* Location: ./application/modules/faq/models/faq_m.php */