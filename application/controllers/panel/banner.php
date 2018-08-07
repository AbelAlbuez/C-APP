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
	 function preview(){
		$data['listado'] = $this->M_banner->get_todos();
		$this->load->view('admin/preview_banner.php',$data);
	}
	 function eliminar($id = null)
	{
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{
	
			$this->M_banner->delete($id);
			redirect('panel/banner');	
		}
	}
	function subirImagen($id){
		$config['upload_path'] = './uploads/imagenesBanner';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

        if (!$this->upload->do_upload("fileimagen")) {
            $data['error'] = $this->upload->display_errors();
			$data['datos_banner'] =$this->M_banner->get_by_id($id);
			$this->load->view('admin/view_banner', $data);
        } else {

            $file_info = $this->upload->data();
         //   $this->crearMiniatura($file_info['file_name']);
			$titulo = $this->input->post('titulo');
			$descripcion = $this->input->post('descripcion');
			$imagen = $file_info['file_name'];
			$posicion = $this->input->post('posicion');
            $datos_usuario= array('titulo'=> $titulo, 'descripcion'=> $descripcion, 'url_imagen'=> $imagen, 'posicion'=> $posicion);
            $subir = $this->M_banner->uploadBanner($id, $datos_usuario);      
           /* $data['titulo'] = $titulo;
			$data['url_imagen'] = $imagen;
			$data['descripcion'] = $descripcion;
			$data['error']='';*/
			redirect('panel/banner');	
            
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
			$data['error']='';
			$data['datos_banner'] =$this->M_banner->get_by_id($id);
			$this->load->view('admin/view_banner', $data);
				
			
		}
	}


	
	
}
