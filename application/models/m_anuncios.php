<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anuncios extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_todos()
	{

        $this->db->select('titulo_anuncio, descripcion, precio, fecha_de_inicio');    
        $this->db->from('categoria');
        $this->db->join('categoria_bicicletas', 'table1.id = table2.id');
        $this->db->join('table3', 'table1.id = table3.id');
        $query = $this->db->get();
		return $query->result(); 
    
    }

	function get_by_categoria_filter($id, $data)
	{
		$query = $this->db->like('titulo_anuncio', $data);
		$query = $this->db->where('idcategoria', $id); 
		$query = $this->db->get('categoria_accesorios'); 
		return $query->result(); 
	}

	function get_by_filter($data)
	{
		$query = $this->db->like('titulo_anuncio', $data);
		$query = $this->db->get('categoria_accesorios'); 
		return $query->result(); 
	}

}

/* Fin del archivo m_anuncios .php */ 