<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Ver Profesor";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT * FROM profesor WHERE id = " . $_GET['id'] . "";
$resultado = mysqli_query($enlace, $query);
$profesor = $resultado->fetch_object();
if (empty($profesor)) {
	header('Location: profesores');exit();
}
?>
		<div class="container">
			<div class="text-center">
				<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
				<h2>Ver Profesor</h2>
				<p>Estas viendo la informacion de "<strong><?php echo $profesor->Nombre," ",$profesor->Apellidos; ?></strong>"</p>
				<form action="" id="Ver">
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Nombre">Nombre</label>
						<input class="form-control" name="Nombre" id="Nombre" type="text" value="<?php if(isset($profesor->Nombre)) echo $profesor->Nombre; ?>" readonly="readonly"/>
					</div> 
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Apellidos">Apellidos</label>
						<input class="form-control" name="Apellidos" id="Apellidos" type="text" value="<?php if(isset($profesor->Apellidos)) echo $profesor->Apellidos; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Dirección">Dirección</label>
						<input class="form-control" name="Dirección" id="Dirección" type="text" value="<?php if(isset($profesor->Direccion)) echo $profesor->Direccion; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Ciudad">Ciudad</label>
						<input class="form-control" name="Ciudad" id="Ciudad" type="text" value="<?php if(isset($profesor->Ciudad)) echo $profesor->Ciudad; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Telefono">Telefono</label>
						<input class="form-control" name="Telefono" id="Telefono" type="text" value="<?php if(isset($profesor->Telefono)) echo $profesor->Telefono; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="CodigoPostal">Codigo Postal</label>
						<input class="form-control" name="CodigoPostal" id="CodigoPostal" type="text" value="<?php if(isset($profesor->CP)) echo $profesor->CP; ?>" readonly="readonly"/>
						<br><input class="btn btn-primary btn-sm" type="button" onclick="location.href='profesores'" value="Regresar a Lista de Profesores" />
					</div>
				</form>  
			</div>
		</div>
<?php include('include/footer.php') ?>