<!-- <?php  
plantilla_usuarios::iniciar($categorias); 
$input_correo = array(
	'type'  	 => 	'email',
	'name'  	 => 	'correo',
	'id'    	 => 	'correo',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'value'		 =>		set_value('correo',@$datos_categorias[0]->correo),
	'class' => 'form-control'
);
$input_contrasenia = array(
	'type'  	 => 	'password',
	'name'  	 => 	'contrasenia',
	'id'    	 => 	'contrasenia',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'value'		 =>		set_value('contrasenia',@$datos_categorias[0]->contrasenia),
	'class' => 'form-control'
);

$submit = array(
	'class' =>'btn btn-login float-right',
	'value' => 'Inciar'
);

?>

<!-- LOGIN NUEVO -->


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<?php  
  plantilla_usuarios::iniciar($categorias); 
?>

<section class="login-block">
	<div class="container">
		<div class="row">
			<div class="col-md-4 login-sec">
				<h2 class="text-center">Ingresa a tu cuenta</h2>

	<?php echo form_open();?><br>


<?php echo form_label('Correo Electronico o Username');?><br>
<?php echo form_input($input_correo);?><br>
<?php echo form_error('correo') ?><br>

<?php echo form_label('Contraseña');?><br>
<?php echo form_input($input_contrasenia);?><br>
<?php echo form_error('contrasenia') ?><br>

<?php echo form_submit($submit);?>
<?php echo form_close();?>

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
						
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img class="img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>Bienvenido/a</h2>
									<p>Regístrate y disfruta de nuestros servicios.</p>
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
.img-fluid{
	height: 500px;
}
@media only screen and (max-width: 600px) {
   .banner-sec  {
        display: none;
    }
}
</style>
