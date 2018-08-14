<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_banner','m_usuarios','m_categoria'));
        $this->load->helper('plantilla_usuarios');
        if(!isset($_SESSION)) { session_start(); }
    }

    public function index()
	{
        $data['categorias'] = $this->m_categoria->get_todos();
        $data['banners'] = $this->m_banner->get_todos();

		$this->load->view('mis_anuncios', $data);
    }
    
}