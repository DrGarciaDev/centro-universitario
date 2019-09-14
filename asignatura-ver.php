<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Ver Asignatura";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT * FROM asignatura WHERE Codigo = " . $_GET['codigo'] . "";
$resultado = mysqli_query($enlace, $query);
$asignatura = $resultado->fetch_object();
if (empty($asignatura)) {
	header('Location: asignaturas');exit();
}
?>
		<div class="container">
			<div class="text-center">
				<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
				<h2>Ver Asignatura</h2>
				<p>Estas viendo la informacion de "<strong><?php echo $asignatura->Codigo; ?></strong>"</p>
				<form action="" id="Ver">
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Codigo">Codigo</label>
						<input class="form-control" name="Codigo" id="Codigo" type="text" value="<?php if(isset($asignatura->Codigo)) echo $asignatura->Codigo; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Nombre">Nombre</label>
						<input class="form-control" name="Nombre" id="Nombre" type="text" value="<?php if(isset($asignatura->Nombre)) echo $asignatura->Nombre; ?>" readonly="readonly"/>
					</div> 
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="NoHorasSemana">Horas a la semana</label>
						<input class="form-control" name="NoHorasSemana" id="NoHorasSemana" type="text" value="<?php if(isset($asignatura->NoHorasSemana)) echo $asignatura->NoHorasSemana; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Incidencias">Incidencias</label>
						<input class="form-control" name="Incidencias" id="Incidencias" type="text" value="<?php if($asignatura->Incidencias == NULL){
																													echo "Ninguna";
																											     }else{
																													echo $asignatura->Incidencias;
																												 }?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Fecha">Fecha</label>
						<input class="form-control" name="Fecha" id="Fecha" type="text" value="<?php if(isset($asignatura->Fecha)) echo $asignatura->Fecha; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Aula_Codigo">Codigo de Aula</label>
						<input class="form-control" name="Aula_Codigo" id="Aula_Codigo" type="text" value="<?php if(isset($asignatura->Aula_Codigo)) echo $asignatura->Aula_Codigo; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Profesor_ID">ID del Profesor</label>
						<input class="form-control" name="Profesor_ID" id="Profesor_ID" type="text" value="<?php if(isset($asignatura->Profesor_ID)) echo $asignatura->Profesor_ID; ?>" readonly="readonly"/>
						<br><input class="btn btn-primary btn-sm" type="button" onclick="location.href='asignaturas'" value="Regresar a Lista de Asignaturas" />
					</div>
				</form>  
			</div>
		</div>
<?php include('include/footer.php') ?>