<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {
	public function index()
	{
		$data = array('container' => 'partner');
		$this->load->view('templates/templates', $data);
	}
}
