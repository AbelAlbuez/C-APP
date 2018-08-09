<?php plantilla_usuarios::iniciar($categorias); ?>


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

	<div class="container wrapable">

		<!-- ofertas de trabajos -->
		<div class="container-trabajos">

			<!-- cuadro de busqueda -->
			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="Busca palabras claves: .net, javaScript, ionic ..." aria-label="Recipient's username"
				aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="button">Buscar</button>
				</div>
			</div>

			<!-- cada uno de los trabajos -->
			<div class="trabajo">
				<div class="trabajo-header">
					<a href="#">
						<h4>Progrador JavaScript Asp</h4>
					</a>
				</div>
				<div class="trabajo-content">
					<span class="tiempo-publicacion">Hace 2 horas</span>
					<a href="#"></a>
					<span class="divisor">|</span>
					</a>
					<a href="#">
						<span class="ubicacion-publicacion">Madrid Espana</span>
					</a>

					<div class="trabajo-descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos velit laboriosam repudiandae non? At, optio dolorem...
					</div>
				</div>
				<div class="trabajo-footer">
					<span class="trabajo-contrato">Contrato: Indefinido</span>
					<span class="trabajo-salario">Salario: $25,000-$35,000</span>
				</div>
			</div>


			<!-- cada uno de los trabajos -->
			<div class="trabajo">
				<div class="trabajo-header">
					<a href="#">
						<h4>Progrador JavaScript Asp</h4>
					</a>
				</div>
				<div class="trabajo-content">
					<span class="tiempo-publicacion">Hace 2 horas</span>
					<a href="#"></a>
					<span class="divisor">|</span>
					</a>
					<a href="#">
						<span class="ubicacion-publicacion">Madrid Espana</span>
					</a>

					<div class="trabajo-descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos velit laboriosam repudiandae non? At, optio dolorem...
					</div>
				</div>
				<div class="trabajo-footer">
					<span class="trabajo-contrato">Contrato: Indefinido</span>
					<span class="trabajo-salario">Salario: $25,000-$35,000</span>
				</div>
			</div>

			<!-- cada uno de los trabajos -->
			<div class="trabajo">
				<div class="trabajo-header">
					<a href="#">
						<h4>Progrador JavaScript Asp</h4>
					</a>
				</div>
				<div class="trabajo-content">
					<span class="tiempo-publicacion">Hace 2 horas</span>
					<a href="#"></a>
					<span class="divisor">|</span>
					</a>
					<a href="#">
						<span class="ubicacion-publicacion">Madrid Espana</span>
					</a>

					<div class="trabajo-descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos velit laboriosam repudiandae non? At, optio dolorem...
					</div>
				</div>
				<div class="trabajo-footer">
					<span class="trabajo-contrato">Contrato: Indefinido</span>
					<span class="trabajo-salario">Salario: $25,000-$35,000</span>
				</div>
			</div>

			<!-- LA PAGINACION -->

<hr>

			<nav aria-label="Page navigation example  ">
				<ul class="pagination justify-content-end">
					<li class="page-item">
						<a class="page-link" href="#" tabindex="-1">Previous</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">1</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">2</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">3</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav>




		</div>


        <div class="anuncios-secundarios">
                <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://www.gratistodo.com/wp-content/uploads/2016/11/pikachu-1-800x533.jpg" alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <button type="button" class="btn btn-info float-right btn-sm">Info</button>
                        </div>
                      </div>

                      <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="https://pbs.twimg.com/profile_images/522803351570759681/aHKH0XTG_400x400.jpeg" alt="Card image cap">
                            <div class="card-body">
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <button type="button" class="btn btn-info float-right btn-sm">Info</button>
                            </div>
                          </div>

        </div>


	</div>






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

</style>
