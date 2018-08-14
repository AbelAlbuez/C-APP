
<?php 
if(!isset($_SESSION)) { session_start(); }
if($_SESSION['info_user'][0]->tipo!=1)
{

  redirect(base_url());
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
	
	<?php }else {?>
	 <div class="card mb-3">
        <div class="card-header">
				
			
				<!-- <a href="<?php// echo base_url('panel/banner/subirImagen/')?>">Agregar Banner</a> - -->
			

			<h2 class='float-left' >Listado de Banner <span class="badge badge-secondary"><?php echo count($listado)?></span></h2>
					
			
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

