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
            $data['categorias'] = $this->m_categoria->get_todos(); 
            $this->load->view('anuncio_particular_view', $data);
    
            /*
            switch ($this->input->post('categoria')) 
			{
				case 'Accesorios':
					$r = $this->m_categoria_accesorios->delete($this->input->post('id'));
					break;
				case 'Bicicletas':
					$r = $this->m_categoria_bicicletas->delete($this->input->post('id'));
					break;
				case 'Componentes':
					$r = $this->m_categoria_componentes->delete($this->input->post('id'));
					break;
				case 'Servicios':
					$r = $this->m_categoria_servicios->delete($this->input->post('id'));
					break;
            }
            */
        }
        else
        {
            redirect(base_url());
        }
	}

}