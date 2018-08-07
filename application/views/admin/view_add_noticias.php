<?php  plantilla::iniciar();
$input_titulo = array(
	'type'  	 => 	'text',
	'name'  	 => 	'titulo',
	'id'    	 => 	'titulo',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'value'		 =>		set_value('titulo',@$datos_noticias[0]->titulo)
);
?>
<div class="content-wrapper">
<?php echo form_open();?><br>
<?php echo form_label('Titulo');?><br>
<?php echo form_input($input_titulo);?><br>
<?php echo form_error('titulo') ?><br>
<?php echo form_submit('btn_enviar', 'Guardar');?><br>
<?php echo form_close();?>
</div>
