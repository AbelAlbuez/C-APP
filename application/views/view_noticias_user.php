<?php 
 
    plantilla_usuarios::iniciar($categorias); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Noticias</title>
</head>
<body>
<?php if(empty($noticias_listado)){?>
<h1>Vaciooo</h1>
<?php }else{ ?> 
<div class="container">
  <div class="row">
  <?php foreach ($noticias_listado as $noticias ) {?>
    <div class="col-12">
		<!-- Contenido de las noticias -->
		<br><br>
		<div class="card" style="width: 50rem;">
  		<div class="card-body">
    	<h5 class="card-title"><?php echo $noticias->titulo?></h5>
    	<p class="card-text"><?php echo $noticias->descripcion?></p>
    	<a href="<?php echo base_url('panel/noticias/View_Notice_Detail')?>?>" class="card-link">Ver Noticia</a>
    
  		</div><br> <br>
	</div>
		<!-- Cierre de las noticias -->
    </div>
	<?php } ?>
  </div>
</div>
<?php } ?>

</body>
</html>
