<?php  
plantilla_usuarios::iniciar($categorias); 
$input_correo = array(
	'type'  	 => 	'text',
	'name'  	 => 	'correo',
	'id'    	 => 	'correo',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'value'		 =>		set_value('correo',@$datos_categorias[0]->correo),
	'class' => 'inputNombre'
);
$input_contrasenia = array(
	'type'  	 => 	'password',
	'name'  	 => 	'contrasenia',
	'id'    	 => 	'contrasenia',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'value'		 =>		set_value('contrasenia',@$datos_categorias[0]->contrasenia),
	'class' => 'inputNombre'
);

$submit = array(
	'class' => 'btn btn-dark',
	'value' => 'Guardar'
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
</head>
<body>
<h1>Logueate</h1>
<?php echo form_open();?><br>


		<?php echo form_label('Correo Electronico o Username');?><br>
		<?php echo form_input($input_correo);?><br>
		<?php echo form_error('correo') ?><br>

		<?php echo form_label('Contraseña');?><br>
		<?php echo form_input($input_contrasenia);?><br>
		<?php echo form_error('contrasenia') ?><br>

		<?php echo form_submit($submit);?>
		<?php echo form_close();?>
</body>
</html>
