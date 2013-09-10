<?php	
	class Iyourl extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('get_model');
		}

		public function index()
		{
            $this->load->library('pagination');

            $config['base_url'] = base_url('iyourl/index');

            $config['total_rows'] = count($this->get_model->get_link_count());
            $config['per_page'] = 10;
            $config['full_tag_open'] = '<p>'; //class = "btn"
            $config['prev_link'] = '上一页';
            $config['next_link'] = '下一页';          
            $config['full_tag_close'] = '</p>';
            $config['display_pages'] = FALSE; // 不显示“数字”链接
            $config['first_link'] = FALSE;// 不显示起始链接
            $config['last_link'] = FALSE;
            $this->pagination->initialize($config); 
			
            $data['title'] = '首页';
            $data['link'] = $this->get_model->get_link($id = FALSE,$config['per_page'],$this->uri->segment(3));
            
			if(!empty($this->session->userdata['username']) && $this->session->userdata['username']){
				$data['login_info'] = "<div class='pull-right'>".$this->session->userdata('username')."(<abbr title='链接积分'><strong>1</strong></abbr>) | <a href='#'><i class='icon-envelope'></i></a> | <strong><a href='#'>偏好</a></strong> | <a href='".base_url('user/logout')."'>退出</a> </div><br />";
				
				$data['login_form'] = "";//不显示登录表单
			}else{
				$data['login_info'] = "<a href='#myModal' data-toggle='modal'><span style='color:gray;'>想要加入？马上</span> 注册或登录 <span style='color:gray;'>只需几秒</span></a>";
				$data['login_form'] = "
					<table class='table table-bordered'>
						<tr><td>
							".form_open('user/login')."
							<input type='text' class='span6' name='username' placeholder='用户名'>
							<input type='password' class='span6 pull-right' name='password' placeholder='密码'>
							<br><br>
							<label class='checkbox span4'>
							<input type='checkbox'>记住我
							</label>
				  
							<a class='checkbox' href='/password'>忘记密码?</a>
							<button type='submit' class='btn pull-right'>登录</button>
							</form>
						</tr></td>
					</table>

				";
			}
			 

			$this->load->view('templates/header',$data);
			$this->load->view('iyourl/index',$data);
			$this->load->view('templates/footer');
		}
	    
        public function latest()
		{
			$this->load->helper('url');
			$this->load->library('pagination');

            $config['base_url'] = base_url('iyourl/latest');

            $config['total_rows'] = count($this->get_model->get_latest());
            $config['per_page'] = 4;
            
            //$config['use_page_numbers'] = TRUE; //启用use_page_numbers后显示的是当前页码
            
            $config['full_tag_open'] = '<p>'; //class = "btn"
            $config['prev_link'] = '上一页';
            $config['next_link'] = '下一页';          
            $config['full_tag_close'] = '</p>';
            
            $config['display_pages'] = FALSE; // 不显示“数字”链接
            $config['first_link'] = FALSE;// 不显示起始链接
            $config['last_link'] = FALSE;

            $this->pagination->initialize($config); 
			$data['submit'] = $this->submit_model->get_latest($id = FALSE,$config['per_page'],$this->uri->segment(3)); //最新

			$data['title'] = '最新';

			$this->load->view('templates/header',$data);
			$this->load->view('submit/latest',$data);
			$this->load->view('templates/footer');
		}
        
        public function rising()
        {
            
        }

        public function controversial()
        {
            
        }

        public function top()
        {
            $this->load->helper('url');
			$this->load->library('pagination');

            $config['base_url'] = base_url('submit/top');

            $config['total_rows'] = count($this->submit_model->get_top());
            $config['per_page'] = 4;
            
            //$config['use_page_numbers'] = TRUE; //启用use_page_numbers后显示的是当前页码
            
            $config['full_tag_open'] = '<p>'; //class = "btn"
            $config['prev_link'] = '上一页';
            $config['next_link'] = '下一页';          
            $config['full_tag_close'] = '</p>';
            
            $config['display_pages'] = FALSE; // 不显示“数字”链接
            $config['first_link'] = FALSE;// 不显示起始链接
            $config['last_link'] = FALSE;

            $this->pagination->initialize($config);
			$data['submit'] = $this->submit_model->get_top($id = FALSE,$config['per_page'],$this->uri->segment(3)); //最新

			$data['title'] = '得分';

			$this->load->view('templates/header',$data);
			$this->load->view('submit/top',$data);
			$this->load->view('templates/footer');
        }
        
        public function wiki()
        {
            
        }

		

        public function reply()
        {
            $this->load->helper(array('form','url')); //加载表单辅助函数和URL辅助函数
			$this->load->library('form_validation');
            
            $data['title'] = "首页";

			$this->form_validation->set_rules('content','Content','trim|required|min_length[5]|max_length[228]');
            $this->form_validation->set_rules('sid','Sid','required'); //必须要设置规则才能提交该值

            if($this->form_validation->run()===FALSE)
			{
				$this->load->view('templates/header',$data);
				$this->load->view('submit/success'); //
				$this->load->view('templates/footer');			
			}
			else
			{
				$this->submit_model->set_reply();
				$this->load->view('templates/header',$data);
				$this->load->view('submit/success');
				$this->load->view('templates/footer');
			}
        }
	}	

?>