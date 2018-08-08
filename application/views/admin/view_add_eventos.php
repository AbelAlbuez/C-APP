<?php  plantilla::iniciar();?>
  <div class="content-wrapper">
   <h1>Agregar Eventos</h1>

   
	

    <div class="container">
    <form action="<?php echo base_url('panel/eventos/agregar/')?>" method="POST"   enctype="multipart/form-data">
      <table class="table table-bordered">
      <tr>
        <td>Titulo</td>
        <td><input type="text" name="titulo" class="form-control"></td>
      </tr>
      <tr>
        <td>Lugar</td>
        <td><input type="text" name="lugar" class="form-control"></td>
      </tr>
      <tr>
        <td>Descripcion</td>
        <td> <textarea name="descripcion"></textarea> </td>
      </tr>
      <tr>
        <td>Longitud</td>
        <td><input type="text" name="longitud" class="form-control"></td>
      </tr>
      <tr>
        <td>Latituden</td>
        <td><input type="text" name="latitud" class="form-control"></td>
      </tr>
      <tr>
        <td>fecha</td>
        <td><input required type="date" name="fecha" class="form-control"></td>
      </tr>
      <tr>
        <td>hora</td>
        <td><input required type="time" name="hora" class="form-control"></td>
      </tr>
      <tr>
      <tr>
        <td>Imagen</td>
        <td><input  required type="file" name="fileimagen" class="form-control"></td>
      </tr>
      <tr>
        <td>link</td>
        <td><input type="text" name="link" class="form-control"></td>
      </tr>
      <tr>
        <td colspan="2"> 
          <input type="submit" value="Guardar"><br>
          
        </td>
      
      </tr>
    </table>
    </form>
    </div>





</div>
