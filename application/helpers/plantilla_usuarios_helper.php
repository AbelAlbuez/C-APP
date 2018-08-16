<?php
	class plantilla_usuarios
	{

		static $instancia = null;

		static function iniciar($categorias)
		{
			self::$instancia = new plantilla_usuarios($categorias);
		}

		function __construct($categorias)
		{
?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<title>C-APP</title>
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<style>
				footer {
					text-align: center;
					width: 100%;
					bottom: 0;
					position:fixed;
				}
			</style>
			<script src='https://www.google.com/recaptcha/api.js'></script>
		</head>
		<body>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

				<a class="navbar-brand" href="<?php echo base_url(); ?>"> <b> C - APP </b> </a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">

						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Categorías </a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">

							<?php
							if(isset($categorias))
							{
								foreach ($categorias as $categoria)
								{
							?>
								<a class="dropdown-item" href="<?php echo base_url(); ?>Home/filtrar/<?php echo $categoria->nombre; ?>"> <?php echo $categoria->nombre; ?>  </a>
							<?php
								}
							}
							?>
						</li>

						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Nosotros </a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?php echo  base_url('nosotros/QuienesSomos') ?>"> ¿Quiénes somos? </a>
							<a class="dropdown-item" href="<?php echo  base_url('nosotros/publicidad') ?>"> Publicidad      </a>
							<a class="dropdown-item" href="<?php echo  base_url('nosotros/contacto') ?>"> Contacto        </a>
							<a class="dropdown-item" href="<?php echo  base_url('nosotros/terminosDeUso') ?>"> Términos de uso </a>
						</li>

						<li class="nav-item active">
							<a class="nav-link" href="#"> Noticias </a>
						</li>

						<li class="nav-item active">
							<a class="nav-link" href="#"> Eventos </a>
						</li>

					</ul>
					
						
					<?php
						if(empty($_SESSION['info_user']))
						{
					?>
						<a class="btn btn-outline-light" href='<?php echo base_url('user/login');?>' >Iniciar Sesión <i class="fas fa-sign-in-alt"></i> </a> |
						<a class="btn btn-outline-light"  href='<?php echo base_url('user/register');?>' >Registrarme <i class="fas fa-plus-square"></i> </a> 
					<?php 
						}
						else
						{ 
					?>
							<!-- Default dropleft button -->
							<div class="btn-group">
								<div class="dropdown-menu dropdown-menu-right">
									<a href="<?php echo base_url('usuario/')?>" class="dropdown-item" >Mis anuncios</a>
									<a href="<?php echo base_url('user/profile/')?>" class="dropdown-item" >Editar perfil</a>
									<a href="<?php echo base_url('user/login/')?>CerrarSesion" class="dropdown-item" >Cerrar Session</a>
								</div>
								<a class="btn btn-outline-light" href='<?php echo base_url('Anuncios');?>'> Anuncio <i class="fas fa-pen-alt"></i> </a> |
								<?php
									if($_SESSION['info_user'][0]->tipo == '1')
									{
								?>
										<a class="btn btn-outline-light" href='<?php echo base_url('admin')?>' ><i class="fas fa-cog"></i> </a> | 
								<?php
									}
								?>
								<button type="button" class="btn  bg-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:white!important;'>
								<?php echo $_SESSION['info_user'][0]->nombre." ".$_SESSION['info_user'][0]->apellido; ?>
								</button>
								
							</div>
					<?php 
						} 
					?>
				</div>
			</nav>

<?php
		}

		function __destruct()
		{
?>
			<footer class="page-footer bg-dark">
				<div class="footer-copyright text-center py-3" style="color: white!important;">
					© 2018 C-APP | Todos los derechos reservados.
				</div>
			</footer>
			
			<script src="<?php echo base_url('/extra/panel/');?>js/index.js"></script>
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
			<script>
				$(function () {
					$('[data-toggle="tooltip"]').tooltip()
				})
			</script>
		</body>
	</html>
<?php
		}
	}

# Fin de la plantilla_usuarios_helper.php
