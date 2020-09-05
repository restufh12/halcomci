<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('authmodel');
    }

	public function login()
	{
		$data = array('container' => 'login');
        $this->load->view('templates/templates', $data);
    }
    
    public function register(){
        echo "under maintenance";
    }

    public function forget_password(){
        echo "under maintenance";
    }

    public function process_login(){
        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('auth/login');
        } else {
            $Email = htmlspecialchars($this->input->post('Email'));
            $Password = htmlspecialchars($this->input->post('Password'));

            // CEK KE DATABASE
            $check_login = $this->authmodel->check_login($Email);
            if($check_login == FALSE){
                $this->session->set_flashdata('loginerrors', true);
                redirect('auth/login');
            } else {
                if(password_verify($Password, $check_login->Password)){
                    // if the username and password is a match
                    $this->session->set_userdata('LoginRunNo', $check_login->RunNo);
                    $this->session->set_userdata('LoginEmail', $check_login->Email);
                    $this->session->set_userdata('LoginName', $check_login->Name);
                    $this->session->set_userdata('LoginYN', "1");
                    $this->session->set_userdata('LoginLevel', $check_login->Level);
                    $this->session->set_flashdata('loginsuccess', "1");

                    redirect('/');
                } else {
                    $this->session->set_flashdata('loginerrors', true);
                    redirect('auth/login');
                }
            }
        }
    }

    public function process_register(){
        echo "under maintenance";
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }
}
