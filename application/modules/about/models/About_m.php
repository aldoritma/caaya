<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_m extends CI_Model {

	function __construct() {

	}

	 function about()
    {   
        $this->db->from('tbl_about');
		$this->db->order_by("id", 'DESC');
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res->result_array();
        return false;
    }
     function listslider($idslider)
    {   
        $this->db->from('tbl_aboutslide');
        $this->db->where('aboutid', $idslider);
        $this->db->order_by("id", 'ASC');
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res->result_array();
        return false;
    }


}