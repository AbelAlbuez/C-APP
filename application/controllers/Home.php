<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
    	$this->load->model(array('m_categoria','m_subcategorias', 'm_categoria_accesorios', 'm_imagenes', 'm_categoria_bicicletas', 'm_categoria_componentes', 'm_categoria_servicios'));
		$this->load->helper('plantilla_usuarios');
		session_start();
	}

	function organizar_por_fecha($array)
	{
		$array_size = count($array);
		
		for ($i = 0; $i < $array_size ; $i++) 
		{
			$array_size_i = count($array[$i]); 
			for ($j = 0 ; $j < $array_size_i ; $j++) 
			{ 
				echo $array[$i][$j]->fecha_de_inicio . "<br>"; # aqui se junta to, ya pense la logica pa acabalo no tocar :V
			}
		}
		
		die(); 
		
		for ( $i = 0; $i < $array_size; $i++ )
		{
			for ($k = 0; $k < $array_size; $k++ )
			{
				if ($array[$i]->fecha_de_inicio > $array[$j]->fecha_de_inicio)
				{
					$temp = $array[$i];
					$array[$i] = $array[$j];
					$array[$j] = $temp;
				}
			}
		}
	}

	public function index()
	{
		$data['categorias'] = $this->m_categoria->get_todos(); 
		$data['subcategorias'] = $this->m_subcategorias->get_todos(); 

		//  LOGICA PARA MOSTRAR LOS ANUNCIOS POR FECHA

		/*
		$anuncios = array();
		
		$anuncios[] = $this->m_categoria_accesorios->get_todos();
		$anuncios[] = $this->m_categoria_bicicletas->get_todos();
		$anuncios[] = $this->m_categoria_componentes->get_todos();
		$anuncios[] = $this->m_categoria_servicios->get_todos();						
		
		$this->organizar_por_fecha($anuncios);
		*/
		$this->load->view('home_view', $data);
	}

	public function filtrar()
	{
		if($this->input->post())
		{
			if($this->input->post('info_a_buscar') != "" && $this->input->post('filtro') != "")
			{
				$id = substr($this->input->post('filtro'), 1);
				$data = $this->input->post('info_a_buscar');
				$resultados = array();

				if($this->input->post('filtro')[0] === 's')
				{					
					$resultados[] = $this->m_categoria_accesorios->get_by_subcategoria_filter($id, $data);
					$resultados[] = $this->m_categoria_bicicletas->get_by_subcategoria_filter($id, $data);
					$resultados[] = $this->m_categoria_componentes->get_by_subcategoria_filter($id, $data);
					$resultados[] = $this->m_categoria_servicios->get_by_subcategoria_filter($id, $data);						
				}
				else if($this->input->post('filtro')[0] === 'c')
				{
					$resultados[] = $this->m_categoria_accesorios->get_by_categoria_filter($id, $data);
					$resultados[] = $this->m_categoria_bicicletas->get_by_categoria_filter($id, $data);
					$resultados[] = $this->m_categoria_componentes->get_by_categoria_filter($id, $data);
					$resultados[] = $this->m_categoria_servicios->get_by_categoria_filter($id, $data);
				}
				else
				{
					$resultados[] = $this->m_categoria_accesorios->get_by_filter($data);
					$resultados[] = $this->m_categoria_bicicletas->get_by_filter($data);
					$resultados[] = $this->m_categoria_componentes->get_by_filter($data);
					$resultados[] = $this->m_categoria_servicios->get_by_filter($data);
				}

				print_r($resultados); # ya traemo to, hay que brega el front ahora
				die();
			}
			else
			{
				redirect('Home');
			}
		}
	}
}
