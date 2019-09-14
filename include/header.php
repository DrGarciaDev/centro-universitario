<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;" charset="utf8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $titulo; ?> | Centro Universitario</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index">Centro Universitario</a>
        </div>
        <ul class="nav navbar-nav">
          <?php
          if(isset($_SESSION['usuario']) ){
            echo '<li><a href="profesores">Lista de Profesores</a></li>';
            echo '<li><a href="alumnos">Lista de Alumnos</a></li>';
            echo '<li><a href="asignaturas">Lista de Asignaturas</a></li>';
            echo '<li><a href="aulas">Lista de Aulas</a></li>';
            echo '<li><a href="cursos">Lista de Cursos</a></li>';
            echo '<li><a href="clases-alumno">Clases de los Alumnos</a></li>';
          }
          ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
          if(isset($_SESSION['usuario']) ){
            echo '<li><a href="ingresar"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>';
          }
          ?>
        </ul>
      </div>
    </nav>
