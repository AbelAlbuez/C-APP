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
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<style>
				footer {
					text-align: center;
					width: 100%;
					bottom: 0;
					position:fixed;
				}
			</style>
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
								<a class="dropdown-item" href="#"> <?php echo $categoria->nombre; ?>  </a>
							<?php 
								} 
							}
							?>
						</li>
					
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Nosotros </a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#"> ¿Quiénes somos? </a>
							<a class="dropdown-item" href="#"> Publicidad      </a>
							<a class="dropdown-item" href="#"> Contacto        </a>
							<a class="dropdown-item" href="#"> Términos de uso </a>
						</li>

						<li class="nav-item active">
							<a class="nav-link" href="#"> Noticias </a>
						</li>
						
						<li class="nav-item active">
							<a class="nav-link" href="#"> Eventos </a>
						</li>
						
					</ul>
					<?php 
					
					if (!empty($_SESSION)){
						$nombre = $_SESSION['usuario']->apodo;
						$linkCerrar = base_url('login/CerrarSesion');
						
						echo "<a class='nav-link' href='#' style='color:white!important;'> Bienvenido, <b>{$nombre}</b> </a> ";
						echo"<a class='nav-link' href='{$linkCerrar}'  style='color:white!important;' >Salir</a>";
						echo "<button class='btn btn-secondary my-2 my-sm-0' type='submit'> PUBLICAR ANUNCIO </button>";
					}else{
						$linkIniciar = base_url('login');
						echo"<a class='nav-link' href='{$linkIniciar}' style='color:white!important;'>Iniciar Sesion<b></b> </a> ";
					} ?>		
						
					
					

					<!-- SESIONES -->
					
					<!-- 
						<form class="form-inline my-2 my-lg-0">
							<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form> 
					-->

					<!-- FIN SESIONES -->
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

			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		</body>
	</html>
<?php
		}
	}

# Fin de la plantilla_usuarios_helper.php
