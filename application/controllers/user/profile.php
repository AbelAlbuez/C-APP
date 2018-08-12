<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
	{
        
		parent::__construct();

        $this->load->model(array('m_login', 'M_categoria'));

        $this->load->helper('url');
		$this->load->library('recaptcha');
        
	}
	function mis_validaciones(){
		$this->form_validation->set_rules('correo', 'Correo Electronico o Username', 'required');
		$this->form_validation->set_rules('contrasenia', 'Contraseña', 'required|max_length[60]|min_length[5]');
		
	
	}

	public function index()
	{  			
			$data['categorias'] = $this->M_categoria->get_todos(); 
            $this->load->view('action_user/view_profile', $data);		
	}
    
    public function Editar ()
    {
        
	}
	
   

}
