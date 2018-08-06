<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_usuario extends CI_Model{
    function __construct (){
        parent::__construct();
        $this->load->database();
    }

    public function CrearUsuario(){
        
    }
}