<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Ver Alumno";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT * FROM alumno WHERE id = " . $_GET['id'] . "";
$resultado = mysqli_query($enlace, $query);
$alumno = $resultado->fetch_object();
if (empty($alumno)) {
	header('Location: alumnos');exit();
}
?>
		<div class="container">
			<div class="text-center">
				<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
				<h2>Ver Alumno</h2>
				<p>Estas viendo la informacion de "<strong><?php echo $alumno->Nombre," ",$alumno->Apellidos; ?></strong>"</p>
				<form action="" id="Ver">
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Nombre">Nombre</label>
						<input class="form-control" name="Nombre" id="Nombre" type="text" value="<?php if(isset($alumno->Nombre)) echo $alumno->Nombre; ?>" readonly="readonly"/>
					</div> 
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Apellidos">Apellidos</label>
						<input class="form-control" name="Apellidos" id="Apellidos" type="text" value="<?php if(isset($alumno->Apellidos)) echo $alumno->Apellidos; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Dirección">Dirección</label>
						<input class="form-control" name="Dirección" id="Dirección" type="text" value="<?php if(isset($alumno->Direccion)) echo $alumno->Direccion; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Ciudad">Ciudad</label>
						<input class="form-control" name="Ciudad" id="Ciudad" type="text" value="<?php if(isset($alumno->Ciudad)) echo $alumno->Ciudad; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Telefono">Telefono</label>
						<input class="form-control" name="Telefono" id="Telefono" type="text" value="<?php if(isset($alumno->Telefono)) echo $alumno->Telefono; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="CodigoPostal">Codigo Postal</label>
						<input class="form-control" name="CodigoPostal" id="CodigoPostal" type="text" value="<?php if(isset($alumno->CP)) echo $alumno->CP; ?>" readonly="readonly"/>
						<br><input class="btn btn-primary btn-sm" type="button" onclick="location.href='alumnos'" value="Regresar a Lista de Alumnos" />
					</div>
				</form>  
			</div>
		</div>
<?php include('include/footer.php') ?>