<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_categoria');
		$this->load->helper('plantilla_usuarios');
		$this->load->model('M_eventos');
		session_start();
	}

	public function index()
	{
		
		$data['eventos_listado'] = $this->M_eventos->get_todos();
		$data['categorias'] = $this->m_categoria->get_todos(); 
		$this->load->view('eventos_view', $data);
	}
	// public function index_eventos()
	// {
	// 	//esto para cargar la vista de eventos para usuarios.
	// 	$limit=100;
	// 	$data['eventos_listado'] = $this->M_eventos->getLimit($limit);
	// 	$data['categorias'] = $this->m_categoria->get_todos();
	// 	$this->load->view('eventos_view',$data);
	// }
	public function singleEvento()
	{
		if(isset($_GET['id']) and is_numeric($_GET['id']))
		{
			$id= $_GET['id'];
			$evento = $this->get_by_id($id);
			$data['evento']=$evento;
			$data['categorias'] = $this->m_categoria->get_todos();
			$this->load->view('singleEvento',$data);

		}else{
			redirect('Eventos/');	
		}
		
	}
	function get_by_id($id){
		
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('eventos'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}
}
