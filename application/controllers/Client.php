<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	public function index()
	{
		$data = array('container' => 'client');
		$this->load->view('templates/templates', $data);
	}
}
