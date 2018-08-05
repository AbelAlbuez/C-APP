<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_usuario');
        $this->load->model('m_categoria');
        $this->load->helper('plantilla_usuarios');
    }

    public function index()
	{
		$data['categorias'] = $this->m_categoria->get_todos(); 
		$this->load->view('register', $data);
	}
}