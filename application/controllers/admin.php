<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url'); //para redireccionar paginas
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('view_panel_admin.php');
	}
}
