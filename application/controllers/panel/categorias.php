<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		//Añadiremos las validaciones de ls libreria
		$this->load->helper('url'); //para redireccionar paginas
		$this->load->library('form_validation');
		$this->load->model('M_categoria');
	}
	function mis_reglas(){
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[60]|min_length[3]');
	}
	public function index()
	{
		$data['listado'] = $this->M_categoria->get_todos();
		$this->load->view('admin/view_categorias.php', $data);
		

	
	}

	public function agregar(){
		$this->load->view('admin/view_add_categorias.php');
	}
	public function modificar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}}
	public function eliminar($id = null){
			if($id==null or !is_numeric($id)){
				echo 'Error con el id';
				return ;
			}}

}
