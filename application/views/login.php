<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!-- <?php  
  plantilla_usuarios::iniciar($categorias); 
?>
<div class="container">
	<div class="card card-login mx-auto mt-5">
		<div class="card-header">Login</div>
		<div class="card-body">
			<form method="post" action="<?php echo base_url('index.php/login/IniciarSesion');  ?>">
				<?php
            if(isset($alerta))
            {
              echo"
              <div class='alert alert-{$alerta}' role='alert'>
                {$mensaje}
              </div>";
            }
        ?>

					<div class="form-group">
						<label for="exampleInputEmail1">Email </label>
						<input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="correo" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Clave</label>
						<input class="form-control" id="exampleInputPassword1" type="password" name="contrasenia" placeholder="Clave">
					</div>
					<div class="form-group">
						<div class="form-check">
							<label class="form-check-label">
								<td>
									<?php echo $this->recaptcha->render(); ?> </td>
						</div>
					</div>

					<button class="btn btn-primary btn-block" type="submit"> iniciar Sesion</button>

					<div class="text-center">
						<a class="d-block small mt-3" href="<?php echo base_url('index.php/login/Registrar')?>">Registrarme</a>
						<a class="d-block small" href="forgot-password.html">Olvidaste tu clve??</a>
					</div>
			</form>
		</div>
	</div>
</div> -->

<!-- login nuevo -->

<?php  
  plantilla_usuarios::iniciar($categorias); 
?>

<section class="login-block">
	<div class="container">
		<div class="row">
			<div class="col-md-4 login-sec">
				<h2 class="text-center">Ingresa a tu cuenta</h2>
				<form class="login-form" method="post" action="<?php echo base_url('index.php/login/IniciarSesion');  ?>">
					<?php
            if(isset($alerta))
            {
              echo"
              <div class='alert alert-{$alerta}' role='alert'>
                {$mensaje}
              </div>";
            }
        ?>
						<div class="form-group">
							<label for="exampleInputEmail1" class="text-uppercase">Email</label>
							<input type="email" class="form-control" name="correo" placeholder="Enter email">

						</div>
						<div class="form-group">
							<label for="exampleInputPassword1" class="text-uppercase">Clave</label>
							<input type="password" class="form-control" placeholder="Enter password" name="contrasenia">
						</div>



						<div class="form-check">
							<label class="form-check-label">
								<td>
									<?php echo $this->recaptcha->render(); ?> </td>
              </label>
              
							<button type="submit" class="btn btn-login float-right">Iniciar </button>
						</div>
            
				</form>
				<div class="copy-text">
          <h5>
            <a class="d-block small mt-3" href="<?php echo base_url('index.php/login/Registrar')?>">Registrarme</a>
          </h5>
          <h5>
            <a class="d-block small " href="forgot-password.html">¿Olvidaste tu clave?</a>
          </h5>
				</div>
			</div>
			<div class="col-md-8 banner-sec">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>Bienvenido/a</h2>
									<p>Regístrate y disfruta de nuestros servicios.</p>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>Sabemos que te gustará</h2>
									<p>Ponemos a tu disposición una plataforma fácil de usar.</p>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text l">
									<h2>Gracias por elegirnos</h2>
									<p>Al tenerte con nosotros, pensamos cada día en mejorar nuestra plataforma.</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
</section>

<style>
	@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
	.login-block {
		background: #DE6262;
		/* fallback for old browsers */
		background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);
		/* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to bottom, #FFB88C, #DE6262);
		/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		float: left;
		width: 100%;
		padding: 50px 0;
	}

	.banner-sec {
		background: url(https://static.pexels.com/photos/33972/pexels-photo.jpg) no-repeat left bottom;
		background-size: cover;
		min-height: 500px;
		border-radius: 0 10px 10px 0;
		padding: 0;
	}

	.container {
		background: #fff;
		border-radius: 10px;
		box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
	}

	.carousel-inner {
		border-radius: 0 10px 10px 0;
	}

	.carousel-caption {
		text-align: left;
		left: 5%;
	}

	.login-sec {
		padding: 50px 30px;
		position: relative;
	}

	.login-sec .copy-text {
		position: absolute;
		width: 80%;
		bottom: 20px;
		font-size: 13px;
		text-align: center;
	}

	.login-sec .copy-text i {
		color: #FEB58A;
	}

	.login-sec .copy-text a {
		color: #E36262;
	}

	.login-sec h2 {
		margin-bottom: 30px;
		font-weight: 800;
		font-size: 30px;
		color: #DE6262;
	}

	.login-sec h2:after {
		content: " ";
		width: 100px;
		height: 5px;
		background: #FEB58A;
		display: block;
		margin-top: 20px;
		border-radius: 3px;
		margin-left: auto;
		margin-right: auto
	}

	.btn-login {
		background: #DE6262;
		color: #fff;
		font-weight: 600;
	}

	.banner-text {
		width: 70%;
		position: absolute;
		bottom: 40px;
		padding-left: 20px;
	}

	.banner-text h2 {
		color: #fff;
		font-weight: 600;
	}

	.banner-text h2:after {
		content: " ";
		width: 100px;
		height: 5px;
		background: #FFF;
		display: block;
		margin-top: 20px;
		border-radius: 3px;
	}

	.banner-text p {
		color: #fff;
	}
  section{
    margin-bottom: 40px;
  }
  button[type="submit"]{
    margin-top: 10px;
  }
  .l > p {
    color: black;
    font-weight: bold;
  }

</style>
