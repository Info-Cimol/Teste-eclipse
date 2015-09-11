<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct(){
		parent::__construct();
		$this->load->model('news_model');
	 }
	public function index()
	{
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
		$this->load->template('index', $data);
	}
	public function sobre(){
		$this->load->template('sobre');
	}
	public function ver($id, $slug=NULL){
		if($slug == NULL){
				$data['news_item'] = $this->news_model->get_news($id);
				if (empty($data['news_item']))
				{
						show_404();
				}else{
					$this->load->helper('url');
					redirect("{$data['news_item']['id']}/{$data['news_item']['slug']}/");
				}
			}else{
				$data['news_item'] = $this->news_model->get_news($id, $slug);
				if (empty($data['news_item']))
				{
						show_404();
				}else{
					$data['title'] = $data['news_item']['title'];
					$this->load->template('ver', $data);
				}
				
			}		
	}
	public function search(){
		$this->load->template('search');
	}
	public function getSearch(){
		$search=$this->input->post('search');
		$result=$this->news_model->search($search);
		echo json_encode($result);
	}
}
