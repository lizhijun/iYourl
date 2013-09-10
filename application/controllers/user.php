<?php
	
	class User extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
		}

        public function register()
		{

			$data['title'] = "注册用户";
			
			$this->form_validation->set_rules('username','用户名','trim|required|min_length[5]|max_length[12]|is_unique[user.username]');
			$this->form_validation->set_rules('email','邮箱','required|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password','密码','trim|required|min_length[6]|matches[passconf]');
			$this->form_validation->set_rules('passconf','确认密码','required');
            $this->form_validation->set_rules('captcha','验证码','trim|required|exact_length[4]');

			if($this->form_validation->run()=== FALSE)
			{
				$this->load->view('templates/header',$data);
				$this->load->view('user/register');
				$this->load->view('templates/footer');			
			}
			else
			{
				$data['error'] = $this->user_model->reg_user();
				
                $this->load->view('templates/header',$data);
				$this->load->view('user/register',$data);
				$this->load->view('templates/footer');
				
                //redirect('iyourl');
			}

		}

        public function login()
        {

			$data['title'] = "登录";
			$this->form_validation->set_rules('username','用户名','required');
			$this->form_validation->set_rules('password','密码','required');
			if ($this->form_validation->run() == FALSE){
				$data['data'] = "出错";
				$this->load->view('templates/header',$data);
				$this->load->view('user/login');
				$this->load->view('templates/footer');	
			}else{
						
				if($this->user_model->login_check()) {
					
					$session['username'] = $this->input->post('username');;
					
					$this->session->set_userdata($session);
					
					redirect('');//登录成功
					
				} else {
					//$data['title'] = '登录';
					$data['title'] = '登录失败了，请检查你的信息！';
					$this->load->view('templates/header',$data);
					$this->load->view('user/login');
					$this->load->view('templates/footer');
				}
			}
        }

        public function logout()
        {

            $this->session->sess_destroy();
			redirect(''); //default: iyourl/index		
        }

        public function chk_username()
        {
       
            if(strlen($this->input->post('username'))<6)
            {
                echo "<span style='color:red'>无效的用户名</span>";
            }else{
                if($this->user_model->get_username()){
                    echo "<span style='color:red'>该用户名已存在</span>";
                }else{
                    echo "<span style='color:green'>该用户名可用</span>";
                }
            }   
        }
            
        public function captcha()
        {
            $this->load->library('captcha');
            $this->load->helper('string');
            
            $rand_str = random_string('alnum',4);
            $captcha = new Captcha(220,56,$rand_str);
            $captcha->showImg();
            $this->session->set_userdata('captcha',strtolower($rand_str));
        }
	}
    ?>