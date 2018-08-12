<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model(array('M_register', 'M_categoria', 'm_login'));
		$this->load->library('recaptcha');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}
	function mis_validaciones(){
		$this->form_validation->set_rules('correo', 'Correo Electronico', 'required|valid_email');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[60]|min_length[3]');
		$this->form_validation->set_rules('apellido', 'apellido', 'required|max_length[60]|min_length[3]');
		$this->form_validation->set_rules('contrasenia', 'Contraseña', 'required|max_length[60]|min_length[5]');
		$this->form_validation->set_rules('username', 'Nombre de usuario', 'required|max_length[60]|min_length[3]');
	//	$this->form_validation->set_rules('username', 'Edad', 'required|numeric');
	
	}
	public function index()
	{  
		if($this->input->post())
		{
			$this->mis_validaciones();
			if ($this->form_validation->run() == TRUE){
				$contraseña = $this->input->post('contrasenia');
				$encriptada =md5($contraseña);
				$nombre = $this->input->post('nombre');
				$apellido = $this->input->post('apellido');
				$correo = $this->input->post('correo');
				$contrasenia = $this->input->post('contrasenia');
				$username = $this->input->post('username');
				$fecha_actual = date('Y-m-d');
				$fecha = $fecha_actual;
				$tipo = '0';
				
				$usuario= array(
				'nombre'=>$nombre,
				'apellido'=>$apellido,
				'correo'=>$correo,
				'contrasenia'=>$encriptada,
				'username'=>$username,
				'fecha'=>$fecha, 
				'tipo'=>$tipo);
				
				$this->M_register->Registrar($usuario);
				$validar =$this->m_login->logueate($correo,$encriptada);
				if(empty($validar)){
			
					echo "No logueado";
					
				}else{
					session_start();
					$_SESSION['info_user'] = $validar;
					redirect(base_url());	
				}
			}else{
	
				$data['categorias'] = $this->M_categoria->get_todos(); 
				$this->load->view('action_user/register', $data);
			}
				
		}
		else 
		{
			$data['categorias'] = $this->M_categoria->get_todos(); 
			$this->load->view('action_user/register', $data);
		}
            
	}

    
    public function Registrar ()
    {
        
	}
	
  
}
