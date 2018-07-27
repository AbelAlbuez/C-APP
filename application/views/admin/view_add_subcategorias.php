<?php  plantilla::iniciar();
$input_nombre = array(
	'type'  	 => 	'text',
	'name'  	 => 	'nombre',
	'id'    	 => 	'nombre',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'value'		=> 		set_value('nombre' , @$datos_categorias[0]->nombre)

//	'value'		 =>		set_value('con_email',@$datos_contactos[0]->con_email)
);


$this->load->model('M_categoria');

if(empty($datos_contactos[0]->id)){
	$input_idcategoria = array(
		'type'  	 => 	'text',
		'name'  	 => 	'idcategoria',
		'id'    	 => 	'idcategoria',
		'maxlength'  => 	'60',
		'size'  	 => 	'100',
		'value'		=> 		set_value('idcategoria',  @$datos_categorias[0]->idcategoria )
	//	'value'		 =>		set_value('con_email',@$datos_contactos[0]->con_email)
	);
}else{
	$input_idcategoria = array(
		'type'  	 => 	'text',
		'name'  	 => 	'idcategoria',
		'id'    	 => 	'idcategoria',
		'maxlength'  => 	'60',
		'size'  	 => 	'100',
		'value'		=> 		set_value('idcategoria',  @$datos_contactos[0]->id )
	//	'value'		 =>		set_value('con_email',@$datos_contactos[0]->con_email)
	);
}

?>
  <div class="content-wrapper">
<?php echo form_open();?><br>

<?php echo form_label('Nombre');?><br>
<?php echo form_input($input_nombre);?><br>
<?php echo form_error('nombre') ?><br>
<?php echo form_label('IdCategoria');?><br>
<?php echo form_input($input_idcategoria);?><br>
<?php echo form_error('IdCategoria') ?><br>
<?php echo form_submit('btn_enviar', 'Guardar');?><br>
<?php echo form_close();?>
</div>
