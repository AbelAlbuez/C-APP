<?php  plantilla::iniciar();
$input_nombre = array(
	'type'  	 => 	'text',
	'name'  	 => 	'nombre',
	'id'    	 => 	'nombre',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'value'		 =>		set_value('nombre',@$datos_categorias[0]->nombre)
);

?>

<div class="content-wrapper">
<?php echo form_open();?><br>
<?php echo form_label('Nombre');?><br>
<?php echo form_input($input_nombre);?><br>
<?php echo form_error('nombre') ?><br>
<?php echo form_submit('btn_enviar', 'Guardar');?><br>
<?php echo form_close();?>
</div>
