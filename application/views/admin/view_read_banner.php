
<?php  plantilla::iniciar();?>
<div class="content-wrapper">
<?php if(empty($listado)){?>
	<h1>Sin Banner</h1> <br><br>
	<a href="<?php echo base_url('panel/banner/subirImagen/')?>" >Agregar Banner</a>
	<?php }else {?>
	 <div class="card mb-3">
        <div class="card-header">
					<i class="fa fa-table"></i> Listado de Banner - (<?php echo count($listado)?>) Categoria 
				<br>
				<a href="<?php echo base_url('panel/banner/subirImagen/')?>">Agregar Banner</a>
				<a href="<?php echo base_url('panel/banner/preview')?>">Previsualizar contenido</a>
				</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th> ID</th>
									<th>Titulo</th>
									<th>Descripcion</th>
									<th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
				<th> ID</th>
									<th>Titulo</th>
									<th>Descripcion</th>
									<th>Acciones</th>
                </tr>
              </tfoot>
              <tbody>
								
							<?php
							foreach ($listado as $banner ) {?>
							<tr>
							
								<td><?php echo $banner->id?></td>	
								<td><?php echo $banner->titulo?> </td>
								<td><?php echo $banner->descripcion?> </td>
								<td>
								<a href="#" onclick="eliminarBanner()">
								Eliminar
								</a> - 
								<a id="eliminarBanner" href="<?php echo base_url('panel/banner/eliminar/')?>
								<?php echo $banner->id?>" style="display:none" >Prueba</a>
								<a href="<?php echo base_url('panel/banner/modificar/')?>
								<?php echo $banner->id;   ?>" >Editar</a> - 
								
								</td>
								</tr>
		
		<?php }?>

         
<?php }?>     
              </tbody>
            </table>
          </div>
        </div>

			</div>



</div>

