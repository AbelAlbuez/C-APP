<?php plantilla_usuarios::iniciar($categorias); ?>

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

</div>

