<?php
	
	class Comments extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('get_model');
            $this->load->model('submit_model');
		}

		public function view($id)
		{
			
			$data['link_item'] = $this->get_model->get_link($id);
            $data['reply'] = $this->get_model->get_reply($id);
            $data['tree'] = $this->get_model->get_reply_tree($id); //$pid

			if(empty($data['link_item']))
			{
				show_404();//页面不存在
			}

			$data['title']=$data['link_item']['title'];

			$this->load->view('templates/header',$data);
			$this->load->view('comments/view',$data);
            //$this->load->view('comments/tree');
			$this->load->view('templates/footer');
		}

		public function tree($id)
		{

			$data['link_item'] = $this->get_model->get_link($id);
            $data['reply'] = $this->get_model->get_reply_tree($id); //$pid

			if(empty($data['link_item']))
			{
				show_404();//页面不存在
			}

			$data['title']=$data['link_item']['title'];

			$this->load->view('templates/header',$data);
			$this->load->view('comments/tree',$data);
			$this->load->view('templates/footer');
		}

		public function show()
		{
						
            $reply = $this->get_model->get_reply($this->input->post('id')); //$data['reply']

			if(!empty($reply))
			{
				foreach ($reply as $key=>$val)   
				{   
					$reply[$key]['content'] = urlencode(iconv('utf-8','utf-8',$val['content']));   
				}   
				//echo json_encode($json);
				echo json_encode($reply);
			}
			
			
		}

		public function show_load()
		{
						
            echo $this->input->post('id'); 
			
			
		}
	
        public function reply()
        {
            $this->load->helper(array('form','url')); //加载表单辅助函数和URL辅助函数
			$this->load->library('form_validation');
            
            $data['title'] = "首页";

			$this->form_validation->set_rules('content','Content','trim|required|max_length[228]');
            $this->form_validation->set_rules('lid','Lid','required'); //必须要设置规则才能提交该值

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
        
        public function reply_ajax()
        {
            $this->submit_model->update_comments();
            
            $this->load->library('session');
            if($this->submit_model->set_reply()){
                echo TRUE;
            }
            //$this->input->post('content').$this->input->post('pid');
        }

        public function up()
        {
            $this->load->helper('url');
            $this->submit_model->update_score();
        }

		public function down()
        {
            $this->load->helper('url');
            $this->submit_model->update_score();
        }

        public function rply_up()
        {
            $this->load->helper('url');
            $this->submit_model->rply_update_score();
        }

		public function rply_down()
        {
            $this->load->helper('url');
            $this->submit_model->rply_update_score();
        }
	}	

?>