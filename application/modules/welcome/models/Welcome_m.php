<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_m extends CI_Model {

	function __construct() {

	}

	function homeone()
    {   
        $this->db->from('tbl_home');
        $this->db->where('id', '1');
        $this->db->order_by("id", 'ASC');
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res->row_array();
        return false;
    }
    function hometwo()
    {   
        $this->db->from('tbl_home');
        $this->db->where('id', '2');
        $this->db->order_by("id", 'ASC');
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res->row_array();
        return false;
    }
    function homethree()
    {   
        $this->db->from('tbl_home');
        $this->db->where('id', '3');
        $this->db->order_by("id", 'ASC');
        $res = $this->db->get();
        if ($res->num_rows() > 0) return $res->row_array();
        return false;
    }

}