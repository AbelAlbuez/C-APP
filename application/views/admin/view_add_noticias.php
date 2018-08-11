<?php  plantilla::iniciar();

?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<div class="content-wrapper">

	<form action="<?php echo base_url('panel/noticias/subirImagen/')?>" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="exampleInputEmail1">Titulo</label>
			<input type="text" class="form-control" id="titulo" aria-describedby="emailHelp" placeholder="Ingresa un titulo" name="titulo">
			<small id="emailHelp" class="form-text text-muted">Escribe un titulo breve</small>
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Descripción</label>
			<textarea class="form-control" name="descripcion" id="summernote" rows="3"></textarea>
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Imágen</label>
			<input type="file" name="fileimagen" class="form-control">
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Fecha</label>
			<input type="text" name="fecha_de_creacion" class="form-control" value="<?php 
			echo date('Y-m-d');?>">
		</div>
		<hr>
		<div class="form-group">
			<button type="submit" class="btn btn-dark">Guardar</button>
			<br>
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
