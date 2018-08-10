<?php  plantilla::iniciar();?>
<div class="content-wrapper">
<?php if(empty($noticias_listado)){?>
	<h1>Sin Noticias</h1> 
	<a href="<?php echo base_url('panel/noticias/agregar/')?>" >Agregar Noticias</a>
	<?php }else {?>




	 <div class="card mb-3">
        <div class="card-header">
				


<h2 class='float-left' >Listado de Noticias <span class="badge badge-secondary"><?php echo count($noticias_listado)?></span></h2>
				 

				 <a class='btn btn-success float-right' href="<?php echo base_url('panel/noticias/agregar/')?>" >Agregar Noticia</a>
		 

				</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
								<th>ID</th>
									<th>Titulo</th>
									<th>Descripcion</th>
									<th>Imagen</th>
									<th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
							<th>ID</th>
									<th>Titulo</th>
									<th>Descripcion</th>
									<th>Imagen</th>
									<th>Acciones</th>
                </tr>
              </tfoot>
              <tbody>
								
							<?php
							foreach ($noticias_listado as $noticias ) {?>
							<tr>
							
								<td><?php echo $noticias->id?></td>	
								<td><?php echo $noticias->titulo?></td>	
								<td><?php echo $noticias->descripcion?></td>	
								<td><?php echo $noticias->url_imagen?></td>	

								<td>
								<a href="#" onclick="eliminarNoticias(<?php echo $noticias->id?>)">
								Eliminar
								</a> - 
								<a id="eliminarNoticias<?php echo $noticias->id?>" href="<?php echo base_url('panel/noticias/eliminar/')?>
								<?php echo $noticias->id?>" style="display:none" >Prueba</a>
								
								<a href="<?php echo base_url('panel/noticias/modificar/')?>
								<?php echo $noticias->id;   ?>" >Editar</a>
							
						
				
				
					
						
								</td>
								</tr>
		
		<?php }?>

         
<?php }?>     
              </tbody>
            </table>
          </div>
        </div>
     
			</div>
