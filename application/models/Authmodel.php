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

	public function check_email($Email){
		$result = $this->db->where('Email', $Email)->limit(1)->get('users');
	    if($result->num_rows() > 0){
	        return $result->row();
	    } else {
	        return array();
	    }
	}

	public function new_password_generate($RunNo, $NewPassword){
		$Password  = password_hash($NewPassword, PASSWORD_DEFAULT);
		$this->db->set('Password', $Password);
        $this->db->where('RunNo', $RunNo);
        $this->db->update('users');
	}

	public function user_update($RunNo, $data){
		$this->db->trans_start();
		$this->db->where('RunNo', $RunNo);
    	$this->db->update('users', $data);
    	$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
			return 0;
		} else {
			return 1;
		}
    }
}