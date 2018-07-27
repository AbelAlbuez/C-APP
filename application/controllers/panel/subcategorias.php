<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategorias extends CI_Controller {
	
	
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
		$this->load->model('M_subcategorias');
		$this->load->model('M_categoria');
	}
	function mis_reglas(){
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[60]|min_length[3]');
	}
	public function index()
	{	
		redirect('panel/subCategorias/load','refresh');
	}
	
	public function load($id=null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else {
			$data['listado'] = $this->M_subcategorias->get_by_idcategoria($id);
			//$idcategoria=$id;
			$data['listado_contado'] =$this->M_categoria->get_by_id($id);	
			$this->load->view('admin/view_subcategorias.php', $data);
		}
	 
	}
	public function agregar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{

			
			$data['datos_contactos'] =$this->M_categoria->get_by_id($id);	
			if(empty($data['datos_contactos'])){
				echo "Este personaje no existe";
			}else{
				if($this->input->post()){
					$this->mis_reglas();
				if ($this->form_validation->run() == TRUE){
					/*echo "Informacion recibida </br>";
					print_r($this->input->post());*/
					//$this->load->model('M_contactos');
					$id_insertado = $this->M_subcategorias->add();
				
					redirect('panel/subcategorias/load/'.$id);
					
				}else{
				//print_r($data['datos_contactos']);
				$this->load->view('admin/view_add_subcategorias.php', $data);
				}
				}else{
				//print_r($data['datos_contactos']);
				$this->load->view('admin/view_add_subcategorias.php', $data);
				}
			}
		
	}

	}
	
	public function modificar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{
		if($this->input->post()){
			$this->mis_reglas();
			if($this->form_validation->run()==TRUE){
				$this->M_subcategorias->edit($id);
				$datos_editar=$this->input->post();
				$id=$datos_editar['idcategoria'];
				redirect('panel/subcategorias/load/'.$id);	
			}else{
				$this->load->view('admin/view_add_subcategorias');
			}
			}else{
				$data['datos_categorias'] =$this->M_subcategorias->get_by_id($id);
		
				if(empty($data['datos_categorias'])){
					echo "Este personaje no existe";
				}else{
					//print_r($data['datos_categorias']);
					$this->load->view('admin/view_add_subcategorias', $data);
				}
			}
		
		
		
	}}
	public function eliminar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else {
		
		
		if($this->input->post()){
			$id_eliminar = $this->input->post('id');
			$this->M_subcategorias->delete($id_eliminar);
			
			echo "
			<script>
			alert('ELIMINO');
			</script>
			";
			redirect('panel/categorias');	
		}else{
			$data['datos_categorias'] =$this->M_subcategorias->get_by_id($id);
		
				if(empty($data['datos_categorias'])){
					echo "Este personaje no existe";
				}else{
				
end;
				//	redirect('panel/categorias');
				}
		}
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
