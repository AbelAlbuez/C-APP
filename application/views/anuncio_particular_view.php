<?php plantilla_usuarios::iniciar($categorias); ?>

<style>
    .colorLetras{
        color: black!important;
    }

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

    <div class="row">

        <!-- ANUNCIOS  -->
        <div class="col-sm-8">
            
            <h2 class="mt-4">Detalle anuncio</h2>
            
            <div class="card sombra">
                <?php 
                    if(isset($anuncio))
                    {
                        // var_dump($anuncio);
                        if(isset($detalle_a_mostrar))
                        {

                            switch ($detalle_a_mostrar) 
                            {
                                case 'Accesorios':
                ?>
                                    <h2 class="text-center" style="padding-top:10px;"><?php echo $anuncio[0]->titulo_anuncio; ?></h2>
                                    
                                    <div class="alert alert-light" role="alert">

                                        <p class="card-text colorLetras text-center">
                                            <b>Provincia:</b> <?php echo $anuncio[0]->provincia; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Celular:</b> <?php echo $anuncio[0]->celular; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Teléfono:</b> <?php echo $anuncio[0]->telefono; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Accesorio:</b> <?php echo $anuncio[0]->accesorio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Marca:</b> <?php echo $anuncio[0]->marca; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Modelo:</b> <?php echo $anuncio[0]->modelo; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Acción:</b> <?php echo $anuncio[0]->accion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Moneda:</b> <?php echo $anuncio[0]->moneda; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Precio:</b> <?php echo $anuncio[0]->precio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Descripción:</b> <?php echo $anuncio[0]->descripcion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Vendedor:</b> <?php echo $vendedor[0]->nombre ." ". $vendedor[0]->apellido; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Fecha en que se desactivará el anuncio:</b> <?php echo date("d-m-Y",strtotime($anuncio[0]->fecha_de_fin)); ?>
                                        </p>

                                    </div>
                <?php
                                    break;
                                case 'Bicicletas':
                ?>
                                    <h2 class="text-center" style="padding-top:10px;"><?php echo $anuncio[0]->titulo_anuncio; ?></h2>
                                    
                                    <div class="alert alert-light" role="alert">
    

                                        <p class="card-text colorLetras text-center">
                                            <b>Provincia:</b> <?php echo $anuncio[0]->provincia; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Celular:</b> <?php echo $anuncio[0]->celular; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Teléfono:</b> <?php echo $anuncio[0]->telefono; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Marca:</b> <?php echo $anuncio[0]->marca; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Tamaño del aro:</b> <?php echo $anuncio[0]->size_aro; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Tamaño del cuadro:</b> <?php echo $anuncio[0]->size_cuadro; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Acción:</b> <?php echo $anuncio[0]->accion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Moneda:</b> <?php echo $anuncio[0]->moneda; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Precio:</b> <?php echo $anuncio[0]->precio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Título del anuncio:</b> <?php echo $anuncio[0]->titulo_anuncio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Descripción:</b> <?php echo $anuncio[0]->descripcion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Vendedor:</b> <?php echo $vendedor[0]->nombre ." ". $vendedor[0]->apellido; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Fecha en que se desactivará el anuncio:</b> <?php echo date("d-m-Y",strtotime($anuncio[0]->fecha_de_fin)); ?>
                                        </p>
                                    </div>

                <?php
                                    break;                            
                                case 'Componentes':
                ?>
                                    <h2 class="text-center" style="padding-top:10px;"><?php echo $anuncio[0]->titulo_anuncio; ?></h2>

                                    <div class="alert alert-light" role="alert">

                                        <p class="card-text colorLetras text-center">
                                            <b>Provincia:</b> <?php echo $anuncio[0]->provincia; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Celular:</b> <?php echo $anuncio[0]->celular; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Teléfono:</b> <?php echo $anuncio[0]->telefono; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Tipo:</b> <?php echo $anuncio[0]->tipo; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Marca:</b> <?php echo $anuncio[0]->marca; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Modelo:</b> <?php echo $anuncio[0]->modelo; ?>
                                        </p>


                                        <p class="card-text colorLetras text-center">
                                            <b>Acción:</b> <?php echo $anuncio[0]->accion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Moneda:</b> <?php echo $anuncio[0]->moneda; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Precio:</b> <?php echo $anuncio[0]->precio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Título del anuncio:</b> <?php echo $anuncio[0]->titulo_anuncio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Descripción:</b> <?php echo $anuncio[0]->descripcion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Vendedor:</b> <?php echo $vendedor[0]->nombre ." ". $vendedor[0]->apellido; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Fecha en que se desactivará el anuncio:</b> <?php echo date("d-m-Y",strtotime($anuncio[0]->fecha_de_fin)); ?>
                                        </p>
                                    </div>
                <?php                           
                                    break;
                                case 'Servicios':
                ?>
                                    <h2 class="text-center" style="padding-top:10px;"><?php echo $anuncio[0]->titulo_anuncio; ?></h2>

                                    <div class="alert alert-light" role="alert">

                                        <p class="card-text colorLetras text-center">
                                            <b>Provincia:</b> <?php echo $anuncio[0]->provincia; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Celular:</b> <?php echo $anuncio[0]->celular; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Teléfono:</b> <?php echo $anuncio[0]->telefono; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Acción:</b> <?php echo $anuncio[0]->accion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Moneda:</b> <?php echo $anuncio[0]->moneda; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Precio:</b> <?php echo $anuncio[0]->precio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Título del anuncio:</b> <?php echo $anuncio[0]->titulo_anuncio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Descripción:</b> <?php echo $anuncio[0]->descripcion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Vendedor:</b> <?php echo $vendedor[0]->nombre ." ". $vendedor[0]->apellido; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Fecha en que se desactivará el anuncio:</b> <?php echo date("d-m-Y",strtotime($anuncio[0]->fecha_de_fin)); ?>
                                        </p>
                                    </div>
                <?php                   
                                    break;
                            }    
                        }
                    }            
                ?>
                
                <div class="row">                            
                    <?php
                        if($imagenes_guardadas)
                        {
                            $contador = 1;
                            foreach ($imagenes_guardadas as $imagen) 
                            {
                    ?>
                                <div class="card text-white bg-dark mb-3" style="max-width: 18rem; margin-left:40px;">
                                    <div class="card-body">
                                        <img src="<?php echo base_url(); ?>/images/<?php echo $imagen->imagen; ?>" class="img-thumbnail" style="max-height: 9rem;" alt="<?php echo $imagen->imagen;?>">
                                    </div>
                                </div>                              
                    <?php
                                $contador++;
                            }
                        }
                    ?>
                </div>
                   
            </div>

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