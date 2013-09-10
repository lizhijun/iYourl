<?php

class Share extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    { 
        $this->form_validation->set_rules('toEmail','对方邮箱','required|valid_email');
		$this->form_validation->set_rules('fromName','你的称呼','required');
		$this->form_validation->set_rules('fromEmail','你的邮箱','required');
		$this->form_validation->set_rules('message','分享理由','required');
		$this->form_validation->set_rules('captcha','验证码','trim|required|exact_length[4]');
		
		if($this->form_validation->run()=== FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('submit/share');		
		}
		else{
			$to_email = $this->input->post('toEmail');
			$from_name = $this->input->post('fromName');
			$from_email = $this->input->post('fromEmail');
			$email_msg = $this->input->post('message');
			if($this->sendemail($to_email,$from_name,$from_email,$email_msg)){
				echo "success";
			}else{
				echo "fail";
			}
		}
    }
     
    public function sendemail($to_email,$from_name,$from_email,$email_msg)
    {
       
		$this->load->view('templates/header');
		
		$from_email_ = 'lizhijun20@126.com';
		$from_pass = 'lizhijun09';
		
		//$to_email = 'leecomeon@126.com';
		
		//$from_name = "管理员";
        $email_subject ="找回91头条网用户密码"; 
        //$email_msg="<a href='#'>点此链接找回密码</a>";
		
		$config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.126.com',
            'smtp_port' => 25,
            'smtp_user' => $from_email_,
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
            return false;          
        }
        else
        {
            return true;
        }
    } 
}
?>