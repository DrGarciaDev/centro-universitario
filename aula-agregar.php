<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');
  exit();
}
$titulo = "Agregar Aula";
include('config/conexion.php');
include ('include/header.php');

if (!empty($_POST)) {
	if (!isset($_POST['Codigo'])) $_POST['Codigo'] = "";
	if (!isset($_POST['NoAula'])) $_POST['NoAula'] = "";
	if (!isset($_POST['Modulo'])) $_POST['Modulo'] = "";
	$query = "INSERT INTO `aula` (`Codigo`, `NoAula`, `Modulo`) 
	VALUES ('".$_POST['Codigo']."', '".$_POST['NoAula']."', '".$_POST['Modulo']."')";
	$resultado = mysqli_query($enlace, $query);
	if ($resultado) {
		$_SESSION['flash'] = "AA";
		header("Location: aulas");
		exit();
	}
}
?>
	<div class="container">
		<div class="text-center">
			<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
			<h2>Registrar nueva Aula</h2>
			<p>Ingresa los datos del Aula a registrar</p>
			<form action="" method="post">
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Codigo">Codigo:</label>
					<input name="Codigo" id="Codigo" type="number" class="form-control" minlength="4" maxlength="6" placeholder="100000" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="NoAula">Numero de Aula:</label>
					<input name="NoAula" id="NoAula" type="number" class="form-control" minlength="1" maxlength="5" placeholder="10" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Modulo">Modulo:</label>
					<input name="Modulo" id="Modulo" type="text" class="form-control" minlength="1" maxlength="5" placeholder="X" required>
					<br><input class="btn btn-primary btn-sm" type="submit" value="Registrar" />
				</div><br>
			</form><br>
		</div>
	</div>
<?php include('include/footer.php') ?>