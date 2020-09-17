<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('eventmodel');
	}

    public function detail_event($RunNo){
        $eventdetail = $this->eventmodel->get_detail($RunNo);
        $data = array('container'   => 'event-detail',
                      'eventdetail' => $eventdetail);
		$data['recentpost'] = $this->eventmodel->recentpost();
        $this->load->view('templates/templates', $data);
    }

	public function index()
	{
        //konfigurasi pagination
        $config['base_url'] = site_url('event/index'); //site url
        $config['total_rows'] = $this->db->count_all('events'); //total row
		$config['short_rows'] = $this->db->order_by('RunNo', 'DESC');
        $config['per_page'] = 2;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '<i class="fa fa-angle-right"></i>';
        $config['prev_link']        = '<i class="fa fa-angle-left"></i>';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span><i class="fa fa-angle-right"></i></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->eventmodel->get_event_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();

		$data['container'] = 'event';
		$data['recentpost'] = $this->eventmodel->recentpost();
		$this->load->view('templates/templates', $data);
	}

	public function create_event()
	{
		$this->check_login_admin();
		$data = array('container' => 'create-event');
		$this->load->view('templates/templates', $data);
	}

	public function validation_save(){
		$this->check_login_admin();
		$this->form_validation->set_rules('EventTitle', 'Title', 'required');
        $this->form_validation->set_rules('D_ate', 'D_ate', 'required');
        $this->form_validation->set_rules('EventDescription', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('inputevent', $this->input->post());
            redirect('event/create_event');
        } else {
			$Title       = $this->input->post('EventTitle');
			$D_ate       = $this->input->post('D_ate');
			$Description = $this->input->post('EventDescription');
           
            $Attachment  = $_FILES['Attachment']; 

            if($Attachment!=""){
                $config['upload_path']          = './assets/upload/event';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = "event_".$this->session->userdata('LoginRunNo')."_".date('YmdHis');
                $config['overwrite']            = true;
                $config['max_size']             = 5120; // 5MB

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('Attachment')) {
                    $AttachmentName = $this->upload->data("file_name");
                } else {
                    $AttachmentName = "default.png";
                }
            }

            $data = [
				'Title'       => $Title,
				'D_ate'       => $D_ate,
				'Description' => $Description,
				'Attachment'  => $AttachmentName
            ];

            $insert = $this->eventmodel->insertevent("events", $data);

            if($insert){
                $this->session->set_flashdata('msgnewevent', '1');
                redirect('/event');
            } else {
                $this->session->set_flashdata('msgnewevent', '0');
                redirect('/event');
            }
        }
	}

    public function update_event($RunNo){
        $this->check_login_admin();
        $dataEvent = $this->eventmodel->get_detail($RunNo);
        $data = array('container' => 'create-event',
                      'RunNoEvent' => $RunNo,
                      'dataEvent' => $dataEvent);
        $this->load->view('templates/templates', $data);
    }

    public function validation_update(){
        $this->check_login_admin();
        $this->form_validation->set_rules('EventTitle', 'Title', 'required');
        $this->form_validation->set_rules('D_ate', 'D_ate', 'required');
        $this->form_validation->set_rules('EventDescription', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('inputevent', $this->input->post());
            redirect('event/update_event/'.$this->input->post('RunNo'));
        } else {
            $Title       = $this->input->post('EventTitle');
            $D_ate       = $this->input->post('D_ate');
            $Description = $this->input->post('EventDescription');
           
            $Attachment  = $_FILES['Attachment']; 

            if($Attachment!=""){
                $config['upload_path']          = './assets/upload/event';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = "event_".$this->session->userdata('LoginRunNo')."_".date('YmdHis');
                $config['overwrite']            = true;
                $config['max_size']             = 5120; // 5MB


                $this->load->library('upload', $config);
                if ($this->upload->do_upload('Attachment')) {
                    $AttachmentName = $this->upload->data("file_name");
                } else {
                    $AttachmentName = "default.png";
                }

                if($AttachmentName!="default.png"){
                    // Delete Image
                    $AttachmentOld = $this->input->post('AttachmentOld');
                    if($AttachmentOld!='' AND $AttachmentOld!='default.png'){
                        if (file_exists('assets/upload/event/'.$AttachmentOld)) {
                            unlink('assets/upload/event/'.$AttachmentOld);
                        }
                    }
                    $data = [
                        'Title'       => $Title,
                        'D_ate'       => $D_ate,
                        'Description' => $Description,
                        'Attachment'  => $AttachmentName
                    ];
                } else {
                    $data = [
                        'Title'       => $Title,
                        'D_ate'       => $D_ate,
                        'Description' => $Description
                    ];
                }
            } 


            $update = $this->eventmodel->updateevent($this->input->post('RunNo'), $data);

            if($update){
                $this->session->set_flashdata('msgupdateevent', '1');
                redirect('/event');
            } else {
                $this->session->set_flashdata('msgupdateevent', '0');
                redirect('/event');
            }
        }
    }

    public function delete_event(){
        $this->check_login_admin();
        $RunNo       = $this->input->post('RunNo');
        $eventdetail = $this->eventmodel->get_detail($RunNo);
        $image_name  = $eventdetail->Attachment;

        // Delete Image
        if($image_name!="default.png" AND $image_name!=""){
            if (file_exists('assets/upload/event/'.$image_name)) {
                unlink('assets/upload/event/'.$image_name);
            }
        }

        $Result  = $this->eventmodel->delete_event($RunNo);
        echo $Result;
    }
}
