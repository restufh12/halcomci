<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('authmodel');
    }

	public function index()
	{
		redirect('/auth/login');
	}

	public function update_profile(){
		$this->check_login_admin();
		$UserEmail = $this->session->userdata('LoginEmail');
		$data = array('container' => 'update-profile',
					  'UserEmail' => $UserEmail);
		$this->load->view('templates/templates', $data);
	}

	public function update_profile_process(){
		$this->form_validation->set_rules('UpdateEmail', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('UpdateNewPassword', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
        	$errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errorupdateemail', $errors);
            redirect('admin/update_profile');
        } else {
			$UpdateEmail              = htmlspecialchars($this->input->post('UpdateEmail'));
			$CurrentPassword          = $this->input->post('CurrentPassword');
			$UpdateNewPassword        = $this->input->post('UpdateNewPassword');
			$UpdateConfirmNewPassword = $this->input->post('UpdateConfirmNewPassword');

			$UserEmail   = $this->session->userdata('LoginEmail');
			$check_email = $this->authmodel->check_email($UserEmail);

        	if(!password_verify($CurrentPassword, $check_email->Password)){
        		$this->session->set_flashdata('errorupdateemailwrongpass', "Incorrect Password");
                redirect('admin/update_profile');
                die();
        	}

        	if($UpdateNewPassword!=$UpdateConfirmNewPassword){
        		$this->session->set_flashdata('errorupdateemailnotmatch', "Password Do Not Match");
                redirect('admin/update_profile');
                die();
        	}

        	$Password  = password_hash($UpdateNewPassword, PASSWORD_DEFAULT);
        	$RunNo     = $check_email->RunNo;
        	$data = [
                'Email'     => $UpdateEmail,
                'Password'  => $Password
            ];

        	$Update = $this->authmodel->user_update($RunNo, $data);
        	if($Update){
        		$this->session->set_flashdata('successupdateprofile', "Update Profile Successful");
                redirect('admin/update_profile');
        	} else {
        		$this->session->set_flashdata('errorupdateprofile', "Update Profile Failed");
                redirect('admin/update_profile');
        	}
        	

        }

	}
}
