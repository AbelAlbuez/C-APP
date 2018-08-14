<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio_Particular extends CI_Controller {

	function __construct()
	{
		parent::__construct();
    	$this->load->model(array('m_banner','m_usuarios','m_categoria','m_subcategorias', 'm_categoria_accesorios', 'm_imagenes', 'm_categoria_bicicletas', 'm_categoria_componentes', 'm_categoria_servicios'));
		$this->load->helper('plantilla_usuarios');
    }
    
    public function index($id = null, $categoria_p = null)
	{
        if($id != null && is_numeric($id) && $categoria_p != null)
        {
            $data['banners'] = $this->m_banner->get_todos();
            $data['categorias'] = $this->m_categoria->get_todos(); 

            switch ($categoria_p) 
			{
				case 'Accesorios':
                    $data['anuncio'] = $this->m_categoria_accesorios->get_by_id($id);
                    $data['detalle_a_mostrar'] = 'Accesorios';
                    break;
				case 'Bicicletas':
                    $data['anuncio'] = $this->m_categoria_bicicletas->get_by_id($id);
                    $data['detalle_a_mostrar'] = 'Bicicletas';

                    break;
				case 'Componentes':
                    $data['anuncio'] = $this->m_categoria_componentes->get_by_id($id);
                    $data['detalle_a_mostrar'] = 'Componentes';

                    break;
				case 'Servicios':
                    $data['anuncio'] = $this->m_categoria_servicios->get_by_id($id);
                    $data['detalle_a_mostrar'] = 'Servicios';
                    break;
            }

            $data['imagenes_guardadas'] = $this->m_imagenes->get_by_id($id, $categoria_p);
            $data['vendedor'] = $this->m_usuarios->get_by_id($data['anuncio'][0]->idusuario);
            $this->load->view('anuncio_particular_view', $data);
        }
        else
        {
            redirect(base_url());
        }
	}

}