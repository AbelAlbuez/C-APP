<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncios extends CI_Controller {
    
	function __construct()
	{
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('image_lib','upload');
    	$this->load->model(array('m_categoria','m_subcategorias', 'm_categoria_accesorios', 'm_imagenes', 'm_categoria_bicicletas', 'm_categoria_componentes', 'm_categoria_servicios'));
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
            $data['paso'] = 1;
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
            $data['sub_categorias_t'] = $this->m_subcategorias->get_by_idcategoria($subCategoria[0]->idcategoria);
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
        $this->form_validation->set_rules('accion', 'accion', 'required');
        $this->form_validation->set_rules('moneda', 'moneda', 'required');
        $this->form_validation->set_rules('precio', 'precio', 'required|numeric');
        $this->form_validation->set_rules('titulo_anuncio', 'título del anuncio', 'required');
        $this->form_validation->set_rules('descripcion', 'descripción', 'required|min_length[15]');

        # validaciones particulares
        switch ($categoria_a_validar) 
        {
            case 'Accesorios':         
            
                $this->form_validation->set_rules('accesorio', 'accesorio', 'required');
                $this->form_validation->set_rules('marca', 'marca', 'required');
                $this->form_validation->set_rules('modelo', 'modelo', 'required');
                        
                break;    
            case 'Bicicletas':

                $this->form_validation->set_rules('size_cuadro', 'Tamaño del cuadro', 'required');
                $this->form_validation->set_rules('size_aro', 'Tamaño del aro', 'required');
                $this->form_validation->set_rules('marca', 'marca', 'required');
                $this->form_validation->set_rules('modelo', 'modelo', 'required');
            
                break;
            case 'Componentes':
            
                $this->form_validation->set_rules('tipo', 'Tipo', 'required');
                $this->form_validation->set_rules('marca', 'marca', 'required');
                $this->form_validation->set_rules('modelo', 'modelo', 'required');
                
                break;  
        }
    }

    public function detalles($id_anuncio = null, $_caso = null)
    {
        if($id_anuncio != null && is_numeric($id_anuncio)) # RELLENAR LOS CAMPOS A EDITAR
        {
            $categorias = $this->m_categoria->get_todos();
            $id_anuncio = $id_anuncio + 0;
            $categoria_del_anuncio = "";
            $anuncio = array();

            switch ($_caso)
            {    
                case 'Accesorios':         
                    
                    $anuncio = $this->m_categoria_accesorios->get_by_id($id_anuncio);   
            
                    break;    
                case 'Bicicletas':  
        
                    $anuncio = $this->m_categoria_bicicletas->get_by_id($id_anuncio);   
                   
                    break;
                case 'Componentes':
                                                
                    $anuncio = $this->m_categoria_componentes->get_by_id($id_anuncio);   
            
                    break;
                case 'Servicios':

                    $anuncio = $this->m_categoria_servicios->get_by_id($id_anuncio);   
            
                    break;
            }

            foreach ($categorias as $categoria) 
            {
                if($categoria->id == $anuncio[0]->idcategoria)
                {
                    $categoria_del_anuncio = $categoria->nombre;
                }
            }

            $data['sub_categorias_t'] = $this->m_subcategorias->get_by_idcategoria($anuncio[0]->idcategoria);
            $data['categorias'] = $categorias; 
            $data['progreso'] = 50;
            $data['paso'] = 2;
            $data['subCategoria_data'] = $this->m_subcategorias->get_by_id($anuncio[0]->id_subcategoria);
            $data['categoria_data'] = $this->m_categoria->get_by_id($anuncio[0]->idcategoria);
            $data['anuncio'] = $anuncio; 
            $data['imagenes_guardadas'] = $this->m_imagenes->get_by_id($id_anuncio, $categoria_del_anuncio);
            $this->load->view('crear_anuncios_view', $data);
        }
        else # AGREGAR | FORMULARIO NORMAL
        {
            if(!isset($_SESSION)) { session_start(); }

            if($this->input->post())
            {
                
                if(!is_dir('./images/'))
                {
                    mkdir('./images/');
                }   

                if($this->input->post('submit') == 'Editar') # EDITAR
                {
                    
                    # validaciones
                    $this->validaciones($this->input->post('nombre_categoria'));
        
                    if($this->form_validation->run() == TRUE)
                    {
                        
                        # Aqui eliminamos las imagenes que se seleccionaron.
                        foreach ($this->input->post() as $key => $value) 
                        {
                            if (strpos($key, 'imagen_id') !== false) 
                            {
                                $i = $value + 0;
                                $this->m_imagenes->delete($i);
                            }
                        }

                        if (isset($_FILES["file"]))
                        {
                            $reporte = "";
                            $values = array();
                            $id_anuncio = 0;
                                                        
                            switch ($this->input->post('nombre_categoria'))
                            {
                                case 'Accesorios':         

                                    $values = array('celular' => $this->input->post('celular'), 'moneda' => $this->input->post('moneda'), 
                                        'titulo_anuncio' => $this->input->post('titulo_anuncio'), 'descripcion' => $this->input->post('descripcion'),
                                        'destacar' => ($this->input->post('destacar') != null) ? 'si' : 'no', 'precio' => $this->input->post('precio'), 
                                        'telefono' => $this->input->post('telefono'), 'accion' => $this->input->post('accion'), 'provincia' => $this->input->post('provincia'),
                                        'marca' => $this->input->post('marca'), 'modelo' => $this->input->post('modelo'), 'accesorio' => $this->input->post('accesorio'), 'idcategoria' => $this->input->post('id_categoria'),
                                        'id_subcategoria' => $this->input->post('id_subcategoria'), 'idusuario' => $_SESSION['info_user'][0]->id, 'fecha_de_inicio' => date("Y-m-d"), 'fecha_de_fin' => date("Y-m-d", strtotime("+45 day"))); 
                
                                    $id_anuncio_editado = $this->input->post('id_anuncio_hidden') + 0;
                                    $this->m_categoria_accesorios->update($id_anuncio_editado, $values);
                                  
                                    break;    
                                case 'Bicicletas':
                        
                                    $values = array('celular' => $this->input->post('celular'), 'moneda' => $this->input->post('moneda'), 
                                        'titulo_anuncio' => $this->input->post('titulo_anuncio'), 'descripcion' => $this->input->post('descripcion'),
                                        'destacar' => ($this->input->post('destacar') != null) ? 'si' : 'no', 'precio' => $this->input->post('precio'), 
                                        'telefono' => $this->input->post('telefono'), 'accion' => $this->input->post('accion'), 'provincia' => $this->input->post('provincia'),
                                        'modelo' => $this->input->post('modelo'), 'marca' => $this->input->post('marca'),  'size_cuadro' => $this->input->post('size_cuadro'), 'size_aro' => $this->input->post('size_aro'), 'idcategoria' => $this->input->post('id_categoria'),
                                        'id_subcategoria' => $this->input->post('id_subcategoria'), 'idusuario' => $_SESSION['info_user'][0]->id, 'fecha_de_inicio' => date("Y-m-d"), 'fecha_de_fin' => date("Y-m-d", strtotime("+45 day"))); 

                                    $id_anuncio_editado = $this->input->post('id_anuncio_hidden') + 0;
                                    $this->m_categoria_bicicletas->update($id_anuncio_editado, $values);
                            
                                    break;
                                case 'Componentes':
                                
                                    $values = array('celular' => $this->input->post('celular'), 'moneda' => $this->input->post('moneda'), 
                                        'titulo_anuncio' => $this->input->post('titulo_anuncio'), 'descripcion' => $this->input->post('descripcion'),
                                        'destacar' => ($this->input->post('destacar') != null) ? 'si' : 'no', 'precio' => $this->input->post('precio'), 
                                        'telefono' => $this->input->post('telefono'), 'accion' => $this->input->post('accion'), 'provincia' => $this->input->post('provincia'),
                                        'tipo' => $this->input->post('tipo'), 'modelo' => $this->input->post('modelo'), 'marca' => $this->input->post('marca'), 'idcategoria' => $this->input->post('id_categoria'),
                                        'id_subcategoria' => $this->input->post('id_subcategoria'), 'idusuario' => $_SESSION['info_user'][0]->id, 'fecha_de_inicio' => date("Y-m-d"), 'fecha_de_fin' => date("Y-m-d", strtotime("+45 day"))); 

                                    $id_anuncio_editado = $this->input->post('id_anuncio_hidden') + 0;
                                    $this->m_categoria_componentes->update($id_anuncio_editado, $values);
                                
                                    break;
                                case 'Servicios':

                                    $values = array('celular' => $this->input->post('celular'), 'moneda' => $this->input->post('moneda'), 
                                        'titulo_anuncio' => $this->input->post('titulo_anuncio'), 'descripcion' => $this->input->post('descripcion'),
                                        'destacar' => ($this->input->post('destacar') != null) ? 'si' : 'no', 'precio' => $this->input->post('precio'), 
                                        'telefono' => $this->input->post('telefono'), 'accion' => $this->input->post('accion'), 'provincia' => $this->input->post('provincia'),
                                        'idcategoria' => $this->input->post('id_categoria'), 'id_subcategoria' => $this->input->post('id_subcategoria'), 'idusuario' => $_SESSION['info_user'][0]->id, 'fecha_de_inicio' => date("Y-m-d"), 'fecha_de_fin' => date("Y-m-d", strtotime("+45 day"))); 

                                    $id_anuncio_editado = $this->input->post('id_anuncio_hidden') + 0;
                                    $this->m_categoria_servicios->update($id_anuncio_editado, $values);

                                    break;
                            }
                            
                            if($id_anuncio_editado > 0)
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
                                                $values = array('imagen' => $nombre, 'id_anuncio' => $id_anuncio_editado, 'tipo_anuncio' => $this->input->post('nombre_categoria'));
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
                                $se_elimino_el_registro = false;

                                switch ($this->input->post('nombre_categoria'))
                                {
                                    case 'Accesorios':         

                                        if($this->m_categoria_accesorios->delete($id_anuncio))
                                        {
                                            $se_elimino_el_registro = true;
                                        }    

                                        break;    
                                    case 'Bicicletas':  
                            
                                        if($this->m_categoria_bicicletas->delete($id_anuncio))
                                        {
                                            $se_elimino_el_registro = true;
                                        }       

                                        break;
                                    case 'Componentes':
                                        
                                        if($this->m_categoria_componentes->delete($id_anuncio))
                                        {
                                            $se_elimino_el_registro = true;
                                        }    

                                        break;
                                    case 'Servicios':

                                        if($this->m_categoria_servicios->delete($id_anuncio))
                                        {
                                            $se_elimino_el_registro = true;
                                        }    
                                    
                                        break;
                                }

                                if($se_elimino_el_registro)
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
                                $idx = $this->input->post('id_anuncio_hidden') + 0;
                                    
                                switch ($this->input->post('nombre_categoria'))
                                {    
                                    case 'Accesorios':         
                                        
                                        $anuncio = $this->m_categoria_accesorios->get_by_id($idx);
                                        $data['categoria_x'] = 'Accesorios';
                              
                                        break;    
                                    case 'Bicicletas':  
                            
                                        $anuncio = $this->m_categoria_bicicletas->get_by_id($idx);
                                        $data['categoria_x'] = 'Bicicletas';
                              
                                        break;
                                    case 'Componentes':
                                                          
                                        $anuncio = $this->m_categoria_componentes->get_by_id($idx);
                                        $data['categoria_x'] = 'Componentes';

                                        break;
                                    case 'Servicios':

                                        $anuncio = $this->m_categoria_servicios->get_by_id($idx);
                                        $data['categoria_x'] = 'Servicios';
                                
                                        break;
                                }

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
                        $id_anuncio = $this->input->post('id_anuncio_hidden') + 0;
                        $anuncio = array();

                        switch ($this->input->post('nombre_categoria'))
                        {    
                            case 'Accesorios':         
                        
                                $anuncio = $this->m_categoria_accesorios->get_by_id($id_anuncio);   
                        
                                break;    
                            case 'Bicicletas':  
                        
                                $anuncio = $this->m_categoria_bicicletas->get_by_id($id_anuncio);   
                        
                                break;
                            case 'Componentes':
                        
                                $anuncio = $this->m_categoria_componentes->get_by_id($id_anuncio);   
                                                
                                break;
                            case 'Servicios':
                        
                                $anuncio = $this->m_categoria_servicios->get_by_id($id_anuncio);   
                        
                                break;
                        }

                        $data['sub_categorias_t'] = $this->m_subcategorias->get_by_idcategoria($anuncio[0]->idcategoria);
                        $data['categorias'] = $this->m_categoria->get_todos(); 
                        $data['progreso'] = 50;
                        $data['paso'] = 2;
                        $data['subCategoria_data'] = $this->m_subcategorias->get_by_id($anuncio[0]->id_subcategoria);
                        $data['categoria_data'] = $this->m_categoria->get_by_id($anuncio[0]->idcategoria);
                        $data['anuncio'] = $anuncio; 
                        $data['imagenes_guardadas'] = $this->m_imagenes->get_by_id($id_anuncio);
                        $this->load->view('crear_anuncios_view', $data);            
                    }
                }
                else # AGREGAR
                {
                    # validaciones
                    $this->validaciones($this->input->post('nombre_categoria'));
        
                    if($this->form_validation->run() == TRUE)
                    {
                        if (isset($_FILES["file"]))
                        {
                            $reporte = "";
                            $values = array();
                            $id_anuncio = 0;

                            switch ($this->input->post('nombre_categoria'))
                            {
                                case 'Accesorios':         

                                    $values = array('celular' => $this->input->post('celular'), 'moneda' => $this->input->post('moneda'), 
                                        'titulo_anuncio' => $this->input->post('titulo_anuncio'), 'descripcion' => $this->input->post('descripcion'),
                                        'destacar' => ($this->input->post('destacar') != null) ? 'si' : 'no', 'precio' => $this->input->post('precio'), 
                                        'telefono' => $this->input->post('telefono'), 'accion' => $this->input->post('accion'), 'provincia' => $this->input->post('provincia'),
                                        'marca' => $this->input->post('marca'), 'modelo' => $this->input->post('modelo'), 'accesorio' => $this->input->post('accesorio'), 'idcategoria' => $this->input->post('id_categoria'),
                                        'id_subcategoria' => $this->input->post('id_subcategoria'), 'idusuario' => $_SESSION['info_user'][0]->id, 'fecha_de_inicio' => date("Y-m-d"), 'fecha_de_fin' => date("Y-m-d", strtotime("+45 day"))); 
                
                                    $id_anuncio = $this->m_categoria_accesorios->add($values);
                                  
                                    break;    
                                case 'Bicicletas':
                        
                                    $values = array('celular' => $this->input->post('celular'), 'moneda' => $this->input->post('moneda'), 
                                        'titulo_anuncio' => $this->input->post('titulo_anuncio'), 'descripcion' => $this->input->post('descripcion'),
                                        'destacar' => ($this->input->post('destacar') != null) ? 'si' : 'no', 'precio' => $this->input->post('precio'), 
                                        'telefono' => $this->input->post('telefono'), 'accion' => $this->input->post('accion'), 'provincia' => $this->input->post('provincia'),
                                        'modelo' => $this->input->post('modelo'), 'marca' => $this->input->post('marca'),  'size_cuadro' => $this->input->post('size_cuadro'), 'size_aro' => $this->input->post('size_aro'), 'idcategoria' => $this->input->post('id_categoria'),
                                        'id_subcategoria' => $this->input->post('id_subcategoria'), 'idusuario' => $_SESSION['info_user'][0]->id, 'fecha_de_inicio' => date("Y-m-d"), 'fecha_de_fin' => date("Y-m-d", strtotime("+45 day"))); 

                                    $id_anuncio = $this->m_categoria_bicicletas->add($values);

                                    break;
                                case 'Componentes':
  
                                    $values = array('celular' => $this->input->post('celular'), 'moneda' => $this->input->post('moneda'), 
                                        'titulo_anuncio' => $this->input->post('titulo_anuncio'), 'descripcion' => $this->input->post('descripcion'),
                                        'destacar' => ($this->input->post('destacar') != null) ? 'si' : 'no', 'precio' => $this->input->post('precio'), 
                                        'telefono' => $this->input->post('telefono'), 'accion' => $this->input->post('accion'), 'provincia' => $this->input->post('provincia'),
                                        'tipo' => $this->input->post('tipo'), 'modelo' => $this->input->post('modelo'), 'marca' => $this->input->post('marca'), 'idcategoria' => $this->input->post('id_categoria'),
                                        'id_subcategoria' => $this->input->post('id_subcategoria'), 'idusuario' => $_SESSION['info_user'][0]->id, 'fecha_de_inicio' => date("Y-m-d"), 'fecha_de_fin' => date("Y-m-d", strtotime("+45 day"))); 

                                    $id_anuncio = $this->m_categoria_componentes->add($values);
                       
                                    break;
                                case 'Servicios':

                                    $values = array('celular' => $this->input->post('celular'), 'moneda' => $this->input->post('moneda'), 
                                        'titulo_anuncio' => $this->input->post('titulo_anuncio'), 'descripcion' => $this->input->post('descripcion'),
                                        'destacar' => ($this->input->post('destacar') != null) ? 'si' : 'no', 'precio' => $this->input->post('precio'), 
                                        'telefono' => $this->input->post('telefono'), 'accion' => $this->input->post('accion'), 'provincia' => $this->input->post('provincia'),
                                        'idcategoria' => $this->input->post('id_categoria'), 'id_subcategoria' => $this->input->post('id_subcategoria'), 'idusuario' => $_SESSION['info_user'][0]->id, 'fecha_de_inicio' => date("Y-m-d"), 'fecha_de_fin' => date("Y-m-d", strtotime("+45 day"))); 

                                    $id_anuncio = $this->m_categoria_servicios->add($values);
                                    
                                    break;
                            }

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
                                                $values = array('imagen' => $nombre, 'id_anuncio' => $id_anuncio, 'tipo_anuncio' => $this->input->post('nombre_categoria'));
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
                                $se_elimino_el_registro = false;

                                switch ($this->input->post('nombre_categoria'))
                                {
                                    case 'Accesorios':         

                                        if($this->m_categoria_accesorios->delete($id_anuncio))
                                        {
                                            $se_elimino_el_registro = true;
                                        }    

                                        break;    
                                    case 'Bicicletas':  
                            
                                        if($this->m_categoria_bicicletas->delete($id_anuncio))
                                        {
                                            $se_elimino_el_registro = true;
                                        }       

                                        break;
                                    case 'Componentes':
                                        
                                        if($this->m_categoria_componentes->delete($id_anuncio))
                                        {
                                            $se_elimino_el_registro = true;
                                        }    

                                        break;
                                    case 'Servicios':

                                        if($this->m_categoria_servicios->delete($id_anuncio))
                                        {
                                            $se_elimino_el_registro = true;
                                        }    
                                    
                                        break;
                                }

                                if($se_elimino_el_registro)
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
                                switch ($this->input->post('nombre_categoria'))
                                {
                                    case 'Accesorios':         

                                        $anuncio = $this->m_categoria_accesorios->get_by_id($id_anuncio);
                                        $data['categoria_x'] = 'Accesorios';
                                        
                                        break;    
                                    case 'Bicicletas':  
                            
                                        $anuncio = $this->m_categoria_bicicletas->get_by_id($id_anuncio);
                                        $data['categoria_x'] = 'Bicicletas';

                                        break;
                                    case 'Componentes':
                                        
                                        $anuncio = $this->m_categoria_componentes->get_by_id($id_anuncio);
                                        $data['categoria_x'] = 'Componentes';

                                        break;
                                    case 'Servicios':

                                        $anuncio = $this->m_categoria_servicios->get_by_id($id_anuncio);
                                        $data['categoria_x'] = 'Servicios';

                                        break;
                                }

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

    public function fin()
    {
        $data['categorias'] = $this->m_categoria->get_todos(); 
        $data['progreso'] = 100;
        $data['paso'] = 4;   
        $this->load->view('crear_anuncios_view', $data);   
    }
}