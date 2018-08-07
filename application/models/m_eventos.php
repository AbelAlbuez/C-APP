<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_eventos extends CI_Model{
	function __construct()
	{
		parent::__construct();
			//Esto es para acceder a la conexion
			$this->load->database();
	}
	function get_todos(){
	
		$query = $this->db->get('eventos'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}
	function get_by_idcategoria($id){
	
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('eventos'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}
	function get_by_id($id){
	
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('eventos'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}
	function add(){
	
		$datos_insertar=$this->input->post();
		unset($datos_insertar['btn_enviar']);
		$this->db->insert('eventos',$datos_insertar);
		return $this->db->insert_id();

	}
	function edit($id){
		
		$datos_editar=$this->input->post();
		unset($datos_editar['btn_enviar']);
		$query = $this->db->where('id',$id); 
		$this->db->update('eventos',$datos_editar);
	}
	function delete($id){
		$query = $this->db->where('id',$id); 
		$this->db->delete('eventos');
	}
}


/*Fin del archivo M_noticias.php*/ 
