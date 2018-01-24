<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Home_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
	 function alllist($per_page, $offset)
    {   
        if ($offset != 0) $offset = ($offset-1) * $per_page;
       $this->db->select('a.id,a.title,a.subtitle,a.subtitle2,a.description,a.created');
		$this->db->from('tbl_home a');
		$this->db->order_by("a.id", 'DESC');
        $this->db->limit($per_page, $offset);
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res->result_array();
        return false;
    }

    function total_data()
	{
		return $this->db->count_all_results('tbl_home');
	}

	// update data
	function update($id = '', $input = '')
	{

		$update = $this->db->update('tbl_home', array(
			'title' => $input['title'],
			'subtitle' => $input['subtitle'],
			'subtitle2' => $input['subtitle2'],
			'description' => $input['description'],
			'created' => date('Y-m-d H:i:s')
		), 'id = '. $id);
		
		return $update;
	}

	function get_one($id = false)
	{

		$res = $this->db->get_where('tbl_home', array('id' => $id));
		if ($res->num_rows() > 0) return $res->row_array();
		return false;

	}

}

/* End of file faq_m.php */
/* Location: ./application/modules/faq/models/faq_m.php */