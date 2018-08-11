<?php  plantilla::iniciar();?>
<div class="content-wrapper">
<?php if(empty($listado)){?>
	<h1>Sin Categoria</h1>
	<?php }else {?>




	 <div class="card mb-3">
        <div class="card-header">
        
		<h2>Listado de Usuario <span class="badge badge-secondary"><?php echo count($listado)?></span></h2>
				 

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
									<th>ID</th>
									<th>Apodo</th>
									<th>Correo</th>
									<th>Fecha</th>
									<th>Tipo</th>

									<th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
									<th>ID</th>
									<th>Apodo</th>
									<th>Correo</th>
									<th>Fecha</th>
									<th>Tipo</th>
									<th>Acciones</th>
                </tr>
              </tfoot>
              <tbody>
								
							<?php
							foreach ($listado as $usuario ) {?>
							<tr>
							
								<td><?php echo $usuario->id?></td>	
								<td><?php echo $usuario->username?></td>	
								<td><?php echo $usuario->correo?></td>	
								<td><?php echo $usuario->fecha?></td>	
								<td><?php echo $usuario->tipo?></td>	

								<td>
									
				
								<a href="<?php echo base_url('panel/usuarios/addAdmin/')?>
								<?php echo $usuario->id?>" >
								
								<?php if ($usuario->tipo==1){
									echo "Remover Admin";
								}else {
									echo "Añadir Admin";
								} ?>
								</a> 
						
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

<style>	
h2{
margin-left: 30px;
}
</style>
