<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncios extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('image_lib','upload');
    	$this->load->model(array('m_categoria','m_subcategorias', 'm_categoria_accesorios', 'm_imagenes'));
	}

	public function index()
	{
        $data['categorias'] = $this->m_categoria->get_todos(); 
        $this->load->view('crear_anuncios_view', $data);
    }
 
    public function subCategoria()
    {
        if($this->input->post())
        {
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $data['sub_categorias'] = $this->m_subcategorias->get_by_idcategoria($this->input->post('categoria_id'));
            $data['progreso'] = 25;
            $this->load->view('crear_anuncios_view', $data);
        }
        else
        {
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $this->load->view('crear_anuncios_view', $data);    
        }
    }

    public function formulario()
    {
        if($this->input->post())
        {
            $subCategoria = $this->m_subcategorias->get_by_id($this->input->post('data_sub_categoria'));   
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $data['progreso'] = 50;
            $data['paso'] = 2;
            $data['subCategoria_data'] = $subCategoria;
            $data['categoria_data'] = $this->m_categoria->get_by_id($subCategoria[0]->idcategoria);
            
            $this->load->view('crear_anuncios_view', $data);
        }
        else
        {
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $this->load->view('crear_anuncios_view', $data);    
        }
    }
    
    function validaciones($categoria_a_validar)
	{
        # validaciones generales
        $this->form_validation->set_rules('provincia', 'provincia', 'required');
        $this->form_validation->set_rules('celular', 'celular', 'required|min_length[10]');
        $this->form_validation->set_rules('telefono', 'teléfono', 'required|min_length[10]');
        
        # validaciones particulares
        switch ($categoria_a_validar) 
        {
            case 'Accesorios':         
            
                $this->form_validation->set_rules('accesorio', 'accesorio', 'required');
                $this->form_validation->set_rules('marca', 'marca', 'required');
                $this->form_validation->set_rules('modelo', 'modelo', 'required');
                $this->form_validation->set_rules('accion', 'accion', 'required');
                $this->form_validation->set_rules('moneda', 'moneda', 'required');
                $this->form_validation->set_rules('precio', 'precio', 'required|numeric');
                $this->form_validation->set_rules('titulo_anuncio', 'título del anuncio', 'required');
                $this->form_validation->set_rules('descripcion', 'descripción', 'required|min_length[15]');
                
                break;    
            case 'Bicicletas':

                # Formulario de las bicicletas
            
                break;
            case 'Componentes':
            
                # Formulario de los componentes    
        
                break;
            case 'Servicios':
                
                # Formulario de los servicios    

                break;
        }
    }

    public function detalles($id_anuncio = null)
    {
        if($id_anuncio != null && is_numeric($id_anuncio)) # EDITAR
        {
            $id_anuncio = $id_anuncio + 0;
            $anuncio = $this->m_categoria_accesorios->get_by_id($id_anuncio);   
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $data['progreso'] = 50;
            $data['paso'] = 2;
            $data['subCategoria_data'] = $this->m_subcategorias->get_by_id($anuncio[0]->id_subcategoria);
            $data['categoria_data'] = $this->m_categoria->get_by_id($anuncio[0]->idcategoria);
            $data['anuncio'] = $anuncio; 
            $data['imagenes_guardadas'] = $this->m_imagenes->get_by_id($id_anuncio);
            $this->load->view('crear_anuncios_view', $data);
        }
        else # AGREGAR | FORMULARIO NORMAL
        {
            if($this->input->post())
            {
                # validaciones
                $this->validaciones($this->input->post('nombre_categoria'));
    
                if($this->form_validation->run() == TRUE)
                {
                    if(!is_dir('./images/'))
                    {
                        mkdir('./images/');
                    }   
        
                    if (isset($_FILES["file"]))
                    {
                        $reporte = "";
                        
                        # insertando la data en la bd
    
                        # categoria accesorios / falta sacar el idusuario de la sesion
                       
                        $values = array('celular' => $this->input->post('celular'), 'moneda' => $this->input->post('moneda'), 
                                        'titulo_anuncio' => $this->input->post('titulo_anuncio'), 'descripcion' => $this->input->post('descripcion'),
                                        'destacar' => ($this->input->post('destacar') != null) ? 'si' : 'no', 'precio' => $this->input->post('precio'), 
                                        'telefono' => $this->input->post('telefono'), 'accion' => $this->input->post('accion'), 'provincia' => $this->input->post('provincia'),
                                        'marca' => $this->input->post('marca'), 'modelo' => $this->input->post('modelo'), 'accesorio' => $this->input->post('accesorio'), 'idcategoria' => $this->input->post('id_categoria'),
                                        'id_subcategoria' => $this->input->post('id_subcategoria'), 'idusuario' => 0, 'fecha_de_inicio' => date("Y-m-d"), 'fecha_de_fin' => date("Y-m-d", strtotime("+45 day"))); 
    
                        $id_anuncio = $this->m_categoria_accesorios->add($values);
                        
                        if($id_anuncio > 0)
                        {
                            # gestionar la imagen
                            
                            for($x = 0 ; $x < count($_FILES["file"]["name"]) ; $x++)
                            {
                                $file = $_FILES["file"];
                                $nombre = $file["name"][$x];
                                $tipo = $file["type"][$x];
                                $ruta_provisional = $file["tmp_name"][$x];
                                $size = $file["size"][$x];
                                
                                if($size > 0)
                                {
                                    $dimensiones = getimagesize($ruta_provisional);
                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "./images/";
    
                                    if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/gif")
                                    {
                                        if($size <= 5000000)
                                        {
                                            $src = $carpeta.$nombre;
                                            move_uploaded_file($ruta_provisional, $src);                                                   
                                            $values = array('imagen' => $nombre, 'id_anuncio' => $id_anuncio);
                                            $this->m_imagenes->add($values);
                                        }
                                        else
                                        {
                                            $reporte = "Disculpa pero el archivo $nombre ha superado el tamaño máximo permitido";
                                        }
                                    }
                                    else
                                    {
                                        $reporte = "Disculpa pero el archivo $nombre no es una imagen.";;
                                    }
                                }
                            }
                        }
                        
                        if($reporte != "")
                        {
                            if($this->m_categoria_accesorios->delete($id_anuncio))
                            {
                                $subCategoria = $this->m_subcategorias->get_by_id($this->input->post('id_subcategoria'));   
                                $data['categorias'] = $this->m_categoria->get_todos(); 
                                $data['progreso'] = 50;
                                $data['paso'] = 2;
                                $data['subCategoria_data'] = $subCategoria;
                                $data['categoria_data'] = $this->m_categoria->get_by_id($subCategoria[0]->idcategoria);
                                $data['error_al_subir_imagen'] = $reporte;
                                $this->load->view('crear_anuncios_view', $data);        
                            }
                        }
                        else
                        {
                            $anuncio = $this->m_categoria_accesorios->get_by_id($id_anuncio);
                            $data['categorias'] = $this->m_categoria->get_todos(); 
                            $data['progreso'] = 75;
                            $data['paso'] = 3;
                            $data['anuncio_insertado'] = $anuncio; 
                            $data['categoria_a_mostrar'] = $this->m_categoria->get_by_id($anuncio[0]->idcategoria);
                            $data['subcategoria_a_mostrar'] = $this->m_subcategorias->get_by_id($anuncio[0]->id_subcategoria);
                            $this->load->view('crear_anuncios_view', $data);                                
                        }
                    }
                }
                else
                {
                    $subCategoria = $this->m_subcategorias->get_by_id($this->input->post('id_subcategoria'));   
                    $data['categorias'] = $this->m_categoria->get_todos(); 
                    $data['progreso'] = 50;
                    $data['paso'] = 2;
                    $data['subCategoria_data'] = $subCategoria;
                    $data['categoria_data'] = $this->m_categoria->get_by_id($subCategoria[0]->idcategoria);
                    
                    $this->load->view('crear_anuncios_view', $data);
                }      
            }
        }
    }
}