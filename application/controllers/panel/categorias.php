<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		//Añadiremos las validaciones de ls libreria
		$this->load->helper('url'); //para redireccionar paginas
		$this->load->library('form_validation');
		$this->load->model('M_categoria');
	}
	function mis_reglas(){
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[60]|min_length[3]');
	}
	public function index()
	{
		$data['listado'] = $this->M_categoria->get_todos();
		$this->load->view('admin/view_categorias.php', $data);
		

	
	}

	public function agregar(){
		//esto es para ver si tengo algo en post
		if($this->input->post()){
			$this->mis_reglas();
		if ($this->form_validation->run() == TRUE){
			/*echo "Informacion recibida </br>";
			print_r($this->input->post());*/
			//$this->load->model('M_contactos');
			$id_insertado = $this->M_categoria->add();
			
			redirect('panel/categorias');
			
		}else{
			//echo "Error en la validacion </br>";
			$this->load->view('admin/view_add_categorias.php');
		}
		}else{
			$this->load->view('admin/view_add_categorias.php');
		}


	}
	function get_by_id($id){
	
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('categoria'); 
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
				$this->M_categoria->edit($id);
				redirect('panel/categorias/');	
			}else{
				$this->load->view('admin/view_add_categorias');
			}
			}else{
				$data['datos_categorias'] =$this->M_categoria->get_by_id($id);
		
				if(empty($data['datos_categorias'])){
					echo "Este personaje no existe";
				}else{
					//print_r($data['datos_categorias']);
					$this->load->view('admin/view_add_categorias', $data);
				}
			}
		
		
		
	}
	public function eliminar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{
			$this->M_categoria->delete($id);
			redirect('panel/categorias');	
		}
			}


	public function addSubCategoria($id = null){
				if($id==null or !is_numeric($id)){
					echo 'Error con el id';
					return ;
	}else{
		$this->load->view('admin/view_add_subcategorias.php');
		
	}}

}
