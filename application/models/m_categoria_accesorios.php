<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_categoria_accesorios extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_todos()
	{
		$query = $this->db->get('categoria_accesorios'); 
		return $query->result(); 
	}
	
	function get_by_id($id)
	{
		$query = $this->db->where('id', $id); 
		$query = $this->db->get('categoria_accesorios'); 
		return $query->result(); 
	}

	function add($data)
	{
		$this->db->insert('categoria_accesorios', $data);
		return $this->db->insert_id();
	}

	function edit($id)
	{
		$datos_editar=$this->input->post();
		unset($datos_editar['btn_enviar']);
		$query = $this->db->where('id',$id); 
		$this->db->update('categoria_accesorios',$datos_editar);
	}
	
	function delete($id)
	{
		$query = $this->db->where('id',$id); 
		return ($this->db->delete('categoria_accesorios')) ? true : false ;
	}

}

/* Fin del archivo m_categoria.php */ 