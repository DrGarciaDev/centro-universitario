<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Lista de Aulas";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT CONCAT(alumno.Nombre,' ',alumno.Apellidos) AS Alumno,asignatura.Nombre AS Asignatura,CONCAT(aula.Modulo,aula.NoAula) AS Aula,CONCAT(profesor.Nombre,' ',profesor.Apellidos) AS Profesor FROM clases_alumno INNER JOIN alumno ON clases_alumno.alumno_ID = alumno.ID INNER JOIN asignatura ON clases_alumno.Asignatura_Codigo = asignatura.Codigo INNER JOIN aula ON clases_alumno.Asignatura_Aula_Codigo = aula.Codigo INNER JOIN profesor ON clases_alumno.Asignatura_Profesor_ID = profesor.ID";
$resultado = mysqli_query($enlace, $query);
?>
    <div class="container">
      <div class="text-center">
        <img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
        <h2>Lista de Clases de los Alumnos</h2>
        <p>En la siguiente tabla se muestra el listado de todas las Clases de los Alumnos:</p><br><br>
      </div>
      <table class="table table-striped table-responsive">
        <tr>
          <th>Alumno</th>
          <th>Asignatura</th>
          <th>Aula</th>
          <th>Profesor</th>
        </tr>
        <?php while ($row = $resultado->fetch_object()){ ?>
        <tr>
          <td><?php echo $row->Alumno ?>&nbsp;</td>
          <td><?php echo $row->Asignatura ?>&nbsp;</td>
          <td><?php echo $row->Aula ?>&nbsp;</td>
          <td><?php echo $row->Profesor ?>&nbsp;</td>
        </tr>
        <?php } ?>
      </table>
    </div>
<?php include('include/footer.php') ?>