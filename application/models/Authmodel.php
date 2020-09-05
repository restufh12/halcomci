<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Authmodel extends CI_Model{

	/*public function register($table, $data)
	{
	    return $this->db->insert($table, $data);
	}*/

	public function check_login($Email)
	{
	    $result = $this->db->where('Email', $Email)->limit(1)->get('users');
	    if($result->num_rows() > 0){
	        return $result->row();
	    } else {
	        return array();
	    }
	} 
}