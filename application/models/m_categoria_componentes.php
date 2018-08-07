<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_categoria_componentes extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_todos()
	{
		$query = $this->db->get('categoria_componentes'); 
		return $query->result(); 
	}
	
	function get_by_id($id)
	{
		$query = $this->db->where('id', $id); 
		$query = $this->db->get('categoria_componentes'); 
		return $query->result(); 
	}

	function add($data)
	{
		$this->db->insert('categoria_componentes', $data);
		return $this->db->insert_id();
	}

	function update($id, $values)
	{
		$query = $this->db->where('id',$id); 
		$this->db->update('categoria_componentes', $values);
	}
	
	function delete($id)
	{
		$query = $this->db->where('id',$id); 
		return ($this->db->delete('categoria_componentes')) ? true : false ;
	}

}

/* Fin del archivo m_categoria_componentes .php */ 