<?php
class Admin_model extends CI_Model {
	public function validate(){
		$query=$this->db->get_where('admin', array('username'=>$this->input->post('username'), 'password'=>$this->input->post('password')));
		return $query;
	}
}