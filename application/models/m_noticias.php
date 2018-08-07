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

	function add($datos_usuario){
		return $this->db->insert('noticias', $datos_usuario);
	}
	function edit($datos_noticias, $id){
	
		$query = $this->db->where('id',$id); 
		$this->db->update('noticias',$datos_noticias);
	}
	function delete($id){
		$query = $this->db->where('id',$id); 
		$this->db->delete('noticias');
	}
}


/*Fin del archivo M_noticias.php*/ 
