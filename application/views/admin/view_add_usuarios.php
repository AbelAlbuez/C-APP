<?php  plantilla::iniciar();
$input_apodo = array(
	'type'  	 => 	'text',
	'name'  	 => 	'apodo',
	'id'    	 => 	'apodo',
	'maxlength'  => 	'70',
	'size'  	 => 	'100',
	'value'		 =>		set_value('nombre',@$datos_usuarios[0]->apodo)
);
$input_correo = array(
	'type'  	 => 	'text',
	'name'  	 => 	'correo',
	'id'    	 => 	'correo',
	'maxlength'  => 	'70',
	'size'  	 => 	'100',
	'value'		 =>		set_value('nombre',@$datos_usuarios[0]->correo)
);
$input_fecha = array(
	'type'  	 => 	'date',
	'name'  	 => 	'fecha',
	'id'    	 => 	'fecha',
	'maxlength'  => 	'30',
	'size'  	 => 	'100',
	'value'		 =>		set_value('fecha', @$datos_usuarios[0]->fecha)
);

$opciones = array(
	'Master' => 'Master',
	'Administrador' => 'Administrador',
	'Vendedor' => 'Vendedor',
	'Cliente' => 'Cliente'
);
?>

<div class="content-wrapper">
<?php echo form_open();?><br>
<?php echo form_label('Apodo');?><br>
<?php echo form_input($input_apodo);?><br>
<?php echo form_error('apodo') ?><br>

<?php echo form_label('Correo');?><br>
<?php echo form_input($input_correo);?><br>
<?php echo form_error('correo') ?><br>


<?php echo form_label('Fecha');?><br>
<?php echo form_input($input_fecha);?><br>
<?php echo form_error('fecha') ?><br>

<?php echo form_dropdown('tipo', $opciones, set_value('tipo', @$datos_usuarios[0]->tipo));?><br><br>
<?php echo form_submit('btn_enviar', 'Actualizar');?><br>
<?php echo form_close();?>
</div>
