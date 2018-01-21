<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Faq_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    


	 function allfaq($per_page, $offset)
    {   
        if ($offset != 0) $offset = ($offset-1) * $per_page;
       $this->db->select('a.id,a.title,a.catid,a.description,a.created,b.id,b.title as titlefaq');
		$this->db->from('tbl_faq a');
		$this->db->join('tbl_categoryfaq b', 'a.catid=b.id');
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



 //    function allfaq()
	// {	
	
	// 	$this->db->select('a.id,a.title,a.catid,a.description,a.created,b.id,b.title');
	// 	$this->db->from('tbl_faq a');
	// 	$this->db->join('tbl_categoryfaq b', 'a.catid=b.id');
	// 	$this->db->order_by("a.id", 'DESC');
	// 	$res = $this->db->get();
	// 	if ($res->num_rows() > 0) return $res->result_array();
	// 	return false;
	// }

	function all_news_datatables()
	{
		$order_column = array(
			'a.id',
			'a.title',
			'a.description',
			'b.catid',
			'a.created'
		);

		$query = array();
		$input = $this->input->post();
        $start  = $this->input->post('start', true);
        $length = $this->input->post('length', true);
        $draw   = (int)$this->input->post('draw', true);
        $order  = $this->input->post('order', true);
        
        $search= array_map('trim',$this->input->post('search', true));
        $search['value'] = strtolower($search['value']);

        $this->db->start_cache();

        $this->db->select('a.id,a.title,a.catid,a.description,a.created,b.id,b.title');
		$this->db->from('tbl_faq a');
		$this->db->join('tbl_categoryfaq b', 'a.catid=b.id');

        if(!is_null(trim($search['value'])) && !empty(trim($search['value']))){
        	$this->db->like('LOWER(a.title)', strtolower($search['value']), 'BOTH');
        }

    	if($order[0]['column'] == 7){
    		$order[0]['column'] = 8;
    	}

        if($this->input->post('catid')){
        	$cat = $this->input->post('catid', TRUE);
        	$this->db->where('b.catid', $cat);
        }

        $filtered = $this->db->count_all_results();
        $this->db->limit($length,$start);
        $this->db->stop_cache();
        $this->db->order_by($order_column[$order[0]['column']], $order[0]['dir']);

        $count = $this->db->query("SELECT * FROM tbl_faq");
        $query['totalRecords'] = $count->num_rows();
        $query['records'] = $this->db->get()->result_array();
	    $query['draw'] = $draw;
	    $query['filterRecords'] = $filtered;
	    $this->db->flush_cache();
	    $query['select']   = array();

		return $query;
	}

	function news_status_match($id, $publish_status){
		$this->db->where('id', $id);
		$this->db->where('publish', $publish_status);
		$this->db->from('tbl_product');
		$result = $this->db->count_all_results();

		if($result > 0) return TRUE;

		return FALSE;
	}

	function publish_news($id)
	{
		$this->db->where('id', $id);
		if($this->db->update('tbl_product', array('publish' => 'Y'))){
			return TRUE;
		}

		return FALSE;
	}

	function draft_news($id)
	{
		$this->db->where('id', $id);
		if($this->db->update('tbl_product', array('publish' => 'N'))){
			return TRUE;
		}

		return FALSE;
	}
	
	

	function total_row_data()
	{
		return $this->db->count_all_results('tbl_product');
	}

	// insert product
	function create($input = '', $image = '')
	{
		$url = $input['title'];
		$create = $this->db->insert('tbl_product', array(
			'title' => $input['title'],
			'price' => $input['price'],
			'stock' => $input['stock'],
			'url' => url_title($url, 'dash', true),
			'img' => isset($image) ? $image : "",
			'catid' => $input['catcontent'],
			'description' => $input['description'],
			'year' => date('Y'),
			'created' => date('Y-m-d H:i:s')
		));
		
		return $create;
	}

	// update news
	function update($id = '', $input = '', $image = '')
	{
		$url = $input['title'];
		$update = $this->db->update('tbl_product', array(
			'title' => $input['title'],
			'price' => $input['price'],
			'stock' => $input['stock'],
			'url' => url_title($url, 'dash', true),
			'img' => isset($image) ? $image : "",
			'catid' => $input['catcontent'],
			'description' => $input['description'],
			'year' => date('Y'),
			'created' => date('Y-m-d H:i:s')
		), 'id = '. $id);
		
		return $update;
	}

	

	
	function get_one($id = false)
	{

		$res = $this->db->get_where('tbl_product', array('id' => $id));
		if ($res->num_rows() > 0) return $res->row_array();
		return false;

	}

	function getidnews($imgid = false)
	{
		$res = $this->db->get_where('tbl_product', array('img' => $id));
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}


	function categoryid($id)
	{
		$roles = $this->db->get('tbl_category')->result_array();
		
		foreach ($roles as $roles)
		{
			$dropdownlist[''] = 'Choose One';
			$dropdownlist[$roles['catid']] = stripslashes(html_entity_decode($roles['cat']));
		}
		
		return $dropdownlist;
	}

	function get_image($id = FALSE)
	{
		$this->db->select('id,img');
		$this->db->from('tbl_product');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$res = $this->db->get();
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}


	function delnewsevent($id = false)
	{
		return $this->db->delete('tbl_product', array('id'=>$id));
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
			'cat' => $input['catname'],
		));
		return $create;
	}

	
	function get_onecat($id = false)
	{
		$res = $this->db->get_where('tbl_categoryfaq', array('catid' => $id));
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}

	function delcategory($id = false)
	{
		return $this->db->delete('tbl_categoryfaq', array('catid'=>$id));
	}


	function updateCategory($id = false, $input = '')
	{
		$update = $this->db->update('tbl_categoryfaq', array(
			'cat' => $input['catname'],
		), 'catid ='. $id);
		return $update;
	}
}

/* End of file newsevent_m.php */
/* Location: ./application/modules/newsevent/models/newsevent_m.php */