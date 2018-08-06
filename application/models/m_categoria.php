<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_categoria extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_todos()
	{
		$query = $this->db->get('categoria'); 
		return $query->result(); 
	}
	
	function get_by_id($id)
	{
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('categoria'); 
		return $query->result(); 
	}

	function add()
	{
		$datos_insertar=$this->input->post();
		unset($datos_insertar['btn_enviar']);
		$this->db->insert('categoria',$datos_insertar);
		return $this->db->insert_id();
	}

	function edit($id)
	{
		$datos_editar=$this->input->post();
		unset($datos_editar['btn_enviar']);
		$query = $this->db->where('id',$id); 
		$this->db->update('categoria',$datos_editar);
	}
	
	function delete($id)
	{
		echo $id;
		$query = $this->db->where('id',$id); 
		$this->db->delete('categoria');
	}
}

/* Fin del archivo M_contacto.php */ 
