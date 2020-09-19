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
        $data = array('container' => 'forget-password');
        $this->load->view('templates/templates', $data);
    }

    public function process_login(){
        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            
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

    public function process_forgot_password(){
        $this->form_validation->set_rules('EmailForgotPassword', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errorresetemail', $errors);
            redirect('auth/forget_password');
        } else {
            $Email = htmlspecialchars($this->input->post('EmailForgotPassword'));
            $check_email = $this->authmodel->check_email($Email);
            if($check_email == FALSE){
                $this->session->set_flashdata('errorresetemailnoemail', "No Matching Email or Username Found");
                redirect('auth/forget_password');
            } else {
                $NewPassword = $this->random_password();
                $RunNo       = $check_email->RunNo;
                $this->authmodel->new_password_generate($RunNo, $NewPassword);

                // SEND EMAIL NEW PASSWORD
                $config  = $this->load->config('email');
                $from    = $this->config->item('smtp_user');

                $subject = "New Password Account";
                $message = "<table border='0'>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>".$Email."</td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <td>".$NewPassword."</td>
                                </tr>
                            </table>
                            <br>
                            <p>You can change the password in the <b>Update Profile</b> menu</p>";
                $this->email->to($Email);
                $this->email->from($from, "Halcom");
                $this->email->subject($subject);
                $this->email->message($message);
                $result = $this->email->send();

                if($result){
                    $this->session->set_flashdata('errorresetemailsuccesssend', "Password Reset Request Send, Please Check Your Email");
                    redirect('auth/forget_password');
                } else {
                    $this->session->set_flashdata('errorresetemailfailedsend', "Failed to send the email.");
                    redirect('auth/forget_password');
                }
            }
        }
    }

    private function random_password() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $password = array(); 
        $alpha_length = strlen($alphabet) - 1; 
        for ($i = 0; $i < 8; $i++) 
        {
            $n = rand(0, $alpha_length);
            $password[] = $alphabet[$n];
        }
        return implode($password); 
    }
}
