<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
        
		parent::__construct();
        $this->load->model('m_categoria');
        $this->load->model('m_login');
        $this->load->helper('plantilla_usuarios');
        $this->load->helper('url');
        
	}

	public function index()
	{
        
		$data['categorias'] = $this->m_categoria->get_todos(); 
		$this->load->view('login',$data);
    }
    
    public function IniciarSesion ()
    {
        if(isset($_POST))
        {
            $this->m_login->validar($_POST);

        }

    }
    public function CerrarSesion ()
    {
        $this->m_login->CerrarSesion();
        
    }

    public function Registrar()
    {
        if(isset($_POST) and !empty($_POST) )
        {
            $this->m_login->Registrar($_POST);
            
        }else{
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $this->load->view('Register',$data);
        }
        
    }
}
