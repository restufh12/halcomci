<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	public function index()
	{
		$data = array('container' => 'about');
		$this->load->view('templates/templates', $data);
	}
}
