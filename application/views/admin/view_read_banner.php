
<?php  plantilla::iniciar();?>
<div class="content-wrapper">
<?php if(empty($listado)){?>
	<h1>Sin Banner</h1> <br><br>
	<!-- <a href="<?php //echo base_url('panel/banner/subirImagen/')?>" >Agregar Banner</a> -->
	<?php }else {?>
	 <div class="card mb-3">
        <div class="card-header">
				
			
				<!-- <a href="<?php// echo base_url('panel/banner/subirImagen/')?>">Agregar Banner</a> - -->
			

			<h2 class='float-left' >Listado de Categorias <span class="badge badge-secondary"><?php echo count($listado)?></span></h2>
					
			
					<a class='btn btn-info float-right' href="<?php echo base_url('panel/banner/preview')?>" >Previsualizar contenido</a>

				</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th> ID</th>
									<th>Titulo</th>
									<th>Descripcion</th>
									<th>Posicion</th>
									<th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
									<th> ID</th>
									<th>Titulo</th>
									<th>Descripcion</th>
									<th>Posicion</th>
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
								<td><?php echo $banner->posicion?> </td>
								<td>
								<!-- <a href="#" onclick="eliminarBanner(<?php //echo $banner->id?>)">
								Eliminar
								</a> -  -->
								<!-- <a id="eliminarBanner<?php //echo $banner->id ?>" href="<?php //echo base_url('panel/banner/eliminar/'.$banner->id)?>"
								 style="display:none" >Prueba</a> -->
								<a href="<?php echo base_url('panel/banner/modificar/')?>
								<?php echo $banner->id;   ?>" >Editar</a> 
								
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
