<?php
   $titulo = "Ingresar";
   include('config/conexion.php');
   include('include/header.php');
   session_start();

   if(isset($_SESSION['usuario'])){
     session_destroy();
   }

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $correo = mysqli_real_escape_string($enlace,$_POST['correo']);
      $contrasena = mysqli_real_escape_string($enlace,$_POST['contrasena']);

      $sql = "SELECT * FROM usuario WHERE correo = '$correo' and contrasena = '$contrasena'";
      $result = mysqli_query($enlace,$sql);
      if($result){
        $_SESSION['flash'] = "Error";
      }
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {
         $_SESSION['usuario'] = $row["Correo"];
         $_SESSION['nombres'] = $row["Nombres"];
         $_SESSION['apellidos'] = $row["Apellidos"];
         header("location: index");
      }else {
         $error = "Datos Erroneos";
      }
   }
?>
    <div class="container">
      <?php
      if(isset($_SESSION['flash'])){
        if($_SESSION['flash']=='Error'){
          echo '<div class="alert alert-danger"><strong>Error!</strong> Tus datos son invalidos.</div>';
        }
        unset($_SESSION['flash']);
      }
      ?>
      <div class="text-center">
        <img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
        <h2>Iniciar Sesion</h2>
        <p>Ingresa al sistema</p>
        <form action="" method="POST">
          <div class="input-group col-xs-4 col-xs-offset-4">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
          </div>
          <br>
          <div class="input-group col-xs-4 col-xs-offset-4">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
          </div>
          <br><input class="btn btn-primary btn-sm" type="submit" value="Entrar">
        </form><br>
      </div>
    </div>
<?php include('include/footer.php') ?>
