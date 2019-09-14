<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');
  exit();
}
$titulo = "Agregar Curso";
include('config/conexion.php');
include ('include/header.php');

if (!empty($_POST)) {
	if (!isset($_POST['Codigo'])) $_POST['Codigo'] = "";
	if (!isset($_POST['Nombre'])) $_POST['Nombre'] = "";
	if (!isset($_POST['Asignatura_Codigo'])) $_POST['Asignatura_Codigo'] = "";
	if (!isset($_POST['Asignatura_Aula_Codigo'])) $_POST['Asignatura_Aula_Codigo'] = "";
	if (!isset($_POST['Asignatura_Profesor_ID'])) $_POST['Asignatura_Profesor_ID'] = "";
	$query = "INSERT INTO `curso` (`Codigo`, `Nombre`, `Asignatura_Codigo`, `Asignatura_Aula_Codigo`, `Asignatura_Profesor_ID`) 
	VALUES ('".$_POST['Codigo']."', '".$_POST['Nombre']."', '".$_POST['Asignatura_Codigo']."', '".$_POST['Asignatura_Aula_Codigo']."', '".$_POST['Asignatura_Profesor_ID']."');";
	$resultado = mysqli_query($enlace, $query);
	if ($resultado) {
		$_SESSION['flash'] = "CA";
		header("Location: cursos");
		exit();
	}else{
		$_SESSION['flash'] = "AgregarError";
		header("Location: cursos");
		exit();
	}
}
?>
	<div class="container">
		<div class="text-center">
			<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
			<h2>Registrar nuevo Curso</h2>
			<p>Ingresa los datos del Curso a registrar</p>
			<form action="" method="post">
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Codigo">Codigo:</label>
					<input name="Codigo" id="Codigo" type="number" class="form-control" minlength="3" maxlength="6" placeholder="283746" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Nombre">Nombre:</label>
					<input name="Nombre" id="Nombre" type="text" class="form-control" minlength="3" maxlength="35" placeholder="Programacion" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Asignatura_Codigo">Codigo Asignatura:</label>
					<input name="Asignatura_Codigo" id="Asignatura_Codigo" type="number" class="form-control" maxlength="6" placeholder="152344" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Asignatura_Aula_Codigo">Codigo de Aula:</label>
					<input name="Asignatura_Aula_Codigo" id="Asignatura_Aula_Codigo" type="number" class="form-control" maxlength="6" placeholder="123456" required>
				</div><br>
				<div class="form-group col-xs-4 col-xs-offset-4">
					<label for="Asignatura_Profesor_ID">ID Profesor:</label>
					<input name="Asignatura_Profesor_ID" id="Asignatura_Profesor_ID" type="number" class="form-control" maxlength="6" placeholder="2" required>
					<br><input class="btn btn-primary btn-sm" type="submit" value="Registrar" />
				</div><br>
			</form><br>
		</div>
	</div>
<?php include('include/footer.php') ?>