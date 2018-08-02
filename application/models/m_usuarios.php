<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usuarios extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_todos()
	{
		$query = $this->db->get('usuario'); 
		return $query->result(); 
	}
	
	function get_by_id($id)
	{
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('usuario'); 
		return $query->result(); 
	}

	

	function edit($id)
	{
		$datos_editar=$this->input->post();
		unset($datos_editar['btn_enviar']);
		$query = $this->db->where('id',$id); 
		$this->db->update('usuario',$datos_editar);
	}
	
	function delete($id)
	{
		$query = $this->db->where('id',$id); 
		$this->db->delete('usuario');
	}
}

/* Fin del archivo M_contacto.php */ 
