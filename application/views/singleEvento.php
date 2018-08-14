
<?php 

 plantilla_usuarios::iniciar($categorias); 
 if (empty($evento))
 {
	 redirect('eventos');
 }
?>


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

								<div class="carousel-caption d-none d-md-block">
									<h5><?php echo $anuncios[$i]->titulo_anuncio; ?></h5>
									<p><?php echo substr($anuncios[$i]->descripcion, 0, 25)?> ...</p>
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
		
		<?php 
		foreach($evento as $even)
		{
			echo "
			
					
							  <div class='card mt-4'>
								<img class='card-img-top img-fluid' src='../../uploads/thumb/{$even->url_imagen}' alt=''>
								<div class='card-body'>
								  <h3 class='card-title'>{$even->titulo}</h3>
								  <h6>Lugar: {$even->lugar}</h6>
								  <h6>Fecha: {$even->fecha}</h6>
								  <h6>Lugar: {$even->link}</h6>
								  <p class='card-text'>{$even->descripcion}</p>
								  
								  <div id='map'></div>
								</div>
							  </div>
							  
							
			
			";
			echo "<script>\n";
			echo "latitud='".$even->latitud."';\n"  ;
			echo "longitud='".$even->longitud."';\n"  ;
			echo "nombre_evento='".$even->titulo."';\n"  ;
			echo "</script>\n";

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

<script>
      
        var map = L.map('map').setView([longitud,latitud], 17);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        L.marker([longitud, latitud]).addTo(map)
            .bindPopup(nombre_evento)
            .openPopup();

  </script>
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
