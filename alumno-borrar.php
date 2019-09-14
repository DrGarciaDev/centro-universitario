<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: ingresar');
  exit();
}

include('config/conexion.php');
include('include/header.php');
if(empty($_GET['id'])){
  header('Location: alumnos');
  exit();
} 

$query = "DELETE FROM `alumno` WHERE `ID` = ".$_GET['id'];
$resultado = mysqli_query($enlace,$query);
if($resultado){
  $_SESSION['flash'] = "AD";
}
header('Location: alumnos');
?>