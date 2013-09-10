<?php
	class User_model extends CI_Model{
		
		public function __construct()
		{
			$this->load->database();
		}
		
		private $salt = 'iyourl';

        private $expire = 864000; //10 days
        
        private function add_user_session($username,$password,$remember){
            
            //$this->session->set_userdata('admin',$username);
            $this->session->set_userdata('username',$username);
            $this->session->set_userdata('logged_in',true);
            
            if($remember == 'on'){
                $cookie_admin = array(
                    'name'   => 'archnote_admin',
                    'value'  => $username,
                    'expire' => $this->expire,
                );
                $cookie_auth = array(
                    'name'   => 'archnote_auth',
                    'value'  => md5($username.$password),
                    'expire' => $this->expire,
                );

                $this->input->set_cookie($cookie_auth);
                $this->input->set_cookie($cookie_admin);
            }
        }

        public function reg_user()
		{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $captcha = $this->input->post('captcha');
            $remember = $this->input->post('remember');

            if($captcha <> $this->session->userdata('captcha'))
            {
                return '<p>验证码错误</p>';    
            }else
            {
                $data =array(
                    'username' => $username,				
                    'email' => $this->input->post('email'),
                    'password' => md5($password),
                    'credit' => 1,
                    'created' => time()
                );
                
                $this->session->set_userdata('username',$username);
                return $this->db->insert('user',$data);
                //$this->add_user_session($username,$password,$remember);
                return '<p>注册成功</p>';
                //redirect('iyourl');
            }
		}
		public function get_username()
		{
			$this->db->where('username',$this->input->post('username'));
			$query = $this->db->get('user');
			if($query->num_rows > 0)
			{
				return count($query->num_rows);
			}
		}

		public function login_check()
		{
				
			$this->db->where('username', $this->input->post('username'));
			$this->db->where('password', md5($this->input->post('password')));
			
			$query = $this->db->get('user');
			if ($query->num_rows() > 0) {
				return $query->row();
			}
		}
	}
?>