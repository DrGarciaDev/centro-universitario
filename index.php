<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Inicio";
include ('include/header.php');
$nombre = $_SESSION['nombres'];
$apellido = $_SESSION['apellidos'];
?>

    <img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
    <div class="jumbotron text-center">
        <h1>Bienvenido Administrador</h1>
        <p><?php echo $nombre," ",$apellido; ?></p>
      </div>
<?php include('include/footer.php') ?>
