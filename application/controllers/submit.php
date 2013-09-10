<?php
	
	class Submit extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('submit_model');
			//$this->load->model('get_model');
		}

		public function index()
		{

			$data['title'] = "提交";
			//$data['credit'] = $this->get_model->get_credit();

			$this->form_validation->set_rules('title','标题','trim|required|max_length[255]');
            $this->form_validation->set_rules('url','网址','trim|required|max_length[255]');
            $this->form_validation->set_rules('category','分类','trim|required|max_length[255]');
            $this->form_validation->set_rules('captcha','验证码','trim|required|exact_length[4]');

			if($this->form_validation->run()===FALSE){
				
                $this->load->view('templates/header',$data);
				$this->load->view('submit/link');
				$this->load->view('templates/footer');			
			}else{
				
                $this->submit_model->set_link();
				$this->load->view('templates/header',$data);
				$this->load->view('submit/success');
				$this->load->view('templates/footer');
			}

		}

        public function get_title(){
            
            //此处还需要判断post过来的字符串是否为网址或为空
            
            $html = file_get_contents($this->input->post("url"));
            $preg = "/<title>(.*?)<\/title>/si";
            preg_match($preg, $html, $arr);
            //echo trim(mb_convert_encoding($arr[1], "UTF-8", "GBK")); //GBK To UTF-8 编码转换
            //echo $arr[1]; //UTF-8
            echo $this->safeEncoding($arr[1]); //自动识别字符集并完成转码
        }
		
		public function status()
		{
	
			$data['title'] = "发布状态";

			$this->form_validation->set_rules('content','Content','trim|required|min_length[5]|max_length[228]');

			if($this->form_validation->run()===FALSE)
			{
				$this->load->view('templates/header',$data);
				$this->load->view('submit/status');
				$this->load->view('templates/footer');			
			}
			else
			{
				$this->submit_model->set_submit();
				$this->load->view('templates/header',$data);
				$this->load->view('submit/success');
				$this->load->view('templates/footer');
			}

		}
        
        private function safeEncoding($string,$outEncoding ='UTF-8')    
        {    
            $encoding = "UTF-8";    
            for($i=0;$i<strlen($string);$i++)    
            {    
                if(ord($string{$i})<128)    
                    continue;    
                
                if((ord($string{$i})&224)==224)    
                {    
                    //第一个字节判断通过    
                    $char = $string{++$i};    
                    if((ord($char)&128)==128)    
                    {    
                        //第二个字节判断通过    
                        $char = $string{++$i};    
                        if((ord($char)&128)==128)    
                        {    
                            $encoding = "UTF-8";    
                            break;    
                        }    
                    }    
                }    
            
                if((ord($string{$i})&192)==192)    
                {    
                    //第一个字节判断通过    
                    $char = $string{++$i};    
                    if((ord($char)&128)==128)    
                    {    
                        // 第二个字节判断通过    
                        $encoding = "GB2312";    
                        break;    
                    }    
                }    
            }    
                     
            if(strtoupper($encoding) == strtoupper($outEncoding))    
                return $string;    
            else   
                return iconv($encoding,$outEncoding,$string);    
        } 
	}	

?>