<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		//Añadiremos las validaciones de ls libreria
		$this->load->helper(array('url','form')); //para redireccionar paginas
		$this->load->library(array('form_validation', 'upload'));
		$this->load->model('M_banner');
	}
	
	public function index()
	{
		$data['listado'] = $this->M_banner->get_todos();
		$this->load->view('admin/view_read_banner.php', $data);
	
	}
	public function preview(){
		$data['listado'] = $this->M_banner->get_todos();
		$this->load->view('admin/preview_banner.php',$data);
	}
	public function eliminar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{
			$this->M_banner->delete($id);
			redirect('panel/banner');	
		}
			}
	function subirImagen(){
		$config['upload_path'] = './uploads/imagenesBanner';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '1013';
        $config['max_height'] = '313';

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

        if (!$this->upload->do_upload("fileimagen")) {
            $data['error'] = $this->upload->display_errors();
			$this->load->view('admin/view_banner.php',$data);
        } else {

            $file_info = $this->upload->data();

         //   $this->crearMiniatura($file_info['file_name']);

			$titulo = $this->input->post('titulo');
			$descripcion = $this->input->post('descripcion');
            $imagen = $file_info['file_name'];
            
            $subir = $this->M_banner->uploadBanner($titulo,$imagen, $descripcion);      
            $data['titulo'] = $titulo;
			$data['url_imagen'] = $imagen;
			$data['descripcion'] = $descripcion;
			$data['error']='';
			$this->load->view('admin/view_banner.php', $data);
            
		}	
	}

	
	
	function get_by_id($id){
	
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('usuario'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}

	public function modificar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{
		if($this->input->post()){
			$this->mis_reglas();
			if($this->form_validation->run()==TRUE){
				$this->M_usuarios->edit($id);
				redirect('panel/usuarios/');	
			}else{
				$this->load->view('admin/view_add_usuarios');
			}
			}else{
				$data['datos_usuarios'] =$this->M_usuarios->get_by_id($id);
		
				if(empty($data['datos_usuarios'])){
					echo "Este personaje no existe";
				}else{
					//print_r($data['datos_categorias']);
					$this->load->view('admin/view_add_usuarios', $data);
				}
			}
		}
	}

	
	
}
