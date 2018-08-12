<?php 
session_start();
if($_SESSION['info_user'][0]->tipo!=1)
{

   redirect('Home','refresh');
}
plantilla::iniciar();?>
<div class="content-wrapper">
<?php if(empty($listado)){?>
		<?php 
		$this->db->query
		("INSERT INTO `banner` (`id`, `url_imagen`, `titulo`, `descripcion`, `posicion`) 
		VALUES (NULL, 'Superior.png', 'Banner Superior', 'Este banner estara ubicado en la parte superior', '0');");
		$this->db->query
		("	INSERT INTO `banner` (`id`, `url_imagen`, `titulo`, `descripcion`, `posicion`) 
		VALUES (NULL, 'derecha superior.png', 'Banner Derecha Superior', 'Este banner estara ubicado en la parte derecha superior', '1');");
		$this->db->query
		("INSERT INTO `banner` (`id`, `url_imagen`, `titulo`, `descripcion`, `posicion`) 
		VALUES (NULL, 'derecha inferior.png', 'Banner Derecha Inferior', 'Este banner estara ubicado en la parte derecha inferior', '2');
		");
		
		redirect('banner','refresh');
		
		?>

	</div>
	
	<a href="<?php echo base_url('panel/banner')?>" >Volver</a>
	<?php }else {?>


	<a href="<?php echo base_url('panel/banner')?>" >Volver</a>
	<div class="banel-principal">
		<img class="img-principal" 
		src="<?php echo base_url('uploads/imagenesBanner/').$listado[0]->url_imagen;?>" alt="">
	</div>

	<div class="wrapable">

		<div class="banel-secundario">
			<img class="img-secundaria" 
			src="<?php echo base_url('uploads/imagenesBanner/').$listado[1]->url_imagen?>"
			alt="">
		</div>

		<div class="banel-secundario">
			<img class="img-secundaria" 
			src="<?php echo base_url('uploads/imagenesBanner/').$listado[2]->url_imagen?>"
			alt="">
		</div>

	</div>
			


         
<?php }?>    

</div>

<!-- STILOS DE CSS -->


<style>
	.wrapable {
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		justify-content: center;
		flex-direction: row;
		flex-wrap: wrap;
		width: 100%;
		margin-bottom: 30px;
	}

	.baner-principal,
	.img-principal {
		width: 80%;
		margin: 20px 10%;
		height: 200px;
	}

	.banel-secundario {
		margin: 25px;
	}
	.banel-secundario>img,.img-principal{
		border-radius: 5px;
	}
	.banel-secundario, .banel-secundario>img {
		width: 400px;
		height: 300px;
	}

</style>
