<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');
  exit();
}
$titulo = "Agregar Alumno";
include('config/conexion.php');
include ('include/header.php');

if (!empty($_POST)) {
	if (!isset($_POST['Nombre'])) $_POST['Nombre'] = "";
	if (!isset($_POST['Apellidos'])) $_POST['Apellidos'] = "";
	if (!isset($_POST['Direccion'])) $_POST['Direccion'] = "";
	if (!isset($_POST['Ciudad'])) $_POST['Ciudad'] = "";
	if (!isset($_POST['Telefono'])) $_POST['Telefono'] = "";
	if (!isset($_POST['CodigoPostal'])) $_POST['CodigoPostal'] = "";
	$query = "INSERT INTO `alumno` (`ID`, `Nombre`, `Apellidos`, `Direccion`, `Ciudad`, `Telefono`, `CP`) 
	VALUES (NULL, '".$_POST['Nombre']."', '".$_POST['Apellidos']."', '".$_POST['Direccion']."', '".$_POST['Ciudad']."', '".$_POST['Telefono']."', '".$_POST['CodigoPostal']."');";
	$resultado = mysqli_query($enlace, $query);
	if ($resultado) {
		$_SESSION['flash'] = "AA";
		header("Location: alumnos");
		exit();
	}
}
?>
	<div class="container">
		<div class="text-center">
			<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
			<h2>Registrar nuevo Alumno</h2>
			<p>Ingresa los datos del Alumno a registrar</p>
			<form action="" method="post">
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Nombre">Nombre:</label>
					<input name="Nombre" id="Nombre" type="text" class="form-control" minlength="3" maxlength="35" placeholder="Victor Emanuel" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Apellidos">Apellidos:</label>
					<input name="Apellidos" id="Apellidos" type="text" class="form-control" minlength="3" maxlength="35" placeholder="Sanchez Lopez" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Direccion">Direccion:</label>
					<input name="Direccion" id="Direccion" type="text" class="form-control" minlength="5" maxlength="50" placeholder="Calle #23" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Ciudad">Ciudad:</label>
					<input name="Ciudad" id="Ciudad" type="text" class="form-control" maxlength="35" placeholder="Guadalajara" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Telefono">Telefono:</label>
					<input name="Telefono" id="Telefono" type="text" class="form-control" maxlength="35" placeholder="4437485747" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="CodigoPostal">Codigo Postal:</label>
					<input name="CodigoPostal" id="CodigoPostal" type="text" class="form-control" maxlength="35" placeholder="45640" required>
					<br><input class="btn btn-primary btn-sm" type="submit" value="Registrar" />
				</div><br>
			</form><br>
		</div>
	</div>
<?php include('include/footer.php') ?>