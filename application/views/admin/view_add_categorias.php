<?php  plantilla::iniciar();
$input_nombre = array(
	'type'  	 => 	'text',
	'name'  	 => 	'nombre',
	'id'    	 => 	'nombre',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'value'		 =>		set_value('nombre',@$datos_categorias[0]->nombre),
	'class' => 'inputNombre'
);

$submit = array(
	'class' => 'btn btn-dark',
	'value' => 'Guardar'
);


?>

<div class="content-wrapper">

<div class="content-div">
	<h1>Nueva categoría</h1>
		<?php echo form_open();?><br>
		<?php echo form_label('Nombre');?><br>
		<?php echo form_input($input_nombre);?><br>
		<?php echo form_error('nombre') ?><br>
		<?php echo form_submit($submit);?><br>
		<?php echo form_close();?>

</div>


</div>



<style>
	h1{
		text-align: center;
	}
	.content-div{
		width: 60%;
		margin: 0 20%;
		margin-top: 130px;
		border: 1px solid rgb(206, 206, 206);
		padding: 20px;
		border-radius: 5px;
	}
	.inputNombre{
		width: 100%;
		border: 1px solid rgba(27, 129, 197, 0.904);
		border-radius: 4px;
	}
	.btn-dark{
		float: right;
	}
	
</style>