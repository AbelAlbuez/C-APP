<?php plantilla_usuarios::iniciar($categorias); ?>

<style>
	.titulos_anuncios{
		color:black!important;
		transition: 0.5s;
	}

	.titulos_anuncios:hover{
		font-size:150%;
		text-decoration: none;
	}

	.quitandoElSobrando{
		margin-top:-20px!important;
	}

	.search{
		margin-top:15px;
		margin-bottom:15px;
	}

	.btn-buscar{
		margin-left:5px;
	}

	.margin-bot{
		margin-bottom:100px!important;
	}

	.sombra{
		-webkit-box-shadow: 10px 9px 5px -7px rgba(0,0,0,0.49);
		-moz-box-shadow: 10px 9px 5px -7px rgba(0,0,0,0.49);
		box-shadow: 10px 9px 5px -7px rgba(0,0,0,0.49);
	}
</style>

<div class="container">

	<!-- PUBLICIDAD CENTRO ARRIBA -->
	<div id="demo" class="carousel slide quitandoElSobrando" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-ite active">
				<?php
					if(isset($banners))
					{
						foreach ($banners as $banner) 
						{
							if($banner->posicion == '0')
							{
				?>
								<img class="img-slider" src="<?php echo base_url(); ?>uploads/imagenesBanner/<?php echo $banner->url_imagen; ?>" alt="Los Angeles">
				<?php
							}
						}
					}
				?>
			</div>
		</div>
	</div>

	<!-- cuadro de busqueda -->
	<form action="<?php echo base_url(); ?>Home/filtrar" method="post">
		<div class="alert alert-dark search" role="alert">
			<div class="input-group">
				<input type="text" name="info_a_buscar" class="form-control col-8" placeholder="¿Qué estás buscando?" aria-label="Text input with dropdown button" required="true">
				<select name='filtro' class="custom-select col-4" id="inputGroupSelect04" aria-label="Example select with button addon">
					<option value="*" selected> Todas las categorías </option>
					<?php
						if(isset($categorias))
						{
							foreach ($categorias as $categoria) 
							{
					?>
								<option value="c<?php echo $categoria->id; ?>" style="font-weight:bold!important;"><?php echo $categoria->nombre; ?></option>
					<?php
								if(isset($subcategorias))
								{
									foreach ($subcategorias as $subcategoria) 
									{
										if($categoria->id == $subcategoria->idcategoria)
										{
					?>
											<option value="s<?php echo $subcategoria->id; ?>"><?php echo $subcategoria->nombre; ?></option>
					<?php
										}		
									}
								}
							}
						}
					?>
				</select>
				<div class="input-group-append">
					<button type="submit" value="buscar" name="buscador" class="btn btn-dark" type="button"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</div>
	</form>

	<!-- ANUNCIOS DESTACADOS -->
	<?php 
	if(!isset($mostrar_destacados))
	{
	?>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			
			<div class="carousel-inner">
				<?php
					if(isset($anuncios))
					{			
						for ($i = 0 ; $i < count($anuncios) ; $i++) 
						{
							if($anuncios[$i]->destacar == "si")
							{
				?>
			
								<div class="carousel-item <?php if($anuncios[$i]->id == $id_ultimo_anuncio_destacado){echo "active"; } ?>">

								<?php
									$imagen_en_curso = "";

									foreach ($imagenes as $imagen) 
									{
										if($imagen->id_anuncio == $anuncios[$i]->id)
										{
											foreach ($categorias as $categoria)
											{
												if($anuncios[$i]->idcategoria == $categoria->id)
												{
													if($categoria->nombre == $imagen->tipo_anuncio)
													{
														$imagen_en_curso = $imagen->imagen;
													}
												}
											}
										}
									}
								?>
								
								<?php
									if($imagen_en_curso != "")
									{
								?>
										<img class="d-block w-100" src="<?php echo base_url(); ?>/images/<?php echo $imagen_en_curso; ?>" alt="First slide">							
								<?php
									}
									else
									{
								?>
										<img class="d-block w-100" src="<?php echo base_url(); ?>/images/noimg.png" alt="First slide">							
								<?php									
									}
								?>
								
								<?php
									$categoria_para_el_editar_y = '';
									foreach ($categorias as $categoria)
									{
										if($anuncios[$i]->idcategoria == $categoria->id)
										{
											$categoria_para_el_editar_y = $categoria->nombre;
										}
									}
								?>

								<div class="carousel-caption d-none d-md-block">
									<h5> <a class='titulos_anuncios' style='text-shadow:2px 2px 2px black; color:white!important;' href="<?php echo base_url() ?>Anuncio_Particular/index/<?php echo  $anuncios[$i]->id + 0; ?>/<?php echo $categoria_para_el_editar_y; ?>"> <?php echo substr($anuncios[$i]->titulo_anuncio, 0, 15); ?> </a> </h5>
									<p style='text-shadow:1px 1px 1px black;'><?php echo substr($anuncios[$i]->descripcion, 0, 25); ?> ...</p>
								</div>
					</div>
				<?php
							}
						}
					}
				?>
			</div>
			
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	<?php
	}
	?>

	<div class="row">

		<!-- ANUNCIOS  -->
        <div class="col-sm-8">
			
			<h2 class="mt-4">Nuevos anuncios</h2>
						
			<?php
			if(isset($anuncios))
			{			
				for ($i = 0 ; $i < count($anuncios) ; $i++) 
				{ 
			?>
					<div class="card bg-light mb-3 sombra">
						<div class="card-body">
							<div class="row">
	
								<?php
								$imagen_en_curso = "";

								foreach ($imagenes as $imagen) 
								{
									if($imagen->id_anuncio == $anuncios[$i]->id)
									{
										foreach ($categorias as $categoria)
										{
											if($anuncios[$i]->idcategoria == $categoria->id)
											{
												if($categoria->nombre == $imagen->tipo_anuncio)
												{
													$imagen_en_curso = $imagen->imagen;
 												}
											}
										}
									}
								}
								?>

								<?php
								if($imagen_en_curso != "")
								{
								?>
									<img src="<?php echo base_url(); ?>/images/<?php echo $imagen_en_curso; ?>"  style="height:200px!important;"  alt="..." class="img-thumbnail col-sm-4">
								<?php
								}
								else
								{
								?>
									<img src="<?php echo base_url(); ?>/images/noimg.png"  style="height:200px!important;"  alt="..." class="img-thumbnail col-sm-4">
								<?php									
								}
								?>

								<div class="col-sm-8">
									
									<?php
									$categoria_para_el_editar_x = '';
									foreach ($categorias as $categoria)
									{
										if($anuncios[$i]->idcategoria == $categoria->id)
										{
											$categoria_para_el_editar_x = $categoria->nombre;
										}
									}
									?>

									<h4 class="titulos_anuncios"> <a class="titulos_anuncios" href="<?php echo base_url() ?>Anuncio_Particular/index/<?php echo  $anuncios[$i]->id + 0; ?>/<?php echo $categoria_para_el_editar_x; ?>"> <?php echo substr($anuncios[$i]->titulo_anuncio, 0, 15) ?></a></h4>
									<p>
										<?php
										foreach ($categorias as $categoria)
										{
											if($anuncios[$i]->idcategoria == $categoria->id)
											{
										?>
												<i class="fas fa-tags"></i> <?php echo $categoria->nombre; ?> <br/> 
										<?php
											}
										}
										?>
										
										<?php
										if(isset($usuarios))
										{
											foreach ($usuarios as $usuario)
											{
												if($anuncios[$i]->idusuario == $usuario->id)
												{
										?>
													<i class="fas fa-user"></i> <?php echo $usuario->nombre . " " . $usuario->apellido; ?> <br/> 
										<?php
												}
											}
										}
										?>
										
										<i class="far fa-calendar-alt"></i> <?php echo $anuncios[$i]->fecha_de_inicio; ?> <br/> 
										<i class="fas fa-dollar-sign"></i> <?php echo $anuncios[$i]->precio; ?> <br/>
										<span style="text-align:justify">
											<?php echo substr($anuncios[$i]->descripcion, 0, 50) ?> ...
										</span>								
									</p>
								</div>
							</div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>

		<!-- PUBLICIDAD -->
        <div class="col-sm-4">
			<h2 class="mt-4">Interés</h2>

			<!-- ANUNCIO DERECHA SUPERIOR -->
			<div class="card sombra" style="width: 18rem;">
				<?php
					if(isset($banners))
					{
						foreach ($banners as $banner) 
						{
							if($banner->posicion == '1')
							{
				?>
								<img class="img-thumbnail" src="<?php echo base_url(); ?>uploads/imagenesBanner/<?php echo $banner->url_imagen; ?>" alt="Card image cap">			
				<?php
							}
						}
					}
				?>
			</div>
			
			<!-- ANUNCIO DERECHA INFERIOR -->
			<div class="card sombra" style="width: 18rem;">
				<?php
					if(isset($banners))
					{
						foreach ($banners as $banner) 
						{
							if($banner->posicion == '2')
							{
				?>
								<img class="img-thumbnail" src="<?php echo base_url(); ?>uploads/imagenesBanner/<?php echo $banner->url_imagen; ?>" alt="Card image cap">			
				<?php
							}
						}
					}
				?>
			</div>

			<div class="card sombra" style="width: 18rem;">
				<p class="text-center" style="font-weight:bold; padding:2.5px; padding-bottom:0!important; margin-bottom:0!important;">Anuncios destacados</p>
				
				<?php
				if(isset($anuncios))
				{			
					for ($i = 0 ; $i < count($anuncios) ; $i++) 
					{
						if($anuncios[$i]->destacar == "si")
						{
				?>
							<span class="text-center"><?php echo substr($anuncios[$i]->titulo_anuncio, 0, 10)  ?>... <br/></span>
				<?php
						}
					}
				}
				?>
			
			</div>

			<div class="card sombra" style="width: 18rem;">
			<p></p>
			</div>

		</div>
		
	</div>

	<div class="margin-bot"> </div>
</div>

<style>
	.wrapable {
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		justify-content: center;
		flex-direction: row;
		flex-wrap: wrap;
		width: 100%;
		margin-bottom: 100px;
	}

	.card
	{
		margin: 10px;
	}

	.card > img{
		height: 200px;
	}

	.container-trabajos {
		width: 600px;
		margin-right: 30px;
	}

	.container {
		margin-top: 40px;
	}

	.trabajo {
		background-color: rgb(239, 240, 240);
		margin: 10px 0px;
		border-radius: 4px;
		padding: 10px;
	}

	.trabajo-header {
		border-bottom: 1px solid rgb(196, 191, 191);
		margin-bottom: 5px;
	}

	.trabajo-content {
		margin: 5px;
	}

	.trabajo-footer {
		text-align: right;
	}

	.trabajo-descripcion {
		color: rgb(128, 127, 127);
	}


	.carousel-item>img {
		height: 300px;
		border-radius: 5px;
	}

	.carousel {
		margin-top: 10px;
	}

    .img-slider {
    width: 100%;
    height: 100px;
    /* filter: blur(1px); */
	}
</style>
