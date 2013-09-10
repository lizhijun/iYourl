<?php

class Password extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
    }

    public function index() //显示
    { 
        $data['title'] = '找回密码';

		$this->load->view('templates/header');
		$this->load->view('submit/password');
		$this->load->view('templates/footer');

		$this->form_validation->set_rules('username','用户名','trim|required|max_length[255]');

		if($this->form_validation->run()===FALSE){
			
			//$this->load->view('templates/header');//,$data
			//$this->load->view('submit/password');
			//$this->load->view('templates/footer');			
		}else{
			
			$this->get_model->get_email();


			$this->load->view('templates/header');//,$data
			$this->load->view('submit/success');
			$this->load->view('templates/footer');
		}


    }
     
    public function sendmail()
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.163.com',
            'smtp_port' => 25,
            'smtp_user' => 'lizhijun20@126.com',
            'smtp_pass' => 'lizhijun09',
            'charset' => 'GBK',
            'mailtype' => 'html',
        );
        // $config_ssl = Array(
        // 'protocol' => 'smtp',
        // 'smtp_host' => 'ssl://smtp.gmail.com',
        // 'smtp_port' => '465',
        // 'smtp_user' => '123@gmail.com',
        // 'smtp_pass' => '123',
        // 'mailtype' => 'html',
        // );

        $this->load->library('email', $config);

        $this->email->set_newline("rn");
        $from_name = "YES";//发件人名称
        $email_subject ="注册";
        $email_msg="
        hi,register!你好！请注意查收！";
        //解决乱码问题
        //$from_name = iconv('UTF-8','GBK',$from_name);
        //$email_subject = iconv('UTF-8','GBK',$email_subject);
        //$email_msg = iconv('UTF-8','GBK',$email_msg);
        //封装发送信息

        $this->email->from('admin@91toutiao.com', $from_name);
        //$this->email->reply_to('you@example.com', 'Your Name'); //邮件回复地址
        $this->email->to('lizhijun20@126.com'); 
        //$this->email->cc('another@another-example.com'); //抄送
        //$this->email->bcc('them@their-example.com'); //暗送 

        $this->email->subject($email_subject); //email主题
        $this->email->message($email_msg); //email正文部分 
        $this->email->attach('./uploads/create_thumb.png');//添加附件
        
        if (!$this->email->send())
        {
            show_error($this->email->print_debugger());
            //return false;
        }
        else
        {
            echo"OK";
            //return true;
        }
    } 
}
?>