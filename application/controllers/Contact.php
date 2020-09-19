<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function index()
	{
		$data = array('container' => 'contact');
		$this->load->view('templates/templates', $data);
	}


	public function send_mail_to_admin(){
		$config  = $this->load->config('email');
		$to      = $this->config->item('smtp_user');
		$from    = $this->input->post('email');
		$subject = "Client - ".$from;

        $this->email->to($to);
        $this->email->from($from, $this->input->post('name'));
        $this->email->subject($subject);

        $this->email->message($this->input->post('message'));
        $result = $this->email->send();

        if($result){
            echo "1";
        } else {
            echo "0";
        }
	}

	public function send_subscribe_request(){
		// Save Subscriber To Database
		$this->load->model('subscribermodel');
		$data = [
			'Name'    => $this->input->post('subUserName'),
			'Company' => $this->input->post('subCompanyName'),
			'Email'   => $this->input->post('subUserEmail')
        ];
        $this->subscribermodel->insert_subscriber("subscribers", $data);

        // Send Email
		$config  = $this->load->config('email');
		$to      = $this->config->item('smtp_user');
		$from    = $this->input->post('subUserEmail');
		$subject = "Subscribe Request - ".$from;

        $message = "<table border='0'>
        			<tr>
	        			<td>Name</td>
	        			<td width='5%'></td>
	        			<td>".$this->input->post('subUserName')."</td>
	        		</tr>
	        		<tr>
	        			<td>Email</td>
	        			<td></td>
	        			<td>".$this->input->post('subUserEmail')."</td>
	        		</tr>
	        		<tr>
	        			<td>Company</td>
	        			<td></td>
	        			<td>".$this->input->post('subCompanyName')."</td>
	        		</tr>
        			</table>";

        $this->email->to($to);
        $this->email->from($from, $this->input->post('subUserName'));
        $this->email->subject($subject);

        $this->email->message($message);
        $result = $this->email->send();

        if($result){
            echo "1";
        } else {
            echo "0";
        }
	}
}
