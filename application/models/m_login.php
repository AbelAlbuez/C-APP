<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('encrypt');
        
    }


    public function validar ($usuario)
    {
      $captcha_answer = $this->input->post('g-recaptcha-response');
      $response = $this->recaptcha->verifyResponse($captcha_answer);
     
      if($response['success'])
      {
        
        unset($usuario['g-recaptcha-response']);
        $correo = $usuario['correo'];
        $contrasenia =$usuario['contrasenia'];
        $query = $this->db->query( "SELECT * FROM usuario WHERE correo= '$correo'");
        $resultado = $query->result();
        if((count($resultado)+0 ) > 0)
        { 
          $contraseniaValida= $this->encrypt->decode($resultado[0]->contrasenia);
          if($contraseniaValida == $contrasenia )
          {
            $_SESSION['usuario'] = $resultado[0];
            if($_SESSION['usuario']->permisos == 'Master')
            {
              redirect('admin/');
            }else
            {
              redirect('home/');
            }
            
          }else
          {
            //Si la contrasenia es incorrecta
            $data['categorias'] = $this->m_categoria->get_todos();
            $data['alerta'] = 'danger';
            $data['mensaje'] = 'Clave incorrecta';
            $this->load->view('login', $data);
          }
        }
        else
        {
          //Si el correo es incorrecto
          $data['categorias'] = $this->m_categoria->get_todos();
          $data['alerta'] = 'danger';
          $data['mensaje'] = 'Correo incorrecto';
          $this->load->view('login', $data);
        }

      }else{
        //captchat no valido
        $data['categorias'] = $this->m_categoria->get_todos();
        $data['alerta'] = 'danger';
        $data['mensaje'] = 'Captchat no valido';
        $this->load->view('login', $data);
      }
      

    }

    public function CerrarSesion()
    {
        /// en las siguientes tres linias creo que hay un maco ,por favor preguntarme klk y revisar.
            session_start();
            session_destroy();
            session_start();
            $this->IrHome();
            
          }
          
          public function Registrar($usuario)
    { 
      
      $captcha_answer = $this->input->post('g-recaptcha-response');
      $response = $this->recaptcha->verifyResponse($captcha_answer);
     
      if($response['success'])
      {
        //confirmar si ya esta registrado el correo
        $correo = $usuario['correo'];   
        $query = $this->db->query( "SELECT * FROM usuario WHERE correo= '$correo' ");
        $resultado = $query->result();
        if((count($resultado)+0 ) <= 0)
        {                                        //guardando
          unset($usuario['g-recaptcha-response']);
          $usuario['contrasenia'] = $this->encrypt->encode($usuario['contrasenia']);//encriptando contrasenia
          $usuario['tipo'] = 'vendedor';
          $usuario['permisos'] = 'Master';
          ini_set('date.timezone','America/Santo_Domingo'); // hora
          $usuario['fecha'] = date('Y-m-d',time());
          $this->db->insert('usuario',$usuario); // guardando el usuario
  
          //iniciando sesion
          $contrasenia = $usuario['contrasenia'];
          $query = $this->db->query( "SELECT * FROM usuario WHERE correo= '$correo' AND contrasenia= '$contrasenia'");
          $resultado = $query->result();
          if((count($resultado)+0 ) > 0)
          {
            
            $_SESSION['usuario'] = $resultado[0];
            
            redirect('home/');
          }
          else
          {
            echo "hay un maco";
          }
        }else{
          $data['alerta']='danger';
          $data['mensaje'] = 'El email ya ha sido registrado , intenta con otro .';
          $data['categorias'] = $this->m_categoria->get_todos(); 
          $this->load->view('register', $data);
          
        }

      }else{
        $data['categorias'] = $this->m_categoria->get_todos(); 
        $this->load->view('register', $data);
      }
     
      
        
    }//aqui termina el metodo

    function IrHome()
    {
      $data['categorias'] = $this->m_categoria->get_todos(); 
      $this->load->view('home_view', $data);
    }
}
