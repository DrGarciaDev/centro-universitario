<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Ver Curso";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT * FROM curso WHERE Codigo = " . $_GET['codigo'] . "";
$resultado = mysqli_query($enlace, $query);
$curso = $resultado->fetch_object();
if (empty($curso)) {
	header('Location: cursos');
	exit();
}
?>
		<div class="container">
			<div class="text-center">
				<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
				<h2>Ver Curso</h2>
				<p>Estas viendo la informacion de "<strong><?php echo $curso->Codigo; ?></strong>"</p>
				<form action="" id="Ver">
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Codigo">Codigo</label>
						<input class="form-control" name="Codigo" id="Codigo" type="text" value="<?php if(isset($curso->Codigo)) echo $curso->Codigo; ?>" readonly="readonly"/>
					</div> 
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Nombre">Nombre</label>
						<input class="form-control" name="Nombre" id="Nombre" type="text" value="<?php if(isset($curso->Nombre)) echo $curso->Nombre; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Asignatura_Codigo">Codigo Asignatura</label>
						<input class="form-control" name="Asignatura_Codigo" id="Asignatura_Codigo" type="text" value="<?php if(isset($curso->Asignatura_Codigo)) echo $curso->Asignatura_Codigo; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Asignatura_Aula_Codigo">Codigo Aula</label>
						<input class="form-control" name="Asignatura_Aula_Codigo" id="Asignatura_Aula_Codigo" type="text" value="<?php if(isset($curso->Asignatura_Aula_Codigo)) echo $curso->Asignatura_Aula_Codigo; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Asignatura_Profesor_ID">ID Profesor</label>
						<input class="form-control" name="Asignatura_Profesor_ID" id="Asignatura_Profesor_ID" type="text" value="<?php if(isset($curso->Asignatura_Profesor_ID)) echo $curso->Asignatura_Profesor_ID; ?>" readonly="readonly"/>
						<br><input class="btn btn-primary btn-sm" type="button" onclick="location.href='cursos'" value="Regresar a Lista de Cursos" />
					</div>
				</form>  
			</div>
		</div>
<?php include('include/footer.php') ?>