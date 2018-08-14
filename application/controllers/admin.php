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
		'M_categoria_componentes','M_categoria_servicios','M_categoria_bicicletas','M_categoria',
		 'M_usuarios','M_noticias','M_eventos','m_subcategorias','m_banner'));
		$this->load->helper('plantilla_usuarios');
		//session_start();
	}

	public function index()
	{   
		$data['categorias_servicios'] = $this->M_categoria_servicios->get_todos();
		$data['ategoria_bicicletas'] = $this->M_categoria_bicicletas->get_todos();
		$data['categoria_componentes'] = $this->M_categoria_componentes->get_todos();
		$data['categoria'] = $this->M_categoria->get_todos();
		$data['eventos'] = $this->M_eventos->get_todos(); 

		$data['usuarios'] =  $this->M_usuarios->get_todos();
		$data['noticias'] = $this->M_noticias->get_todos();

		$this->load->view('view_panel_admin.php', $data);

		 
	}
}
