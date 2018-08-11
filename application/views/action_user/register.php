<?php  
plantilla_usuarios::iniciar($categorias); 
$input_nombre = array(
	'type'  	 => 	'text',
	'name'  	 => 	'nombre',
	'id'    	 => 	'nombre',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'class' => 'inputNombre'
);
$input_apellido = array(
	'type'  	 => 	'text',
	'name'  	 => 	'apellido',
	'id'    	 => 	'apellido',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'class' => 'inputNombre'
);
$input_correo = array(
	'type'  	 => 	'text',
	'name'  	 => 	'correo',
	'id'    	 => 	'correo',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'class' => 'inputNombre'
);
$input_contrasenia = array(
	'type'  	 => 	'password',
	'name'  	 => 	'contrasenia',
	'id'    	 => 	'contrasenia',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'class' => 'inputNombre'
);
$input_username = array(
	'type'  	 => 	'text',
	'name'  	 => 	'username',
	'id'    	 => 	'username',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'class' => 'inputNombre'
);

$submit = array(
	'class' => 'btn btn-dark',

	'id'=>		'Successbtn',
	'name'=>'btn_guardar',
	'value' => 'Guardar'
);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>

</head>
<body>
<h1>Registrate</h1>
<?php echo form_open();?><br>
		<?php echo form_label('Nombre');?><br>
		<?php echo form_input($input_nombre);?><br>
		<?php echo form_error('nombre') ?><br>

		<?php echo form_label('Apellido');?><br>
		<?php echo form_input($input_apellido);?><br>
		<?php echo form_error('apellido') ?><br>

		<?php echo form_label('Correo Electronico');?><br>
		<?php echo form_input($input_correo);?><br>
		<?php echo form_error('correo') ?><br>

		<?php echo form_label('Contraseña');?><br>
		<?php echo form_input($input_contrasenia);?><br>
		<?php echo form_error('contrasenia') ?><br>

		<?php echo form_label('Nombre de usuario');?><br>
		<?php echo form_input($input_username);?><br>
		<?php echo form_error('username') ?><br>

		<?php echo form_submit($submit);?>
		
		
		<?php echo form_close();?>

</body>
</html>
