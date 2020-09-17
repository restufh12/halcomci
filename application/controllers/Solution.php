<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solution extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('solutionmodel');
	}

	public function detail_solution($RunNo){
        $solutiondetail = $this->solutionmodel->get_detail($RunNo);
        $data = array('container'   => 'solution-detail',
                      'solutiondetail' => $solutiondetail);
		$data['recentpost'] = $this->solutionmodel->recentpost();
        $this->load->view('templates/templates', $data);
    }

    public function index()
	{
        //konfigurasi pagination
        $config['base_url'] = site_url('solution/index'); //site url
        $config['total_rows'] = $this->db->count_all('solutions'); //total row
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
        $data['data'] = $this->solutionmodel->get_solution_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();

		$data['container'] = 'solution';
		$data['recentpost'] = $this->solutionmodel->recentpost();
		$this->load->view('templates/templates', $data);
	}

	public function create_solution()
	{
		$this->check_login_admin();
		$data = array('container' => 'create-solution');
		$this->load->view('templates/templates', $data);
	}

	public function validation_save(){
		$this->check_login_admin();
		$this->form_validation->set_rules('SolutionTitle', 'Title', 'required');
        $this->form_validation->set_rules('SolutionDescription', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('inputsolution', $this->input->post());
            redirect('solution/create_solution');
        } else {
			$Title       = $this->input->post('SolutionTitle');
			$Description = $this->input->post('SolutionDescription');
           
            $Attachment  = $_FILES['Attachment']; 

            if($Attachment!=""){
                $config['upload_path']          = './assets/upload/solution';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = "solution_".$this->session->userdata('LoginRunNo')."_".date('YmdHis');
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
				'Description' => $Description,
				'Attachment'  => $AttachmentName
            ];

            $insert = $this->solutionmodel->insertsolution("solutions", $data);

            if($insert){
                $this->session->set_flashdata('msgnewsolution', '1');
                redirect('/solution');
            } else {
                $this->session->set_flashdata('msgnewsolution', '0');
                redirect('/solution');
            }
        }
	}

	public function update_solution($RunNo){
        $this->check_login_admin();
        $dataSolution = $this->solutionmodel->get_detail($RunNo);
        $data = array('container' => 'create-solution',
                      'RunNoSolution' => $RunNo,
                      'dataSolution' => $dataSolution);
        $this->load->view('templates/templates', $data);
    }

    public function validation_update(){
        $this->check_login_admin();
        $this->form_validation->set_rules('SolutionTitle', 'Title', 'required');
        $this->form_validation->set_rules('SolutionDescription', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('inputsolution', $this->input->post());
            redirect('solution/update_solution/'.$this->input->post('RunNo'));
        } else {
            $Title       = $this->input->post('SolutionTitle');
            $Description = $this->input->post('SolutionDescription');
           
            $Attachment  = $_FILES['Attachment']; 

            if($Attachment!=""){
                $config['upload_path']          = './assets/upload/solution';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = "solution_".$this->session->userdata('LoginRunNo')."_".date('YmdHis');
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
                        if (file_exists('assets/upload/solution/'.$AttachmentOld)) {
                            unlink('assets/upload/solution/'.$AttachmentOld);
                        }
                    }
                    $data = [
                        'Title'       => $Title,
                        'Description' => $Description,
                        'Attachment'  => $AttachmentName
                    ];
                } else {
                    $data = [
                        'Title'       => $Title,
                        'Description' => $Description
                    ];
                }
            } 


            $update = $this->solutionmodel->updatesolution($this->input->post('RunNo'), $data);

            if($update){
                $this->session->set_flashdata('msgupdatesolution', '1');
                redirect('/solution');
            } else {
                $this->session->set_flashdata('msgupdatesolution', '0');
                redirect('/solution');
            }
        }
    }

    public function delete_solution(){
        $this->check_login_admin();
        $RunNo       = $this->input->post('RunNo');
        $solutiondetail = $this->solutionmodel->get_detail($RunNo);
        $image_name  = $solutiondetail->Attachment;

        // Delete Image
        if($image_name!="default.png" AND $image_name!=""){
            if (file_exists('assets/upload/solution/'.$image_name)) {
                unlink('assets/upload/solution/'.$image_name);
            }
        }

        $Result  = $this->solutionmodel->delete_solution($RunNo);
        echo $Result;
    }
}
