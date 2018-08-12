<?php  
session_start();
if($_SESSION['info_user'][0]->tipo!=1)
{
   redirect('Home','refresh');
}
plantilla::iniciar();
$input_apodo = array(
	'type'  	 => 	'hidden',
	'name'  	 => 	'apodo',
	'id'    	 => 	'apodo',
	'maxlength'  => 	'70',
	'size'  	 => 	'100',
	'value'		 =>		set_value('nombre',@$datos_usuarios[0]->apodo)
);
$input_correo = array(
	'type'  	 => 	'hidden',
	'name'  	 => 	'correo',
	'id'    	 => 	'correo',
	'maxlength'  => 	'70',
	'size'  	 => 	'100',
	'value'		 =>		set_value('nombre',@$datos_usuarios[0]->correo)
);
$input_fecha = array(
	'type'  	 => 	'hidden',
	'name'  	 => 	'fecha',
	'id'    	 => 	'fecha',
	'maxlength'  => 	'30',
	'size'  	 => 	'100',
	'value'		 =>		set_value('fecha', @$datos_usuarios[0]->fecha)
);
$input_tipo = array(
	'type'  	 => 	'hidden',
	'name'  	 => 	'tipo',
	'id'    	 => 	'tipo',
	'maxlength'  => 	'30',
	'size'  	 => 	'100',
	'value'		 =>		set_value('tipo', @$datos_usuarios[0]->tipo)
);


$permisosUser = array(
	"Usuario" => 'Usuario',
	"Master" => 'Master',
)
?>

<div class="content-wrapper">
<?php echo form_open();?><br>

<?php echo form_input($input_apodo);?><br>
<?php echo form_error('apodo') ?><br>


<?php echo form_input($input_correo);?><br>
<?php echo form_error('correo') ?><br>



<?php echo form_input($input_fecha);?><br>
<?php echo form_error('fecha') ?><br>

<?php echo form_label('Tipo');?><br>
<?php echo form_input($input_tipo);?><br>

<?php echo form_label('Permisos');?><br>
<?php echo form_dropdown('permisos', $permisosUser, set_value('permisos', @$datos_usuarios[0]->permisos));?><br><br>

<?php echo form_submit('btn_enviar', 'Actualizar');?><br>
<?php echo form_close();?>
</div>
