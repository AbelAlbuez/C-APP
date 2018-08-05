<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        
        
    }


    public function validar ($usuario)
    {
     session_start();
      $correo = $usuario['correo'];
      $contrasenia = $usuario['contrasenia'];
      $query = $this->db->query( "SELECT * FROM usuario WHERE correo= '$correo' AND contrasenia= '$contrasenia'");
      $resultado = $query->result();
      if((count($resultado)+0 ) > 0)
      {
            
            $_SESSION['usuario'] = $resultado[0];
              ///No se si esto que viene a continuacion es una buena practica , por favor revisar.
            $data['categorias'] = $this->m_categoria->get_todos(); 
            
            $this->load->view('home_view', $data);
      }
      else
      {
        $data['categorias'] = $this->m_categoria->get_todos();
        $this->load->view('login', $data);
      }

    }

    public function CerrarSesion()
    {
        /// en las siguientes tres linias creo que hay un maco ,por favor preguntarme klk y revisar.
            session_start();
            session_destroy();
            session_start();
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $this->load->view('home_view', $data);
        
    }

    public function Registrar($POST)
    {    
         $usuario = array();
         $usuario['apodo']= " ";
         $usuario['correo']= " ";
         $usuario['contrasenia']= " ";
         $usuario['fecha']= " ";
         $usuario['tipo']= " ";
         $this->db->insert('usuario',$usuario);
        
    }
}
