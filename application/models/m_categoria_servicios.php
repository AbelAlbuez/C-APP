<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_categoria_servicios extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_todos()
	{
		$query = $this->db->get('categoria_servicios'); 
		return $query->result(); 
	}
	
	function get_by_id($id)
	{
		$query = $this->db->where('id', $id); 
		$query = $this->db->get('categoria_servicios'); 
		return $query->result(); 
	}

	function get_by_subcategoria_filter($id, $data)
	{
		$query = $this->db->like('titulo_anuncio', $data);
		$query = $this->db->where('id_subcategoria', $id); 
		$query = $this->db->get('categoria_servicios'); 
		return $query->result(); 
	}

	function get_by_categoria_filter($id, $data)
	{
		$query = $this->db->like('titulo_anuncio', $data);
		$query = $this->db->where('idcategoria', $id); 
		$query = $this->db->get('categoria_servicios'); 
		return $query->result(); 
	}

	function get_by_filter($data)
	{
		$query = $this->db->like('titulo_anuncio', $data);
		$query = $this->db->get('categoria_servicios'); 
		return $query->result(); 
	}

	function add($data)
	{
		$this->db->insert('categoria_servicios', $data);
		return $this->db->insert_id();
	}

	function update($id, $values)
	{
		$query = $this->db->where('id',$id); 
		$this->db->update('categoria_servicios', $values);
	}
	
	function delete($id)
	{
		$query = $this->db->where('id',$id); 
		return ($this->db->delete('categoria_servicios')) ? true : false ;
	}
}

/* Fin del archivo m_categoria_servicios .php */