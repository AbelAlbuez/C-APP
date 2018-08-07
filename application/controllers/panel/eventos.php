<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		//Añadiremos las validaciones de ls libreria
		$this->load->helper('url'); //para redireccionar paginas
		$this->load->library('form_validation');
		$this->load->model('M_eventos');
	
	}
	public function index()
	{
		$data['eventos_listado'] = $this->M_eventos->get_todos();
		//$this->load->view('admin/view_categorias.php', $data);
		$this->load->view('admin/view_eventos.php', $data);
	}
	public function agregar(){
		//$this->load->view('admin/view_add_eventos.php');
		//esto es para ver si tengo algo en post
		if($this->input->post()){
			$this->mis_reglas();
		if ($this->form_validation->run() == TRUE){
			/*echo "Informacion recibida </br>";
			print_r($this->input->post());*/
			//$this->load->model('M_contactos');
			$id_insertado = $this->M_eventos->add();
			
			redirect('panel/eventos');
			
		}else{
			//echo "Error en la validacion </br>";
			$this->load->view('admin/view_add_eventos.php');
		}
		}else{
			$this->load->view('admin/view_add_eventos.php');
		}
	}

	function get_by_id($id){
	
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('eventos'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}

	public function modificar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}
		if($this->input->post()){
			$this->mis_reglas();
			if($this->form_validation->run()==TRUE){
				$this->M_noticias->edit($id);
				redirect('panel/eventos/');	
			}else{
				$this->load->view('admin/view_add_neventos.php');
			}
			}else{
				$data['datos_eventos'] =$this->M_eventos->get_by_id($id);
		
				if(empty($data['datos_eventos'])){
					echo "Este personaje no existe";
				}else{
					//print_r($data['datos_categorias']);
					$this->load->view('admin/view_add_eventos.php', $data);
				}
			}
		
		
		
	}
	public function eliminar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{
			$this->M_eventos->delete($id);
			redirect('panel/eventos');	
		}
			}

}
