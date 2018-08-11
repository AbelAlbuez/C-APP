<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();

        
    }
        public function Registrar($usuario)
    	{ 
	
		$this->db->insert('usuario',$usuario);
    	}
     
      
        
    
}
