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
        $this->load->library('recaptcha');
        
	}

	public function index()
	{
        session_start();
        if(empty($_SESSION))
        {
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $this->load->view('login',$data);
        }else{
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $this->load->view('home_view',$data);
        }
    }
    
    public function IniciarSesion ()
    {
        session_start();
        if(empty($_SESSION))
        {
            if(isset($_POST))
            {
                $this->m_login->validar($_POST);

            }
        }else{
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $this->load->view('home_view',$data); 

        }
    }
    public function CerrarSesion ()
    {
        $this->m_login->CerrarSesion();
        
    }

    public function Registrar()
    {
        session_start();
        
        if(empty($_SESSION)){
            if(isset($_POST) and !empty($_POST) )
            {
                $this->m_login->Registrar($_POST);
                
            }else{
                $data['categorias'] = $this->m_categoria->get_todos(); 
                $this->load->view('Register',$data);
            }
        }else{
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $this->load->view('home_view',$data);  
        }
        
    }
}
