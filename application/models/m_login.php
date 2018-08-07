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
      session_start();
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
          if($_SESSION['usuario']->tipo == 1)
          {
            $this->load->view('view_panel_admin.php');
          }else
          {
            $this->IrHome();
          }
          
        }else
        {
          echo"Aqui deberia ir una alerta , contrasenia incorrecta";
        }
      }
      else
      {
        $this->IrHome();
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
                                               //confirmar si ya esta registrado el correo
      $correo = $usuario['correo'];   
      $query = $this->db->query( "SELECT * FROM usuario WHERE correo= '$correo' ");
      $resultado = $query->result();
      if((count($resultado)+0 ) <= 0)
      {                                        //guardando

        $usuario['contrasenia'] = $this->encrypt->encode($usuario['contrasenia']);//encriptando contrasenia
        $usuario['tipo'] = 1;
        ini_set('date.timezone','America/Santo_Domingo'); // hora
        $usuario['fecha'] = date('Y-m-d',time());
        $this->db->insert('usuario',$usuario); // guardando el usuario

        //iniciando sesion
        $contrasenia = $usuario['contrasenia'];
        $query = $this->db->query( "SELECT * FROM usuario WHERE correo= '$correo' AND contrasenia= '$contrasenia'");
        $resultado = $query->result();
        if((count($resultado)+0 ) > 0)
        {
          session_start();
          $_SESSION['usuario'] = $resultado[0];
          
          $this->IrHome();
        }
        else
        {
          echo "hay un maco";
        }
      }else{
        var_dump($resultado);
        echo count($resultado) ;
        echo "Este correo ya ha sido registrado";
      }
      
        
    }

    function IrHome()
    {
      $data['categorias'] = $this->m_categoria->get_todos(); 
      $this->load->view('home_view', $data);
    }
}
