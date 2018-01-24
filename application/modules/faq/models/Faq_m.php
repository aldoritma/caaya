<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq_m extends CI_Model {

	function __construct() {

	}
	 function listfaq()
    {   
        $this->db->from('tbl_categoryfaq');
		$this->db->order_by("id", 'ASC');
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res->result_array();
        return false;
    }
     function listfaqdetail($idfaq)
    {   
        $this->db->from('tbl_faq');
        $this->db->where('catid', $idfaq);
        $this->db->order_by("id", 'DESC');
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res->result_array();
        return false;
    }

}