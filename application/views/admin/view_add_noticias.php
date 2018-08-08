<?php  plantilla::iniciar();
$input_titulo = array(
	'type'  	 => 	'text',
	'name'  	 => 	'titulo',
	'id'    	 => 	'titulo',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'value'		 =>		set_value('titulo',@$datos_noticias[0]->titulo)
);
$input_url_imagen = array(
	'type'  	 => 	'file',
	'name'  	 => 	'url_imagen',
	'id'    	 => 	'url_imagen',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'class'		=>		'form-control',
	'value'		 =>		set_value('url_imagen',@$datos_noticias[0]->url_imagen)
);
$input_descripcion = array(

	'name'  	 => 	'descripcion',
	'id'    	 => 	'summernote',
	'maxlength'  => 	'60',
	'size'  	 => 	'100',
	'class'		=>		'form-control',
	'value'		 =>		set_value('descripcion',@$datos_noticias[0]->descripcion)
);
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
 
<div class="content-wrapper">
<?php echo form_open();?><br>
<?php echo form_label('Titulo');?><br>
<?php echo form_input($input_titulo);?><br>
<?php echo form_error('titulo') ?><br>

<?php echo form_label('Descripcion');?><br>
<?php echo form_textarea($input_descripcion);?><br>
<?php echo form_error('descripcion') ?><br>

<?php echo form_label('Url Imagen');?><br>
<?php echo form_input($input_url_imagen);?><br>


<?php echo form_submit('btn_enviar', 'Guardar');?><br>
<?php echo form_close();?>


</div>
<script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100
      });
</script>
