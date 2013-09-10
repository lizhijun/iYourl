<?php

class Image extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
    }

    public function index() //显示
    { 
        //$this->load->view('image/image_show');
    }
     
    public function resize()
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/create.png';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE; //保持纵横比例
        $config['width'] = 80;
        $config['height'] = 80;

  
        $this->load->library('image_lib', $config);

        if ( ! $this->image_lib->resize() )
        {
            $error = array('error' => $this->image_lib->display_errors('<p>', '</p>'));
   
            //$this->load->view('upload/upload_form', $error);
        } 
        else
        {
            //$data = array('upload/upload_data' => $this->upload->data());
   
            //$this->load->view('upload/upload_success', $data);
        }
    } 
}
?>