<?php plantilla_usuarios::iniciar($categorias);

 function imprimir_Eventos($listado_eventos){
	 
	 foreach ($listado_eventos as $evento)
	 {
		$url = base_url('eventos/singleEvento/?id='.$evento->id);
		 echo "
		 <div class='trabajo'>
			<div class='trabajo-header'>
				<a href='{$url}'>
					<h4>{$evento->titulo}</h4>
				</a>
			</div>
			<div class='trabajo-content'>
				<span class='tiempo-publicacion'>{$evento->fecha}</span>
				<a href='#'></a>
				<span class='divisor'>|</span>
				</a>
				<a href='#'>
					<span class='ubicacion-publicacion'>{$evento->lugar}</span>
				</a>

				<div class='trabajo-descripcion'>{$evento->descripcion}.
				</div>
			</div>
			
		</div>
		 ";
	 }

 }
	
 ?>



<div class="container">


       

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
					<h5>Eventos 1</h5>
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
				<img class="d-block w-100" src="https://img.getbg.net/upload/full/8/399677_art_pejzazh_fyentezi_sneg_gory_skaly_kamni_kon_bel_1680x1050_(www.GetBg.net).jpg"
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
<hr>
	<div class="container ">

		<!-- ofertas de trabajos -->
		<div class="container-trabajos">

			
			

			<!-- cada uno de los trabajos -->
		<?php imprimir_Eventos($eventos_listado); ?>


			<!-- LA PAGINACION -->

<hr>





		</div>


       


	</div>






</div>



<style>
	

	.container-trabajos {
		width: 100%;
		margin-right: 30px;
		
	}

	.container {
		margin-top: 40px;
       margin-bottom: 100px;
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