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
		$this->load->model(array('M_noticias','M_categoria', 'm_banner'));

	
	}
	public function index()
	{
		$data['noticias_listado'] = $this->M_noticias->get_todos();

		//$this->load->view('admin/view_categorias.php', $data);
		$this->load->view('admin/view_noticias.php', $data);
	}
	public function agregar(){
			$data['error']='';
			$data['fechaActual'] = date('d-m-Y H:i:s');
			$this->load->view('admin/view_add_noticias.php',$data);
	}
	function subirImagen(){
		$config['upload_path'] = './uploads/noticias';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

        if (!$this->upload->do_upload("fileimagen")) {
			$data['error'] = $this->upload->display_errors();
	
			$this->load->view('admin/view_add_noticias.php',$data);
        } else {

            $file_info = $this->upload->data();
		   $this->crearMiniatura($file_info['file_name']);
		 $fecha_actual = date('Y-m-d');
		 $titulo = $this->input->post('titulo');
		 $descripcion = $this->input->post('descripcion');
		 $fecha = $fecha_actual;
		 $imagen = $file_info['file_name'];
		 $datos_noticias= array(
			 'titulo'=> $titulo, 'descripcion'=> $descripcion, 'url_imagen'=> $imagen,
		 'fecha_de_creacion'=>$fecha);
		   $subir = $this->M_noticias->add($datos_noticias);      
           /* $data['titulo'] = $titulo;
			$data['url_imagen'] = $imagen;
			$data['descripcion'] = $descripcion;
			$data['error']='';*/
			redirect('panel/noticias');	
            
		}	
	}

	function crearMiniatura($filename){
        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/noticias/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']='./uploads/thumb/';
        $config['thumb_marker']='';//captura_thumb.png
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }

	function editarNoticias($id){
		$config['upload_path'] = './uploads/noticias';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

        if (!$this->upload->do_upload("fileimagen")) {
			$data['error'] = '';
			$data['datos_noticias'] =$this->M_noticias->get_by_id($id);
			$imagen = $data['datos_noticias'][0]->url_imagen;
			$fecha_actual = date('Y-m-d');
			$titulo = $this->input->post('titulo');
			$descripcion = $this->input->post('descripcion');
			$fecha = $fecha_actual;
        	$datos_noticias= array(
				'titulo'=> $titulo, 'descripcion'=> $descripcion, 'url_imagen'=> $imagen,
			'fecha_de_creacion'=>$fecha);
            $subir = $this->M_noticias->edit($datos_noticias, $id); 
			redirect('panel/noticias');	
       		 } else {
            $file_info = $this->upload->data();
		    $this->crearMiniatura($file_info['file_name']);
		 	$fecha_actual = date('Y-m-d');
			 $titulo = $this->input->post('titulo');
		 	$descripcion = $this->input->post('descripcion');
		 	$fecha = $fecha_actual;
			$imagen = $file_info['file_name'];
        	$datos_noticias= array(
				'titulo'=> $titulo, 'descripcion'=> $descripcion, 'url_imagen'=> $imagen,
			'fecha_de_creacion'=>$fecha);
            $subir = $this->M_noticias->edit($datos_noticias, $id);      
           /* $data['titulo'] = $titulo;
			$data['url_imagen'] = $imagen;
			$data['descripcion'] = $descripcion;
			$data['error']='';*/
			redirect('panel/noticias');	
            
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
		}else{
		if($this->input->post()){
			$this->mis_reglas();
			if($this->form_validation->run()==TRUE){
				$this->M_noticias->edit($id);
				redirect('panel/noticias/');	
			}else{
				$data['error']='';
				$this->load->view('admin/view_edit_noticias.php', $data);
			}
			}else{
				$data['fechaActual'] = date('d-m-Y H:i:s');
				$data['datos_noticias'] =$this->M_noticias->get_by_id($id);
		
				if(empty($data['datos_noticias'])){

					echo "Este personaje no existe";
				}else{
					$data['error']='';
					//print_r($data['datos_categorias']);
					$this->load->view('admin/view_edit_noticias.php', $data);
				}
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

	public function View_User(){
		$data['banners'] = $this->m_banner->get_todos();
	
		$data['noticias_listado'] = $this->M_noticias->get_todos();
		$data['categorias'] = $this->M_categoria->get_todos(); 
		//$this->load->view('admin/view_categorias.php', $data);
		$this->load->view('view_noticias_user.php', $data);
	}
	public function View_Notice_Detail($id=null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{
		$data['banners'] = $this->m_banner->get_todos();
		
		$data['noticia'] = $this->M_noticias->get_by_id($id);
		$data['categorias'] = $this->M_categoria->get_todos(); 
		//$this->load->view('admin/view_categorias.php', $data);
		$this->load->view('view_noticias_detail.php', $data);
	}}

}
