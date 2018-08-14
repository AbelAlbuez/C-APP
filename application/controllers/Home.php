<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
    	$this->load->model(array('m_banner','m_usuarios','m_categoria','m_subcategorias', 'm_categoria_accesorios', 'm_imagenes', 'm_categoria_bicicletas', 'm_categoria_componentes', 'm_categoria_servicios'));
		$this->load->helper('plantilla_usuarios');
		if(!isset($_SESSION)) { session_start(); }
	}

	function organizar_por_fecha($array)
	{
		$array_limpio = array();
		$array_size = count($array);
		
		for ($i = 0; $i < $array_size ; $i++) 
		{
			$array_size_i = count($array[$i]); 
			for ($j = 0 ; $j < $array_size_i ; $j++) 
			{ 
				$array_limpio[] = $array[$i][$j];
			}
		}
		
		$array_limpio_size = count($array_limpio);

		for ($i = 0 ; $i < $array_limpio_size ; $i++) 
		{ 
			for ($j = 0; $j < $array_limpio_size; $j++ )
			{
				if ($array_limpio[$i]->fecha_de_inicio > $array_limpio[$j]->fecha_de_inicio)
				{
					$temp = $array_limpio[$i];
					$array_limpio[$i] = $array_limpio[$j];
					$array_limpio[$j] = $temp;
				}
			}
		}

		return $array_limpio;
	}

	public function index()
	{
		$destacar_id = 0;
		$anuncios = array();
		$imagenes = array();
		$imagenes_limpias = array();
		$categorias = $this->m_categoria->get_todos();

		$anuncios[] = $this->m_categoria_bicicletas->get_todos();
		$anuncios[] = $this->m_categoria_accesorios->get_todos();
		$anuncios[] = $this->m_categoria_componentes->get_todos();
		$anuncios[] = $this->m_categoria_servicios->get_todos();						

		$anuncios = $this->organizar_por_fecha($anuncios);
		
		foreach ($anuncios as $anuncio) 
		{
			foreach ($categorias as $categoria) 
			{
				if($anuncio->idcategoria == $categoria->id)
				{
					$imagenes[] = $this->m_imagenes->get_by_id_limited($anuncio->id, $categoria->nombre); 
				}
			}
		}

		foreach ($imagenes as $imagen) 
		{
			foreach ($imagen as $imagen_contenido) 
			{
				$imagenes_limpias[] = $imagen_contenido; 
			}
		}

		foreach ($anuncios as $anuncio) 
		{
			if($anuncio->destacar == "si")
			{
				$destacar_id = $anuncio->id;
				break;
			}
		}

		$data['anuncios'] = $anuncios;
		$data['categorias'] = $categorias; 
		$data['subcategorias'] = $this->m_subcategorias->get_todos(); 
		$data['imagenes'] = $imagenes_limpias;
		$data['usuarios'] =  $this->m_usuarios->get_todos();
		$data['banners'] = $this->m_banner->get_todos();
		$data['id_ultimo_anuncio_destacado'] = $destacar_id;

		$this->load->view('home_view', $data);
	}

	public function filtrar()
	{
		if($this->input->post())
		{
			if($this->input->post('info_a_buscar') != "" && $this->input->post('filtro') != "")
			{
				$anuncios = array();
				$imagenes = array();
				$imagenes_limpias = array();
				$categorias = $this->m_categoria->get_todos();
				$id = substr($this->input->post('filtro'), 1);
				$data_x = $this->input->post('info_a_buscar');
				$resultados = array();

				if($this->input->post('filtro')[0] === 's')
				{					
					$anuncios[] = $this->m_categoria_accesorios->get_by_subcategoria_filter($id, $data_x);
					$anuncios[] = $this->m_categoria_bicicletas->get_by_subcategoria_filter($id, $data_x);
					$anuncios[] = $this->m_categoria_componentes->get_by_subcategoria_filter($id, $data_x);
					$anuncios[] = $this->m_categoria_servicios->get_by_subcategoria_filter($id, $data_x);						
				}
				else if($this->input->post('filtro')[0] === 'c')
				{
					$anuncios[] = $this->m_categoria_accesorios->get_by_categoria_filter($id, $data_x);
					$anuncios[] = $this->m_categoria_bicicletas->get_by_categoria_filter($id, $data_x);
					$anuncios[] = $this->m_categoria_componentes->get_by_categoria_filter($id, $data_x);
					$anuncios[] = $this->m_categoria_servicios->get_by_categoria_filter($id, $data_x);
				}
				else
				{
					$anuncios[] = $this->m_categoria_accesorios->get_by_filter($data_x);
					$anuncios[] = $this->m_categoria_bicicletas->get_by_filter($data_x);
					$anuncios[] = $this->m_categoria_componentes->get_by_filter($data_x);
					$anuncios[] = $this->m_categoria_servicios->get_by_filter($data_x);
				}
				
				$anuncios = $this->organizar_por_fecha($anuncios);
		
				foreach ($anuncios as $anuncio) 
				{
					foreach ($categorias as $categoria) 
					{
						if($anuncio->idcategoria == $categoria->id)
						{
							$imagenes[] = $this->m_imagenes->get_by_id_limited($anuncio->id, $categoria->nombre); 
						}
					}
				}
		
				foreach ($imagenes as $imagen) 
				{
					foreach ($imagen as $imagen_contenido) 
					{
						$imagenes_limpias[] = $imagen_contenido; 
					}
				}
		
				$data['anuncios'] = $anuncios;
				$data['categorias'] = $categorias; 
				$data['subcategorias'] = $this->m_subcategorias->get_todos(); 
				$data['imagenes'] = $imagenes_limpias;
				$data['usuarios'] =  $this->m_usuarios->get_todos();
				$data['banners'] = $this->m_banner->get_todos();

				$this->load->view('home_view', $data);
			}
			else
			{
				redirect(base_url());
			}
		}
	}
}
