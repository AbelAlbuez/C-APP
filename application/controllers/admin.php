<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url'); //para redireccionar paginas
		$this->load->library('form_validation');
		$this->load->model(array('M_categoria_accesorios',
		'M_categoria_componentes','M_categoria_servicios','M_categoria_servicios','M_categoria',
		 'M_usuarios','M_noticias','M_eventos'));
		$this->load->helper('plantilla_usuarios');
		//session_start();
	}

	public function index()
	{   
		

		$this->load->view('view_panel_admin.php');

		 
	}
}
