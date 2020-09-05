<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Eventmodel extends CI_Model{

	public function insertevent($table, $data)
	{
	    return $this->db->insert($table, $data);
	}

	public function updateevent($RunNo, $data){
		$this->db->trans_start();
		$this->db->where('RunNo', $RunNo);
    	$this->db->update('events', $data);
    	$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
			return 0;
		} else {
			return 1;
		}
	}

	function get_event_list($limit, $start){
        $query = $this->db->get('events', $limit, $start);
        return $query;
    }

    public function get_detail($RunNo){
		$this->db->select('*');
		$this->db->from('events');
	    $this->db->where('RunNo',$RunNo);
	    $this->db->limit(1);
	    $hasil = $this->db->get();

	    if($hasil->num_rows() > 0){
	        return $hasil->row();
	    } else {
	        return array();
	    }
	}

    public function delete_event($RunNo){
  		$this->db->trans_start();
		$this->db->where('RunNo', $RunNo);
		$this->db->delete('events');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
			return 0;
		} else {
			return 1;
		}
  	}

  	public function homeevent(){
		$this->db->select('*');
		$this->db->from('events');
		$this->db->order_by('RunNo', 'DESC');
		$this->db->limit(2);
		$result = $this->db->get();

	    if($result->num_rows() > 0){
	        return $result->result_array();
	    } else {
	        return array();
	    }
	}
}