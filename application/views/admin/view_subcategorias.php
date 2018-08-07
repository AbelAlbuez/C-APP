<?php  plantilla::iniciar();?>
<div class="content-wrapper">

<?php if(empty($listado)){?>
	<h1>Sin SubCategorias</h1> <br><br>
	<a href="<?php echo base_url('panel/subcategorias/agregar/')?>
	<?php echo $listado_contado[0]->id?>" >Agregar Subcategoria</a>
	
	<?php }else {?>




	 <div class="card mb-3">
        <div class="card-header">
					<i class="fa fa-table"></i> Listado de Subcategorias - (<?php echo count($listado)?>) Subcategorias
				 <br>
				 <a href="<?php echo base_url('panel/subcategorias/agregar/')?>
	<?php echo $listado_contado[0]->id?>" >Agregar Subcategoria</a>
					<div class="card-body">
		
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  				<th>ID</th>
								<th>id categoria</th>
								<th>Nombre Subcategoria</th>
								<th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
								<th>ID</th>
								<th>id categoria</th>
								<th>Nombre Subcategoria</th>
								<th>Acciones</th>
                </tr>
              </tfoot>
              <tbody>			
							<?php
							foreach ($listado as $categoria ) {?>
							<tr>
								<td><?php echo $categoria->id?></td>
								<td><?php echo $categoria->idcategoria?> </td>	
								<td><?php echo $categoria->nombre?> </td>
								<td>
							
								<a href="#" 
								onclick="eliminarSubCategoria()">
								Eliminar
								</a> - 
								<a id="eliminarSubCategoria" href="<?php echo base_url('panel/subcategorias/eliminar/')?>
								<?php echo $categoria->id?>" style="display:none" >Prueba</a>
							
								<a href="<?php echo base_url('panel/subcategorias/modificar/')?>
								<?php echo $categoria->id?>">Editar</a> - 
								
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



