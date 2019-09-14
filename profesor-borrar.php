<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: ingresar');
  exit();
}

include('config/conexion.php');
include('include/header.php');
if(empty($_GET['id'])){
  header('Location: profesores');
  exit();
} 

$query = "DELETE FROM `profesor` WHERE `ID` = ".$_GET['id'];
$resultado = mysqli_query($enlace,$query);
if($resultado){
  $_SESSION['flash'] = "PD";
}
header('Location: profesores');
?>