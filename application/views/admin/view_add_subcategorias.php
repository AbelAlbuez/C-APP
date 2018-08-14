<?php  
if(!isset($_SESSION)) { session_start(); }
if($_SESSION['info_user'][0]->tipo!=1)
{
  redirect(base_url());
}
plantilla::iniciar();
$input_nombre = array(
	'type'  	 => 	'text',
	'name'  	 => 	'nombre',
	'id'    	 => 	'nombre',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'value'		=> 		set_value('nombre' , @$datos_categorias[0]->nombre),
	'class'   => 'input'

//	'value'		 =>		set_value('con_email',@$datos_contactos[0]->con_email)
);
$submit = array(
	'class' => 'btn btn-dark',
	'value' => 'Guardar'
);

$this->load->model('M_categoria');

if(empty($datos_contactos[0]->id)){
	$input_idcategoria = array(
		'type'  	 => 	'hidden',
		'name'  	 => 	'idcategoria',
		'id'    	 => 	'idcategoria',
		'maxlength'  => 	'60',
		'size'  	 => 	'100',
		'value'		=> 		set_value('idcategoria',  @$datos_categorias[0]->idcategoria ),
		'class' => 'input'
	//	'value'		 =>		set_value('con_email',@$datos_contactos[0]->con_email)
	);
}else{
	$input_idcategoria = array(
		'type'  	 => 	'hidden',
		'name'  	 => 	'idcategoria',
		'id'    	 => 	'idcategoria',
		'maxlength'  => 	'60',
		'size'  	 => 	'100',
		'value'		=> 		set_value('idcategoria',  @$datos_contactos[0]->id ),
		'class' => 'input'
	//	'value'		 =>		set_value('con_email',@$datos_contactos[0]->con_email)
	);
}

?>
  <div class="content-wrapper">
<div class="content-div">

		<h1>Subcategoría</h1>

<?php echo form_open();?><br>

<?php echo form_label('Nombre');?><br>
<?php echo form_input($input_nombre);?><br>
<?php echo form_error('nombre') ?><br>
<?php// echo form_label('IdCategoria');?><br>
<?php echo form_input($input_idcategoria);?>
<?php echo form_error('IdCategoria') ?>
<?php echo form_submit($submit);?>
<a class="btn  btn-default" href="<?php echo base_url('panel/subcategorias/load/'.$input_idcategoria['value'])?>">Volver</a>
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
		margin-top: 80px;
		border: 1px solid rgb(206, 206, 206);
		padding: 20px;
		border-radius: 5px;
	}
	.input{
		width: 100%;
		border: 1px solid rgba(27, 129, 197, 0.904);
		border-radius: 4px;
	}
	.btn-dark{
		float: right;
	}
	
</style>
