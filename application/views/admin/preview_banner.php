<?php  plantilla::iniciar();?>
<div class="content-wrapper">
<?php if(empty($listado)){?>
	<h1>Sin Categoria</h1> <br><br>
	<a href="<?php echo base_url('panel/categorias/agregar/')?>" >Agregar Categoria</a>
	<?php }else {?>


				<?php
							foreach ($listado as $categoria ) {?>
	<div class="banel-principal">
		<img class="img-principal" src="https://www.tuexperto.com/wp-content/uploads/2018/03/paisajes.jpg" alt="">
	</div>

	<div class="wrapable">

		<div class="banel-secundario">
			<img class="img-secundaria" src="https://s-media-cache-ak0.pinimg.com/originals/6d/06/f5/6d06f5b859c7580fbf91e5d6378b4109.jpg"
			alt="">
		</div>

		<div class="banel-secundario">
			<img class="img-secundaria" src="https://upload.wikimedia.org/wikipedia/commons/a/a1/Tateyama_from_jiigatake_20_2001_11_20.jpg"
			alt="">
		</div>

	</div>
			
	<?php }?>

         
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
