<?php 
    if(empty($_SESSION['info_user']))
    {
    redirect(base_url());
    }
    plantilla_usuarios::iniciar($categorias); 
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

    <div class="row">

<!-- ANUNCIOS  -->
<div class="col-sm-8">
    
    <h2 class="mt-4">Mis anuncios</h2>
         
    <?php
        if(isset($eliminar_anuncio))
        {  
    ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <b>¿Estás seguro?</b><br> 
                El anuncio se eliminará permanentemente. 
                
                <form action="<?php echo base_url(); ?>usuario/eliminar_anuncio_comprobado" method="post">
                    <input type="hidden" name='id' value='<?php echo $eliminar_anuncio_id; ?>'>
                    <input type="hidden" name='categoria' value='<?php echo $eliminar_anuncio_categoria; ?>'>
                    <button type='submit' class='btn btn-danger btn-sm'> Si, deseo eliminarlo! </button>
                </form>
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <?php
        }    
    ?>

    <?php
    if(count($anuncios) == 0)
    {
    ?>
        <br>
        <div class="alert alert-warning" role="alert">
            <h1 class='text-center'>Disculpa!</h1>
            <h3 class='text-center'>Aun no has publicado ningún anuncio.</h3>
        </div>
    <?php
    }
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
                            <h4 class=""><?php echo $anuncios[$i]->titulo_anuncio; ?></h4>
                            <p>
                                <?php
                                $categoria_para_el_editar_x = "";
                                foreach ($categorias as $categoria)
                                {
                                    if($anuncios[$i]->idcategoria == $categoria->id)
                                    {
                                        $categoria_para_el_editar_x = $categoria->nombre;
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
                                
                                <i class="far fa-calendar-alt"></i> <?php echo $anuncios[$i]->fecha_de_inicio; ?> | 
                                <i class="fas fa-dollar-sign"></i> <?php echo $anuncios[$i]->precio; ?> <br/>
                                
                                <span style="text-align:justify">
                                    <?php echo substr($anuncios[$i]->descripcion, 0, 40) ?> ...
                                </span>								
                            </p>

                            <a href="<?php echo base_url() ?>usuario/index/<?php echo  $anuncios[$i]->id + 0; ?>/<?php echo $categoria_para_el_editar_x; ?>" style="float:right; margin-left:5px!important;"  class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </a>                             
                            <a href="<?php echo base_url() ?>Anuncios/detalles/<?php echo  $anuncios[$i]->id + 0; ?>/<?php echo $categoria_para_el_editar_x; ?>" style="float:right;"  class="btn btn-outline-primary"> <i class="fas fa-edit"></i> </a>  

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

</div>

