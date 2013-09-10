<?php
	class Submit_model extends CI_Model{
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function set_link()
		{
			$this->db->where('username',$this->session->userdata('username'));
			$this->db->select('id');
			$this->db->limit(1);
			$query = $this->db->get('user');
			$row = $query->row_array();
			
            $url = $this->input->post('url');
            preg_match("/^(http:\/\/)?([^\/]+)/i", $url, $matches);
            preg_match("/[^\.\/]+\.[^\.\/]+$/", $matches[2], $result);
            $domain = $result[0];
            
            $data =array(
				'title' => $this->input->post('title'),
                'url' => $url,
                'domain' => $domain,
                'category' => $this->input->post('category'),
                'uid' => $row['id'], //不直接用用户名 用户更换昵称 
                'created' => time()
			);

			return $this->db->insert('link',$data);
		}

        public function set_reply()
		{
            $this->db->where('username',$this->session->userdata('username'));
			$this->db->select('id');
			$this->db->limit(1);
			$query = $this->db->get('user');
			$row = $query->row_array();
			
            $data =array(
				'pid' => $this->input->post('pid'),
                'uid' => $row['id'],
                'content' => $this->input->post('content'),
                'created' => time()
			);

			return $this->db->insert('reply',$data);
		}

        public function update_score()
		{

			$data =array(
                'score' =>$this->input->post('score')
			);
            
            $id = $this->input->post('id');
            $this->db->where('id',$id);
			return $this->db->update('link',$data);
		}

        public function rply_update_score()
		{

			$data =array(
                'score' =>$this->input->post('score')
			);
            
            $id = $this->input->post('id');
            $this->db->where('id',$id);
			return $this->db->update('reply',$data);
		}

        public function update_comments()
		{

			$data =array(
                'comments' =>$this->input->post('comments')
			);
            
            $id = $this->input->post('pid');
            $this->db->where('id',$id);
			return $this->db->update('link',$data);
		}
	}
?>		