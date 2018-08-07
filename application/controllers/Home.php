<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_categoria');
	}

	public function index()
	{
		$data['categorias'] = $this->m_categoria->get_todos(); 
		$this->load->view('home_view', $data);
	}
}
