<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
	public function index()
	{
		$data = array('container' => 'team');
		$this->load->view('templates/templates', $data);
	}
}
