<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_banner extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_todos()
	{
		$query = $this->db->get('banner'); 
		return $query->result(); 
	}
	function get_by_id($id){
	
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('banner'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}
	function uploadBanner($id, $datos_usuario)
	{
	//	return $this->db->insert('banner', $data_titulo);
		var_dump($id);
		var_dump($datos_usuario);
		$query = $this->db->where('id',$id); 
		return $this->db->update('banner', $datos_usuario);
	}

	function editBanner(){

	}
	function delete($id)
	{
		echo $id;
		$query = $this->db->where('id',$id); 
		$this->db->delete('banner');
	}

  

	
}

/* Fin del archivo M_contacto.php */ 
