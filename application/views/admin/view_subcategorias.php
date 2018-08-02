<?php  plantilla::iniciar();?>
<div class="content-wrapper">
	<div >
	  <a class="btn btn-primary" href="<?php echo base_url('panel/subcategorias/agregar/')?>
								<?php echo $listado_contado[0]->id?>">  Añadir SubCategoria</a>
	  </div>
<?php if(empty($listado)){?>
	<h1>Sin SubCategorias</h1>
	
	<?php }else {?>




	 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listado de Subcategorias - (<?php echo count($listado)?>) Subcategorias</div>
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
							
								<a href="#" data-toggle="modal" data-target="#exampleModalCenter">
								Eliminar
								</a> - 
							
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
	  
	  
			<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Esta Seguro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
			<a href="<?php echo base_url('panel/subcategorias/eliminar/')?>
								<?php echo $categoria->id?>">Eliminar</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div> <!--Cerrar modal-->
</div>



