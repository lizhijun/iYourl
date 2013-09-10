<?php

class Upload extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    { 
        $this->load->view('templates/header');
		$this->load->view('upload/upload_form', array('error' => ' ' ));
    }
     
    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width']  = '1900';
        $config['max_height']  = '1900';
  
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
   
            $this->load->view('upload/upload_form', $error);
        } 
        else
        {
            $data = array('upload/upload_data' => $this->upload->data());
   
            $this->load->view('templates/header');
			$this->load->view('upload/upload_success', $data);
        }
    } 
}
?>