<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');
  exit();
}
$titulo = "Editar Profesor";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT * FROM profesor WHERE id =" . $_GET['id'] . "";
$resultado = mysqli_query($enlace, $query);
$profesor = $resultado->fetch_object();
if (empty($profesor)) {
	exit();
}
if (!empty($_POST)) {
	if (!isset($_POST['Nombre'])) $_POST['Nombre'] = "";
	if (!isset($_POST['Apellidos'])) $_POST['Apellidos'] = "";
	if (!isset($_POST['Direccion'])) $_POST['Direccion'] = "";
	if (!isset($_POST['Ciudad'])) $_POST['Ciudad'] = "";
	if (!isset($_POST['Telefono'])) $_POST['Telefono'] = "";
	if (!isset($_POST['CodigoPostal'])) $_POST['CodigoPostal'] = "";
	$query = "UPDATE `profesor` SET `Nombre` =  '" . $_POST['Nombre'] . "',`Apellidos` = '" . $_POST['Apellidos'] . "',
    `Direccion` = '" . $_POST['Direccion'] . "',`Ciudad` = '" . $_POST['Ciudad'] . "',`Telefono` = '" . $_POST['Telefono'] . "',
    `CP` = '" . $_POST['CodigoPostal'] . "' WHERE `ID` =" . $_GET['id'] . "";
	$resultado = mysqli_query($enlace, $query);
	if ($resultado) {
		$_SESSION['flash'] = "PE";
		header("Location: profesores");
		exit();
	}
}
?>
		<div class="container">
			<div class="text-center">
				<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
				<h2>Editar Profesor</h2>
				<p>Estas actualizando la informacion de "<strong><?php echo $profesor->Nombre," ",$profesor->Apellidos; ?></strong>"</p>
				<form action="" method="POST">
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Nombre">Nombre</label>
						<input class="form-control" name="Nombre" id="Nombre" type="text" value="<?php if(isset($profesor->Nombre)) echo $profesor->Nombre; ?>" />
					</div> 
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Apellidos">Apellidos</label>
						<input class="form-control" name="Apellidos" id="Apellidos" type="text" value="<?php if(isset($profesor->Apellidos)) echo $profesor->Apellidos; ?>" />
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Direccion">Dirección</label>
						<input class="form-control" name="Direccion" id="Direccion" type="text" value="<?php if(isset($profesor->Direccion)) echo $profesor->Direccion; ?>" />
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Ciudad">Ciudad</label>
						<input class="form-control" name="Ciudad" id="Ciudad" type="text" value="<?php if(isset($profesor->Ciudad)) echo $profesor->Ciudad; ?>" />
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Telefono">Telefono</label>
						<input class="form-control" name="Telefono" id="Telefono" type="text" value="<?php if(isset($profesor->Telefono)) echo $profesor->Telefono; ?>" />
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="CodigoPostal">Codigo Postal</label>
						<input class="form-control" name="CodigoPostal" id="CodigoPostal" type="text" value="<?php if(isset($profesor->CP)) echo $profesor->CP; ?>" />
						<br><input class="btn btn-primary btn-sm" type="submit" value="Actualizar" />
					</div>
				</form>  
			</div>
		</div>
<?php include('include/footer.php') ?>