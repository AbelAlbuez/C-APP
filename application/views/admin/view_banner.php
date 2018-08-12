<?php 
session_start();
if($_SESSION['info_user'][0]->tipo!=1)
{
   redirect('Home','refresh');
}
plantilla::iniciar();
?>
<div class="content-wrapper">
<div class="container">

<div class="cont-titulo">

<h1>Modificando banner</h1>

</div>

<form action="<?php echo base_url('panel/banner/subirImagen/'.$datos_banner[0]->id)?>" method="POST"   enctype="multipart/form-data">
	<table class="table table-bordered">
	<tr>
		<td>Titulo (Solo Lectura)</td>
		<td><input readonly type="text" name="titulo" class="form-control" value="<?php echo $datos_banner[0]->titulo;?>"></td>
	</tr>
	<tr>
		<td>Descripcion (Solo Lectura)</td>
		<td><input readonly id="descripcion" name="descripcion" class="form-control" value="<?php echo $datos_banner[0]->descripcion;?>"></td>
	</tr>
	<tr>
		<td>Imagen</td>
		<td><input  type="file" name="fileimagen" class="form-control" value="<?php echo $datos_banner[0]->url_imagen;?> "></td>
	</tr>
	<tr>
		<td>Posicion (Solo Lectura)</td>
		<td>
		<select readonly name="posicion">
		<option value="<?php echo $datos_banner[0]->posicion;?>"><?php echo $datos_banner[0]->posicion;?> (Solo Lectura)</option>
		</select>
		</td>
	</tr>
	<tr>
		<td colspan="2"> 
			<input class="btn btn-dark float-right" type="submit" value="Guardar"><br>
			<?php echo $error;?>
		</td>
	
	</tr>
</table>
</form>


</div>


</div>



<style>

td{
  font-weight: bold;
  color: rgb(9, 93, 167);
}
.cont-titulo{
  text-align: center;
}


</style>
