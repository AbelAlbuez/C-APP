
<?php  
  plantilla_usuarios::iniciar($categorias); 
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url('index.php/login/IniciarSesion');  ?>" >
          <div class="form-group">
            <label for="exampleInputEmail1">Email </label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="correo" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Clave</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="contrasenia" placeholder="Clave">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Recordar Clave</label>
            </div>
          </div>
          
          <button  class="btn btn-primary btn-block" type="submit" > iniciar Sesion</button>
          
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('index.php/login/Registrar')?>">Registrarme</a>
          <a class="d-block small" href="forgot-password.html">Olvidaste tu clve??</a>
        </div>
        </form>
      </div>
    </div>
  </div>

