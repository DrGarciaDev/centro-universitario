<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');
  exit();
}
$titulo = "Editar Aula";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT * FROM aula WHERE Codigo =" . $_GET['codigo'] . "";
$resultado = mysqli_query($enlace, $query);
$aula = $resultado->fetch_object();
if (empty($aula)) {
	exit();
}
if (!empty($_POST)) {
	if (!isset($_POST['Codigo'])) $_POST['Codigo'] = "";
	if (!isset($_POST['NoAula'])) $_POST['NoAula'] = "";
	if (!isset($_POST['Modulo'])) $_POST['Modulo'] = "";
	$query = "UPDATE `aula` SET `Codigo` =  '" . $_POST['Codigo'] . "',`NoAula` = '" . $_POST['NoAula'] . "',
    `Modulo` = '" . $_POST['Modulo'] . "' WHERE `Codigo` =" . $_GET['codigo'] . "";
	$resultado = mysqli_query($enlace, $query);
	if ($resultado) {
		$_SESSION['flash'] = "AE";
		header("Location: aulas");
		exit();
	}
}
?>
		<div class="container">
			<div class="text-center">
				<img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
				<h2>Editar Aula</h2>
				<p>Estas actualizando la informacion de "<strong><?php echo $aula->Codigo; ?></strong>"</p>
				<form action="" method="POST">
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Codigo">Codigo</label>
						<input class="form-control" name="Codigo" id="Codigo" type="text" value="<?php if(isset($aula->Codigo)) echo $aula->Codigo; ?>" />
					</div> 
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="NoAula">Numero de Aula</label>
						<input class="form-control" name="NoAula" id="NoAula" type="text" value="<?php if(isset($aula->NoAula)) echo $aula->NoAula; ?>" />
					</div>
					<div class="form-group col-xs-4 col-xs-offset-4">
						<label for="Modulo">Modulo</label>
						<input class="form-control" name="Modulo" id="Modulo" type="text" value="<?php if(isset($aula->Modulo)) echo $aula->Modulo; ?>" />
						<br><input class="btn btn-primary btn-sm" type="submit" value="Actualizar" />
					</div>
				</form>  
			</div>
		</div>
<?php include('include/footer.php') ?>