<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_categoria_bicicletas extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_todos()
	{
		$query = $this->db->get('categoria_bicicletas'); 
		return $query->result(); 
	}
	
	function get_by_id($id)
	{
		$query = $this->db->where('id', $id); 
		$query = $this->db->get('categoria_bicicletas'); 
		return $query->result(); 
	}

	function add($data)
	{
		$this->db->insert('categoria_bicicletas', $data);
		return $this->db->insert_id();
	}

	function update($id, $values)
	{
		$query = $this->db->where('id',$id); 
		$this->db->update('categoria_bicicletas', $values);
	}
	
	function delete($id)
	{
		$query = $this->db->where('id',$id); 
		return ($this->db->delete('categoria_bicicletas')) ? true : false ;
	}

}

/* Fin del archivo m_categoria_bicicletas .php */