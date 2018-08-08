<?php  plantilla::iniciar();

?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
 
<div class="content-wrapper">
<form action="<?php echo base_url('panel/noticias/subirImagen/')?>" method="POST"   enctype="multipart/form-data">
	<table class="table table-bordered">
	<tr>
		<td>Titulo</td>
		<td><input type="text" name="titulo" class="form-control"></td>
	</tr>
	<tr>
		<td>Descripcion</td>
		<td><textarea  id="summernote" name="descripcion" class="form-control"></textarea ></td>
	</tr>
	<tr>
		<td>Imagen</td>
		<td><input type="file" name="fileimagen" class="form-control"></td>
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
