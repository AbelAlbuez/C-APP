<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_noticias extends CI_Model{
	function __construct()
	{
		parent::__construct();
			//Esto es para acceder a la conexion
			$this->load->database();
	}
	function get_todos(){
	
		$query = $this->db->get('noticias'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}
	function get_by_idcategoria($id){
	
		$query = $this->db->where('idcategoria',$id); 
		$query = $this->db->get('noticias'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}
	function get_by_id($id){
	
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('noticias'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}
	function add($data_noticias){
		
	
		return $this->db->insert('noticias',$data_noticias);

	}
	function uploadBanner($datos_usuario){
		return $this->db->insert('noticias', $datos_usuario);
	}
	function edit($id){
		
		$datos_editar=$this->input->post();
		unset($datos_editar['btn_enviar']);
		$query = $this->db->where('id',$id); 
		$this->db->update('noticias',$datos_editar);
	}
	function delete($id){
		$query = $this->db->where('id',$id); 
		$this->db->delete('noticias');
	}
}


/*Fin del archivo M_noticias.php*/ 
