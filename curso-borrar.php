<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: ingresar');
  exit();
}

include('config/conexion.php');
include('include/header.php');
if(empty($_GET['codigo'])){
  header('Location: cursos');
  exit();
} 

$query = "DELETE FROM `curso` WHERE `Codigo` = ".$_GET['codigo'];
$resultado = mysqli_query($enlace,$query);
if($resultado){
  $_SESSION['flash'] = "CD";
}
header('Location: cursos');
?>