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
		$query = $this->db->get('subcategoria'); 
		return $query->result();
	}

	function get_by_idcategoria($id)
	{
		$query = $this->db->where('idcategoria',$id); 
		$query = $this->db->get('subcategoria'); 
		return $query->result(); 
	}

	function get_by_id($id)
	{
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('subcategoria'); 
		return $query->result();
	}

	function add()
	{
		$datos_insertar=$this->input->post();
		unset($datos_insertar['btn_enviar']);
		$this->db->insert('subcategoria',$datos_insertar);
		return $this->db->insert_id();
	}

	{
		session_start();
		$id_usuario = $_SESSION['usuario']->id;
		$query = $this->db->where('id!=',$id_usuario);
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
		$this->db->delete('subcategoria');
	}

}

/*Fin del archivo m_usuario.php*/ 

	//Apareceran todos los usuarios menos el actual
	function getUser($id){
		if ($this->db->query('SELECT * FROM usuario 
 
		WHERE id <> $id'))
		{
			return $query->result(); 
		}
		else
		{
			return false;
		};
	}
	
	function setAdmin($id)
	{
		if ($this->db->query('UPDATE `usuario` SET `permisos`= "Master" WHERE id = '.$id))
		{
			return true;
		}else
		{
			return false;
		};
		
	}
	function removeAdmin($id)
	{
		if ($this->db->query('UPDATE `usuario` SET `permisos`= "Usuario" WHERE id = '.$id))
		{
			return true;
		}else
		{
			return false;
		};
	}
	
}

/* Fin del archivo M_contacto.php */ 
