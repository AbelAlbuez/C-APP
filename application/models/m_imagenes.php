<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_imagenes extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_todos()
	{
		$query = $this->db->get('imagenes'); 
		return $query->result(); 
	}
	
	function get_by_id($id)
	{
		$query = $this->db->where('id_anuncio',$id); 
		$query = $this->db->get('imagenes'); 
		return $query->result(); 
	}

	function add($data)
	{
		$this->db->insert('imagenes', $data);
		return $this->db->insert_id();
	}

	function edit($id)
	{
		$datos_editar=$this->input->post();
		$query = $this->db->where('id',$id); 
		$this->db->update('imagenes',$datos_editar);
	}
	
	function delete($id)
	{
		$query = $this->db->where('id',$id); 
        return ($this->db->delete('imagenes')) ? true : false ;
	}

}