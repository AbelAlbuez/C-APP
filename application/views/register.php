<?php  
  plantilla_usuarios::iniciar($categorias); 
?>


  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro</div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url('index.php/login/Registrar')?>" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Apodo</label>
                <input name="apodo" class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Apodo">
              </div>
              <div class="col-md-6">
                <label for="correo">Correo</label>
                <input name="correo" class="form-control" id="correo" type="email" aria-describedby="nameHelp" placeholder="Correo">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="contrasenia">Clave</label>
            <input name="contrasenia" class="form-control" id="contrasenia" type="password" aria-describedby="emailHelp" placeholder="Clave">
          </div>
          <!-- <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div> -->
          
          <button class="btn btn-primary btn-block" type="submit" > Registrar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('index.php/login/Registrar')?>">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
