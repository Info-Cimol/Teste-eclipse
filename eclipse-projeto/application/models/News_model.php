<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function news_total() {
			$this->db->where('delete',FALSE);
			$this->db->from('news');
			return $this->db->count_all_results();
		}
		
		public function fetch_news($limit,$start){
			$this->db->limit($limit, $start);
			$query = $this->db->get_where("news", array('delete'=>FALSE));
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false;
	   }
		
		public function get_news($id = FALSE, $slug = NULL)
		{
			if ($id === FALSE)
			{
					$query = $this->db->get_where('news', array('delete'=>FALSE));
					return $query->result_array();
			}else if($slug == NULL){

				$query = $this->db->get_where('news', array('id' => $id, 'delete'=>FALSE));
				return $query->row_array();
			}else{
				$query = $this->db->get_where('news', array('id' => $id, 'slug'=>$slug, 'delete'=>FALSE));
				return $query->row_array();
			}
		}
		
		public function set_news()
		{
			$this->load->helper('url');

			$slug = url_title($this->input->post('title'), 'dash', TRUE);

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text')
			);

			return $this->db->insert('news', $data);
		}
		function delete_news($id){
			$data = array(
				'delete'=>TRUE
			);
			$this->db->where('id',$id);
			$this->db->update('news',$data);
		}
		public function search($text){
			$this->db->like('news.title',$text);
			$result=$this->db->get_where('news', array('delete'=>FALSE));
			return $result->result();
		}
}