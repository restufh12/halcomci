<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->model('eventmodel');
		$dataevent = $this->eventmodel->homeevent();

		$data = array('container' => 'home',
					  'dataevent' => $dataevent);
		$this->load->view('templates/templates', $data);
	}

	public function error404(){
		$data = array('container' => '404');
		$this->load->view('templates/templates', $data);
	}
}
