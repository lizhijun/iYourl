<?php

class Email extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    { 
        //$this->load->view('submit/share');
    }
     
    public function sendemail()
    {
        
		$this->load->view('templates/header');
		
		$from_email = 'lizhijun20@126.com';
		$from_pass = 'lizhijun09';
		
		$to_email = 'leecomeon@126.com';
		
		$from_name = "管理员";
        $email_subject ="找回91头条网用户密码"; 
        $email_msg="<a href='#'>点此链接找回密码</a>";
		
		$config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.126.com',
            'smtp_port' => 25,
            'smtp_user' => $from_email,
            'smtp_pass' => $from_pass,
            'charset' => 'utf8',
            'mailtype' => 'html',
        );

        $this->load->library('email', $config);

        $this->email->from($from_email, $from_name);    
		$this->email->to($to_email); 
        $this->email->subject($email_subject); 
        $this->email->message($email_msg);        
        if (!$this->email->send())
        {
            show_error($this->email->print_debugger()); //return false;
            
        }
        else
        {
            echo "发送成功！"; //return true;
            
        }
    } 
}
?>