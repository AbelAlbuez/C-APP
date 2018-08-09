<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url'); //para redireccionar paginas
		$this->load->library('form_validation');
		$this->load->model('M_categoria');
		$this->load->helper('plantilla_usuarios');
		//session_start();
	}

	public function index()
	{   
		$this->load->view('view_panel_admin.php');
	/*	if(!empty($_SESSION)){
			if($_SESSION['usuario']->permisos == 'Master')
			{
			   
				}else{
					$data['categorias'] = $this->M_categoria->get_todos(); 
					$this->load->view('home_view', $data);
			   }

		}else{
			$data['categorias'] = $this->M_categoria->get_todos(); 
			$this->load->view('home_view', $data);
		
		}*/
		 
	}
}
