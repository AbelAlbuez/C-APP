<?php 
session_start();
if($_SESSION['info_user'][0]->tipo!=1)
{

   redirect('Home','refresh');
}
plantilla::iniciar();?>
<div class="content-wrapper">
<?php if(empty($eventos_listado)){?>
	<h1>Sin Eventos</h1> - 
	<a href="<?php echo base_url('panel/eventos/agregar/')?>" >Agregar Eventos</a>
	<?php }else {?>




	 <div class="card mb-3">
        <div class="card-header">
					<i class="fa fa-table"></i> Listado de Eventos  - (<?php echo count($eventos_listado)?>) Eventos
					<br><br>
					<a href="<?php echo base_url('panel/eventos/agregar/')?>" >Agregar Eventos</a>
				</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
								<th>ID</th>
									<th>Titulo</th>
									<th>Lugar</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Descripcion</th>
									<th>Imagen</th>
									<th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
							<th>ID</th>
									<th>Titulo</th>
									<th>Lugar</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Descripcion</th>
									<th>Imagen</th>
									<th>Acciones</th>
                </tr>
              </tfoot>
              <tbody>
								
							<?php
							foreach ($eventos_listado as $eventos ) {?>
							<tr>
							
								<td><?php echo $eventos->id?></td>	
								<td><?php echo $eventos->titulo?></td>
								<td><?php echo $eventos->lugar?></td>	
								<td><?php echo $eventos->fecha?></td>	
								<td><?php echo $eventos->hora?></td>		
								<td><?php echo $eventos->descripcion?></td>	
								<td><?php echo $eventos->url_imagen?></td>	

								<td>
								<!-- onclick="eliminarEventos(<?php echo $eventos->id?>)" -->
								<a href="<?php echo base_url('panel/eventos/eliminar/'.$eventos->id)?>" >
								
								Eliminar
								</a>

								
								- 
								<a id="eliminarEventos<?php echo $eventos->id?>" href="<?php echo base_url('panel/eventos/eliminar/')?>
								<?php echo $eventos->id?>" style="display:none" >Prueba</a>
								
								<a href="<?php echo base_url('panel/eventos/modificar/') ;?> 
								<?php echo $eventos->id;   ?>" >Editar</a>
							
						
				
				
					
						
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
