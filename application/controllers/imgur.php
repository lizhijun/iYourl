<?php
	
	class Imgur extends CI_controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper("url");
		}

		public function index()
		{			
			$this->load->view("imgur/header");
			$this->load->view("imgur/index", array('error' => ' ' ));
			
		}

		public function gallery()
		{
			$this->load->view("imgur/header");
			$this->load->view("imgur/gallery");
			//$this->load->view("imgur/footer");
		}
	}

?>