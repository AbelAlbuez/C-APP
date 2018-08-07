<?php  plantilla::iniciar();

?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<div class="content-wrapper">
<a href="<?php echo base_url('panel/noticias/')?>">Atras</a>
<form action="<?php echo base_url('panel/noticias/subirImagen/')?>" method="POST"   enctype="multipart/form-data">
	<table class="table table-bordered">
	<tr>
		<td>Titulo</td>
		<td><input type="text" name="titulo" class="form-control" ></td>
	</tr>
	<tr>
		<td>Descripcion</td>
		<td><textarea  id="summernote" name="descripcion" class="form-control" ></textarea ></td>
	</tr>
	<tr>
		<td>Fecha</td>
		<td><input  name="fecha_de_creacion" class="form-control"
		 value="<?php     echo $fechaActual?>"></td>
	</tr>
	<tr>
		<td>Imagen</td>
		<td><input type="file" name="fileimagen" class="form-control" ></td>
	</tr>
	<tr>
	
		<td colspan="2"> 
			<input type="submit" value="Guardar"><br>
			<?php echo $error;?>
		</div>

	</form>


</div>

<script>
	$('#summernote').summernote({
		placeholder: 'Hello stand alone ui',
		tabsize: 2,
		height: 100
	});

</script>

<style>
	form {
		border: 1px solid rgb(125, 213, 248);
		width: 80%;
		margin: 0px 10%;
		margin-top: 8px;
		padding: 10px;
		border-radius: 10px;
	}

	.form-group {
		margin: 10px;
	}

	label {
		font-weight: bold;
	}

	button {
		float: right;
	}

</style>
