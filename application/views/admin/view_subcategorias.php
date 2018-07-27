<?php  plantilla::iniciar();?>
<div class="content-wrapper">
	<div >
	  <a class="btn btn-primary" href="<?php echo base_url('panel/subcategorias/agregar/')?>
								<?php echo $listado_contado[0]->id?>">  Añadir SubCategoria</a>
	  </div>
<?php if(empty($listado)){?>
	<h1>Sin SubCategorias</h1>
	
	<?php }else {?>

	 <h1>Tienes (<?php echo count($listado)?>) Subcategorias</h1>


	 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listado de Subcategorias</div>
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
								<a href="<?php echo base_url('panel/subcategorias/eliminar/')?>
								<?php echo $categoria->id?>">Eliminar</a> -
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
		
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
	  </div>
	  
	  
</div>



