<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		if($this->input->post())
		{
			$this->mis_validaciones();
			if ($this->form_validation->run() == TRUE)
			{
				$correo=$this->input->post('correo');
				$contraseña = $this->input->post('contrasenia');
				$encriptada =md5($contraseña);
			
				$validar =$this->m_login->logueate($correo,$encriptada);
				
			if(empty($validar)){
			
				echo "No logueado";
				
			}else{
				session_start();

				$_SESSION['info_user'] = $validar;
		
				
				redirect('Home','refresh');
				
			}
			}else{
				
			$data['categorias'] = $this->M_categoria->get_todos(); 
            $this->load->view('action_user/login', $data);
			}
		}
		else
		{
			

			$data['categorias'] = $this->M_categoria->get_todos(); 
            $this->load->view('action_user/login', $data);
		}
			
	}

    
    public function IniciarSesion ()
    {
        
	}
	
    public function CerrarSesion ()
    {
		session_start();
		session_destroy();
		session_unset();
		
		redirect(base_url());
		
    }

}
