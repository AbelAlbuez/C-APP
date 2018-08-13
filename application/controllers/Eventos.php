<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

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
		$this->load->view('eventos_view', $data);
	}
}
