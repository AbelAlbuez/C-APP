<?php  plantilla::iniciar();?>
<div class="content-wrapper">
	

<div class="container">
<form action="<?php echo base_url('panel/banner/subirImagen/')?>" method="POST"   enctype="multipart/form-data">
	<table class="table table-bordered">
	<tr>
		<td>Titulo</td>
		<td><input type="text" name="titulo" class="form-control"></td>
	</tr>
	<tr>
		<td>Descripcion</td>
		<td><input type="text" name="descripcion" class="form-control"></td>
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


</div>
