<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Subscribermodel extends CI_Model{

	public function get_all_subscriber() {
        $this->datatables->select('RunNo,Name,Company,Email');
        $this->datatables->from('subscribers');
        $this->db->order_by('Name', 'ASC');
        return $this->datatables->generate();
  	}

  	public function insert_subscriber($table, $data)
	{
	    return $this->db->insert($table, $data);
	}
}