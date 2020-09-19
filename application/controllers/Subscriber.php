<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->check_login_admin();
	    $this->load->library('datatables'); //load library ignited-dataTable
	    $this->load->model('subscribermodel');
    }

	public function subscriber_listing()
	{
		$data = array('container' => 'subscriber-listing');
		$this->load->view('templates/templates', $data);
	}

	public function get_subscriber_json(){
		header('Content-Type: application/json');
	    echo $this->subscribermodel->get_all_subscriber();
	}
}
