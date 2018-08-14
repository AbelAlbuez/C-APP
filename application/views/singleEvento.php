<?php  
    plantilla_usuarios::iniciar($categorias); 
    if (empty($evento))
    {
        redirect('eventos');
    }
?>



    <!-- Page Content -->
    <!-- <div class="container">

      <div class="row">
            <?php 
            foreach($evento as $even)
            {
                echo "
                <div class='col-lg-9'>
                        
                                  <div class='card mt-4'>
                                    <img class='card-img-top img-fluid' src='../../uploads/thumbs/{$even->url_imagen}' alt=''>
                                    <div class='card-body'>
                                      <h3 class='card-title'>{$even->titulo}</h3>
                                      <h6>Lugar: {$even->lugar}</h6>
                                      <h6>Fecha: {$even->fecha}</h6>
                                      <h6>Lugar: {$even->link}</h6>
                                      <p class='card-text'>{$even->descripcion}</p>
                                      
                                      <div id='map'></div>
                                    </div>
                                  </div>
                                  
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
          
  </div> -->
  
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
		

              
            <?php 
            foreach($evento as $even)
            {
                echo "
                
                        
                                  <div class='card mt-4'>
                                    <img class='card-img-top img-fluid' src='../../uploads/thumbs/{$even->url_imagen}' alt=''>
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

    