<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');
  exit();
}
$titulo = "Agregar Asignatura";
include('config/conexion.php');
include ('include/header.php');

if (!empty($_POST)) {
	if (!isset($_POST['Codigo'])) $_POST['Codigo'] = "";
	if (!isset($_POST['Nombre'])) $_POST['Nombre'] = "";
	if (!isset($_POST['NoHorasSemana'])) $_POST['NoHorasSemana'] = "";
	if (!isset($_POST['Incidencias'])) $_POST['Incidencias'] = "";
	if (!isset($_POST['Fecha'])) $_POST['Fecha'] = "";
	if (!isset($_POST['Aula_Codigo'])) $_POST['Aula_Codigo'] = "";
	if (!isset($_POST['Profesor_ID'])) $_POST['Profesor_ID'] = "";
	$query = "INSERT INTO `asignatura` (`Codigo`, `Nombre`, `NoHorasSemana`, `Incidencias`, `Fecha`, `Aula_Codigo`, `Profesor_ID`) 
	VALUES ('".$_POST['Codigo']."', '".$_POST['Nombre']."', '".$_POST['NoHorasSemana']."', '".$_POST['Incidencias']."', '".$_POST['Fecha']."', '".$_POST['Aula_Codigo']."', '".$_POST['Profesor_ID']."');";
	$resultado = mysqli_query($enlace, $query);
	if ($resultado) {
		$_SESSION['flash'] = "AA";
		header("Location: asignaturas");
		exit();
	}else{
		$_SESSION['flash'] = "AgregarError";
		header("Location: asignaturas");
		exit();
	}
}
?>
	<div class="container">
		<div class="text-center">
			<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
			<h2>Registrar nueva Asignatura</h2>
			<p>Ingresa los datos de la Asignatura a registrar</p>
			<form action="" method="post">
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Codigo">Codigo:</label>
					<input name="Codigo" id="Codigo" type="number" class="form-control" minlength="3" maxlength="6" placeholder="283746" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Nombre">Nombre:</label>
					<input name="Nombre" id="Nombre" type="text" class="form-control" minlength="3" maxlength="35" placeholder="Victor Emanuel" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="NoHorasSemana">Horas a la semana:</label>
					<input name="NoHorasSemana" id="NoHorasSemana" type="number" class="form-control" minlength="3" maxlength="35" placeholder="15" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Incidencias">Incidencias:</label>
					<input name="Incidencias" id="Incidencias" type="text" class="form-control" minlength="5" maxlength="50" placeholder="Ninguna" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Fecha">Fecha:</label>
					<input name="Fecha" id="Fecha" type="datetime" class="form-control" maxlength="35" placeholder="2017-05-31 14:00:00" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Aula_Codigo">Codigo de Aula:</label>
					<input name="Aula_Codigo" id="Aula_Codigo" type="number" class="form-control" maxlength="6" placeholder="123456" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Profesor_ID">ID Profesor:</label>
					<input name="Profesor_ID" id="Profesor_ID" type="number" class="form-control" maxlength="6" placeholder="2" required>
					<br><input class="btn btn-primary btn-sm" type="submit" value="Registrar" />
				</div><br>
			</form><br>
		</div>
	</div>
<?php include('include/footer.php') ?>