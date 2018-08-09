<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class noticias extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_categoria');
		$this->load->helper('plantilla_usuarios');
		session_start();
	}

	public function index()
	{
		$data['categorias'] = $this->m_categoria->get_todos(); 
		$this->load->view('noticias_view', $data);
	}
}
