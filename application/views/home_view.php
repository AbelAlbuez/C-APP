<?php 
	plantilla_usuarios::iniciar($categorias); 
	$limite = (isset($limite)) ? $limite : 5 ;
?>

<style>
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
				<img class="img-slider" src="https://about.canva.com/es_es/wp-content/uploads/sites/3/2015/02/Etsy-Banners.png" alt="Los Angeles">
			</div>
		</div>
	</div>

	<!-- cuadro de busqueda -->
	<form action="<?php base_url() ?>Home/filtrar/" method="post">
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
					<button type="submit" class="btn btn-dark" type="button"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</div>
	</form>

	<!-- ANUNCIOS DESTACADOS -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="https://cdn.pixabay.com/photo/2017/11/07/00/07/fantasy-2925250__340.jpg" alt="First slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>Anuncio 1</h5>
					<p>Este es un anuncio vacano</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="http://www.shuuf.com/shof/uploads/2018/02/28/jpg/shof_da7cc67c1b8e1bd.jpg" alt="Second slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>Anuncio 2</h5>
					<p>Este es un anuncio vacano</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="http://www.shuuf.com/shof/uploads/2018/02/28/jpg/shof_da7cc67c1b8e1bd.jpg"
				alt="Third slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>Anuncio 3</h5>
					<p>Este es un anuncio vacano</p>
				</div>
			</div>
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

	<div class="row">
		<!-- ANUNCIOS  -->
        <div class="col-sm-8">
			
			<h2 class="mt-4">Nuevos anuncios</h2>
						
			<?php
			if(isset($anuncios))
			{			
				for ($i = 0 ; $i < $limite ; $i++) 
				{ 
			?>
					<div class="card bg-light mb-3 sombra">
						<div class="card-body">
							<div class="row">
	
								<?php
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
								?>
													<img src="<?php echo base_url(); ?>/images/<?php echo $imagen->imagen; ?>"  style="height:200px!important;"  alt="..." class="img-thumbnail col-sm-4">
								<?php
												}

											}
										}
									}
								}
								?>
								
								<div class="col-sm-8">
									<h4 class=""><?php echo $anuncios[$i]->titulo_anuncio; ?></h4>
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
										<i class="fas fa-user"></i> Angel Reyes Espinal <br/> 
										<i class="far fa-calendar-alt"></i> <?php echo $anuncios[$i]->fecha_de_inicio; ?> <br/> 
										<i class="fas fa-dollar-sign"></i> <?php echo $anuncios[$i]->precio; ?> <br/>
										<span style="text-align:justify">
											<?php echo $anuncios[$i]->descripcion; ?>
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
			<h2 class="mt-4">Interes</h2>
			
			<div class="card" style="width: 18rem;">
				<img class="img-thumbnail" src="https://www.gratistodo.com/wp-content/uploads/2016/11/pikachu-1-800x533.jpg" alt="Card image cap">
				<div class="card-body">
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<button type="button" class="btn btn-info float-right btn-sm">Info</button>
				</div>
			</div>

			<div class="card" style="width: 18rem;">
				<img class="img-thumbnail" src="https://www.gratistodo.com/wp-content/uploads/2016/11/pikachu-1-800x533.jpg" alt="Card image cap">
				<div class="card-body">
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<button type="button" class="btn btn-info float-right btn-sm">Info</button>
				</div>
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
