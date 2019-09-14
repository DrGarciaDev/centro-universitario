<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Ver Aulas";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT * FROM aula WHERE Codigo = " . $_GET['codigo'] . "";
$resultado = mysqli_query($enlace, $query);
$aula = $resultado->fetch_object();
if (empty($aula)) {
	header('Location: aulas');exit();
}
?>
		<div class="container">
			<div class="text-center">
				<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
				<h2>Ver Aula</h2>
				<p>Estas viendo la informacion de "<strong><?php echo $aula->Codigo; ?></strong>"</p>
				<form action="" id="Ver">
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Codigo">Codigo</label>
						<input class="form-control" name="Codigo" id="Codigo" type="text" value="<?php if(isset($aula->Codigo)) echo $aula->Codigo; ?>" readonly="readonly"/>
					</div> 
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="NoAula">Numero de Aula</label>
						<input class="form-control" name="NoAula" id="NoAula" type="text" value="<?php if(isset($aula->NoAula)) echo $aula->NoAula; ?>" readonly="readonly"/>
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Modulo">Modulo</label>
						<input class="form-control" name="Modulo" id="Modulo" type="text" value="<?php if(isset($aula->Modulo)) echo $aula->Modulo; ?>" readonly="readonly"/>
						<br><input class="btn btn-primary btn-sm" type="button" onclick="location.href='aulas'" value="Regresar a Lista de Aulas" />
					</div>
				</form>  
			</div>
		</div>
<?php include('include/footer.php') ?>