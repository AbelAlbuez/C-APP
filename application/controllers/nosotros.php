<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->helper('url'); //para redireccionar paginas
        $this->load->model('m_categoria');
        $this->load->helper('plantilla_usuarios');
        $this->load->helper('url');
        $this->load->database();
        session_start();
		
	}

	public function index()
	{
        var_dump($_GET);
        
        $data['categorias'] = $this->m_categoria->get_todos(); 
        $this->load->view('QuienesSomos', $data);
		
    }
    
    public function QuienesSomos(){
        $data['categorias'] = $this->m_categoria->get_todos(); 
        $this->load->view('QuienesSomos', $data);
    }
    public function Publicidad(){
        $data['categorias'] = $this->m_categoria->get_todos(); 
        $this->load->view('publicidad', $data);

    }
    public function Contacto(){
        $data['categorias'] = $this->m_categoria->get_todos(); 
        $this->load->view('contacto', $data);

    }
    public function TerminosDeUso(){
        $data['categorias'] = $this->m_categoria->get_todos(); 
        $this->load->view('terminosDeUso', $data);

    }
}
