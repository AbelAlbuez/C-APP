<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();

        
    }


    public function logueate ($usuario, $contrasena)
    {
		$sql="
		SELECT * FROM usuario WHERE (username= ? or correo= ?) and contrasenia = ?";
		
		$query= $this->db->query($sql, array($usuario,$usuario, $contrasena));
		return $query->result();;
		
      

    }

    public function CerrarSesion()
    {

            
    }
          
      
        
    
}
