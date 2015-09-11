<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
	function __construct()
	{
		parent::__construct();
                $this->load->model('news_model');
	}
	
	function index(){
		if($this->is_logged_in()){
			$this->session->unset_userdata('is_logged_in');
			redirect(base_url());
		}else{
			$this->load->template('login_form');
		}
	}
        
        function ver(){
            if($this->is_logged_in()){
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'Notícias';
                $this->load->library('pagination');
                $config['base_url']=base_url().'site/page';
                $config['total_rows']=$this->news_model->news_total();
                $config['per_page']=5;
                $config["uri_segment"] = 3;
                $config['first_url'] = base_url();
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $this->pagination->initialize($config);
                $data["results"] = $this->news_model->
                fetch_news($config["per_page"], $page);
                $data["links"] = $this->pagination->create_links();
                $this->load->template('admin_view',$data);     
            }else{
                $this->load->template('login_form');
            }
        }
        
	function post(){
		if($this->is_logged_in()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'text', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->template('create');
			}else{
				$this->load->model('news_model');
				$this->news_model->set_news();
				redirect(base_url()."admin/ver");
			}
		}else{
			$this->load->template('login_form');
		}
	}
	
	function login(){
		$this->load->model('admin_model');
		$query=$this->admin_model->validate();
		if($query->num_rows()==1)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect(base_url()."admin/ver");
		}
		else
		{
			$this->index();
		}
	}
	
	function delete(){
		if($this->is_logged_in()){
			$this->load->model('news_model');
			$this->news_model->delete_news($this->uri->segment(3));
			redirect(base_url()."admin/ver");
		}else{
			$this->load->template('login_form');
		}
	}
	
	function is_logged_in()
	{
		$this->load->library('session');
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			return false;
		}else{
			return true;
		}
	}	
}