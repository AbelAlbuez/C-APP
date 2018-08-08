<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {

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
		$this->load->helper(array('url','form')); //para redireccionar paginas
		$this->load->library(array('form_validation', 'upload'));
		$this->load->model('M_noticias');

	
	}
	public function index()
	{
		$data['noticias_listado'] = $this->M_noticias->get_todos();
		//$this->load->view('admin/view_categorias.php', $data);
		$this->load->view('admin/view_noticias.php', $data);
	}
	public function agregar(){

		if($this->input->post()){


			$config['upload_path'] = './uploads/noticias';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
	
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
	
		  
				$file_info = $this->upload->data();
	
			 //   $this->crearMiniatura($file_info['file_name']);
	
				$titulo = $this->input->post('titulo');
				$descripcion = $this->input->post('descripcion');
				$imagen = $file_info['file_name'];
				$data_noticia=array('titulo'=>$titulo, 'descripcion'=>$descripcion, 'url_imagen'=>$imagen);
				$subir =$this->M_noticias->add($data_noticia); 
			
				redirect('panel/noticias');     
					
		}else{
			$this->load->view('admin/view_add_noticias.php');
		}

            
		
	}

	function get_by_id($id){
	
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('noticias'); 
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
				redirect('panel/noticias/');	
			}else{
				$this->load->view('admin/view_add_noticias.php');
			}
			}else{
				$data['datos_noticias'] =$this->M_noticias->get_by_id($id);
		
				if(empty($data['datos_noticias'])){
					echo "Este personaje no existe";
				}else{
					//print_r($data['datos_categorias']);
					$this->load->view('admin/view_add_noticias.php', $data);
				}
			}
		
		
		
	}
	public function eliminar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{
			$this->M_noticias->delete($id);
			redirect('panel/noticias');	
		}
			}

}
