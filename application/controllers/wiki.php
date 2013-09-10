<?php
    
    class Wiki extends CI_Controller{
    
        public function __construct()
		{
			parent::__construct();
		}
        public function index()
        {         
            $this->load->view("templates/header.php");
            $this->load->view("wiki/index.php");
            $this->load->view('templates/footer');
        }

        public function revisions()  //history
        {
            //$this->load->view("wiki/markdown.php");
            $this->load->view("wiki/wiki.php");
        }

        public function discussions()  //talk
        {
            //$this->load->view("wiki/markdown.php");
            $this->load->view("wiki/wiki.php");
        }
    }
?>