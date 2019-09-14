<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');
  exit();
}
$titulo = "Editar Asignatura";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT * FROM asignatura WHERE Codigo =" . $_GET['codigo'] . "";
$resultado = mysqli_query($enlace, $query);
$asignatura = $resultado->fetch_object();
if (empty($asignatura)) {
	exit();
}
if (!empty($_POST)) {
	if (!isset($_POST['Codigo'])) $_POST['Codigo'] = "";
	if (!isset($_POST['Nombre'])) $_POST['Nombre'] = "";
	if (!isset($_POST['NoHorasSemana'])) $_POST['NoHorasSemana'] = "";
	if (!isset($_POST['Incidencias'])) $_POST['Incidencias'] = "";
	if (!isset($_POST['Fecha'])) $_POST['Fecha'] = "";
	if (!isset($_POST['Aula_Codigo'])) $_POST['Aula_Codigo'] = "";
	if (!isset($_POST['Profesor_ID'])) $_POST['Profesor_ID'] = "";
	$query = "UPDATE `asignatura` SET `Codigo` =  '" . $_POST['Codigo'] . "',`Nombre` = '" . $_POST['Nombre'] . "',
    `NoHorasSemana` = '" . $_POST['NoHorasSemana'] . "',`Incidencias` = '" . $_POST['Incidencias'] . "',`Fecha` = '" . $_POST['Fecha'] . "',
    `Aula_Codigo` = '" . $_POST['Aula_Codigo'] . "',`Profesor_ID` = '" . $_POST['Profesor_ID'] . "' WHERE `Codigo` =" . $_GET['codigo'] . "";
	$resultado = mysqli_query($enlace, $query);
	if ($resultado) {
		$_SESSION['flash'] = "AE";
		header("Location: asignaturas");
		exit();
	}else{
		$_SESSION['flash'] = "EditarError";
		header("Location: asignaturas");
		exit();
	}
}
?>
		<div class="container">
			<div class="text-center">
				<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
				<h2>Editar Asignatura</h2>
				<p>Estas actualizando la informacion de "<strong><?php echo $asignatura->Codigo; ?></strong>"</p>
				<form action="" method="POST">
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Codigo">Codigo</label>
						<input class="form-control" name="Codigo" id="Codigo" type="number" value="<?php if(isset($asignatura->Codigo)) echo $asignatura->Codigo; ?>" />
					</div> 
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Nombre">Nombre</label>
						<input class="form-control" name="Nombre" id="Nombre" type="text" value="<?php if(isset($asignatura->Nombre)) echo $asignatura->Nombre; ?>" />
					</div> 
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="NoHorasSemana">Horas a la semana</label>
						<input class="form-control" name="NoHorasSemana" id="NoHorasSemana" type="number" value="<?php if(isset($asignatura->NoHorasSemana)) echo $asignatura->NoHorasSemana; ?>" />
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Incidencias">Incidencias</label>
						<input class="form-control" name="Incidencias" id="Incidencias" type="text" value="<?php if(isset($asignatura->Incidencias)) echo $asignatura->Incidencias; ?>" />
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Fecha">Fecha</label>
						<input class="form-control" name="Fecha" id="Fecha" type="datetime" value="<?php if(isset($asignatura->Fecha)) echo $asignatura->Fecha; ?>" />
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Aula_Codigo">Codigo de Aula</label>
						<input class="form-control" name="Aula_Codigo" id="Aula_Codigo" type="number" value="<?php if(isset($asignatura->Aula_Codigo)) echo $asignatura->Aula_Codigo; ?>" />
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Profesor_ID">ID de Profesor</label>
						<input class="form-control" name="Profesor_ID" id="Profesor_ID" type="number" value="<?php if(isset($asignatura->Profesor_ID)) echo $asignatura->Profesor_ID; ?>" />
						<br><input class="btn btn-primary btn-sm" type="submit" value="Actualizar" />
					</div>
				</form>  
			</div>
		</div>
<?php include('include/footer.php') ?>