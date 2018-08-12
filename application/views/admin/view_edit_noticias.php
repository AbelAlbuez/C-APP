<?php  
session_start();
if($_SESSION['info_user'][0]->tipo!=1)
{

	redirect(base_url());
}
plantilla::iniciar();

?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<div class="content-wrapper">
<a href="<?php echo base_url('panel/noticias/')?>">Atras</a>
<form action="<?php echo base_url('panel/noticias/editarNoticias/'.$datos_noticias[0]->id)?>" method="POST"   enctype="multipart/form-data">
	<table class="table table-bordered">
	<tr>
		<td>Titulo</td>
		<td><input type="text" name="titulo" class="form-control" value="<?php echo $datos_noticias[0]->titulo;?>"></td>
	</tr>
	<tr>
		<td>Descripcion</td>
		<td><textarea  id="summernote" name="descripcion" class="form-control" ><?php echo $datos_noticias[0]->descripcion;?></textarea ></td>
	</tr>
	<tr>
		<td>Fecha</td>
		<td><input  name="fecha" class="form-control"
		 value="<?php echo $datos_noticias[0]->fecha_de_creacion;?>"></td>
	</tr>
	<tr>
		<td>Imagen</td>
		<td><input type="file" name="fileimagen" class="form-control" value="<?php echo $datos_noticias[0]->url_imagen;?>"></td>
	</tr>

	<tr>
	
		<td colspan="2"> 
			<input type="submit" value="Guardar"><br>
			<?php echo $error;?>
		</td>
	
	</tr>
</table>
</form>

</div>
<script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100
      });
</script>
