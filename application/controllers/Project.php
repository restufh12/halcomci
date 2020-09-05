<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	public function index()
	{
		$data = array('container' => 'project');
		$this->load->view('templates/templates', $data);
	}
}
