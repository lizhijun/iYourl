<?php
	class Get_model extends CI_Model{
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_link($id = FALSE,$rows = NULL,$offset=NULL) //默认返回所有的状态
		{
			
			if($id === FALSE)
            {
                /*
                $sql = "SELECT rank,score,link.id,title,url,link.created,username,category,comments FROM link, user WHERE link.uid = user.id LIMIT ".$rows.",".$rows;
                $query = $this->db->query($sql);
                $query = $this->db->get('link',$rows,$offset);
                */

                $this->db->select('rank,score,link.id,title,url,domain,link.created,username,category,comments');
                $this->db->from('link');
                $this->db->join('user', 'link.uid = user.id');
                $this->db->limit($rows,$offset);
                $query = $this->db->get();
               
                return $query->result_array(); //返回所有的状态
            }

            $this->db->select('rank,score,link.id,title,url,domain,link.created,username,category,comments');
            $this->db->from('link');
            $this->db->join('user', 'link.uid = user.id');
            $this->db->where('link.id',$id);
            $query = $this->db->get(); //返回某一条状态
            return $query->row_array();
		}

        public function get_link_count($id = FALSE,$rows = NULL,$offset=NULL) 
		{
			
			if($id === FALSE)
            {
                $query = $this->db->get('link',$rows,$offset);
                return $query->result_array(); //返回所有的状态
            }

            $query = $this->db->get_where('link',array('id' => $id )); //返回某一条状态
            return $query->row_array();
		}

        public function get_latest($id = FALSE,$rows = NULL,$offset=NULL)
		{
			
			if($id === FALSE)
            {
                $this->db->order_by('created','desc');
                $query = $this->db->get('status',$rows,$offset);
                return $query->result_array(); //返回所有的状态
            }
            $query = $this->db->get_where('status',array('id' => $id ));
            return $query->row_array();
		}

        //rising
        //controversial

        public function get_top($id = FALSE,$rows = NULL,$offset=NULL)
		{
			
			if($id === FALSE)
            {
                $this->db->order_by('score','desc');
                $query = $this->db->get('status',$rows,$offset);
                return $query->result_array(); //返回所有的状态
            }
            $query = $this->db->get_where('status',array('id' => $id ));
            return $query->row_array();
		}
        
        //wiki

        
        public function get_reply($id)
        {
            //SELECT rank,score,reply.id,content,reply.created,username FROM reply, user WHERE reply.uid = user.id
            
            $this->db->select('rank,score,comments,reply.id,content,reply.created,username');
            $this->db->from('reply');
            $this->db->where('pid',$id);
            $this->db->join('user','reply.uid = user.id');
            //$this->db->limit($rows,$offset);
            $query = $this->db->get();
            
            
            //$query = $this->db->get_where('reply',array('pid' => $id ));
            return $query->result_array();
        }

		public function get_reply_tree($id)
		{
			
			$level=0;//深度
            $res ="";
			return $this->display_children($id,$level,$res);
            
		}

		/*
		private function display_children($pid,$level,&$res) //这里的&要好好研究下
		{ 

			$this->db->select('id,content,comments');
			$this->db->where('pid',$pid);
			$query = $this->db->get('reply');
		
			if ($query->num_rows() == 0) return;

            $res.='<ul>';
            
            foreach ($query->result_array() as $row)
			{
				$res.='<li>';
                
                $res.=$row['content'].($row['comments']);  
                
                $this->display_children($row['id'],$level+1,$res);
                
                $res.='</li>';
			}
			
            return $res.='</ul>';
        }*/
		
		
		private function display_children($pid,$level,&$res) 
		{ 

			$this->db->select('id,comments,content,score, created');
			$this->db->where('pid',$pid);
			$query = $this->db->get('reply');
		
			if ($query->num_rows() == 0) return;
            
			if(!$level)
				$res.='<ul style="list-style-type:none;">';
			else
				$res.='<ul style="list-style-type:none;margin-left:14px;padding-left: .8em;border-left: 1px dashed #ccc;">';

            foreach ($query->result_array() as $row)
			{
				
				$res.='<li>';
                
                $res.="<!--显示该状态的回复-->
                <div>
				<div class='row-fluid'>
						  
					<div class='span12'>
						<style>
							
                        </style>
						
						<div id='switch' style='margin-bottom:4px;color: #888;'>
							<a class='hide_up' href='javascript:void(0)' id='".$row['id']."' onclick='rply_up(this)'><i class='icon-thumbs-up'></i></a>
                        
							<a style='color: gray;' id='minus' href='javascript:void(0)' onclick='switch_state(this)'>[–]</a>&nbsp;<small>
							
                            <a style='color: #369;font-weight: bold;' href='#'>lizhijun</a>&nbsp;&nbsp;<span id='show-".$row['id']."'>".$row['score']."</span>分&nbsp;&nbsp;发表于<?php  formatTime(".$row['created'].");?>
                            &nbsp;<span style='color: gray;'>
								(<a style='color: gray;' class='hide_rply' href='<?php echo base_url('comments/view').'/'.".$row['id']."'> ".$row['comments']." 回复</a>)</small></span>
						</div>
						
						<div class='hide_content' style='margin-bottom:6px;'>
                            <a href='javascript:void(0)' id='".$row['id']."' onclick='rply_down(this)'><i class='icon-thumbs-down'></i></a>
                            
                            <span >".$row['content']."</span>
                            <!--<input type='hidden' class='show' value='".$row['id']."'/>-->
						</div>

						<div class='hide_function' style='margin-bottom:8px;'>
							<div style='color: #888;font-weight: bold;padding: 0 1px;'>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><a style='color: #888;' href='#'>收藏</a>&nbsp;&nbsp;&nbsp;&nbsp;<a style='color: #888;' href='#'>举报</a>&nbsp;&nbsp;&nbsp;&nbsp;</small><a style='color: #888;' href='javascript:void(0)' onclick='set_reply(this)' id='".$row['id']."'><small>{回复}</small></a><!--&nbsp;&nbsp;
								<small><a href='javascript:void(0)' id='".$row['id']."' onclick='show_reply(this)'>显示评论</a></small>-->
							</div>
						</div>
					</div>
					
				</div>
				
				<?php endforeach?>
				</div>
				<!--该状态的回复显示完毕-->";

				$this->display_children($row['id'], $level+1,$res);
                $res.='</li>';
			}
			return $res.='</ul>';
        }
        
	}
?>