<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Lista de Asignaturas";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT asignatura.Codigo,asignatura.Nombre,asignatura.NoHorasSemana,asignatura.Incidencias,asignatura.Fecha,CONCAT(aula.Modulo,aula.NoAula) as Aula,CONCAT(profesor.Nombre,' ',profesor.Apellidos) as Profesor FROM asignatura INNER JOIN aula ON asignatura.Aula_Codigo = aula.Codigo INNER JOIN profesor ON asignatura.Profesor_ID = profesor.ID";
$resultado = mysqli_query($enlace, $query);
?>
    <div class="container">
      <?php
      if(isset($_SESSION['flash'])){
        if($_SESSION['flash']=='AD'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Asignatura eliminada correctamente.</div>';
        }elseif($_SESSION['flash']=='AE'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Asignatura editada correctamente.</div>';
        }elseif($_SESSION['flash']=='AA'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Asignatura agregada correctamente.</div>';
        }elseif($_SESSION['flash']=='EditarError'){
          echo '<div class="alert alert-danger"><strong>Error!</strong> Asignatura No se pudo editar, verifica el formato.</div>';
        }elseif($_SESSION['flash']=='AgregarError'){
          echo '<div class="alert alert-danger"><strong>Error!</strong> Asignatura No se pudo agregar, verifica el formato.</div>';
        }
        unset($_SESSION['flash']);
      }
      ?>
      <div class="text-center">
        <img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
        <h2>Lista de Asignaturas</h2>
        <p>En la siguiente tabla se muestra el listado de todas las Asignaturas:</p>  
        <button type="button" class="btn btn-primary btn-sm" onclick="location.href='asignatura-agregar'">Agregar Nueva</button><br><br>
      </div>
      <table class="table table-striped table-responsive">
        <tr>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Horas a la Semana</th>
          <th>Incidencias</th>
          <th>Fecha</th>
          <th>Aula</th>
          <th>Profesor</th>
          <th>Acciones</th>
        </tr>
        <?php while ($row = $resultado->fetch_object()){ ?>
        <tr>
          <td><?php echo $row->Codigo ?>&nbsp;</td>
          <td><?php echo $row->Nombre ?>&nbsp;</td>
          <td><?php echo $row->NoHorasSemana ?>&nbsp;</td>
          <td><?php 
                if($row->Incidencias == NULL or $row->Incidencias == " "){
                  echo "Ninguna";
                } 
              ?>&nbsp;</td>
          <td><?php echo $row->Fecha ?>&nbsp;</td>
          <td><?php echo $row->Aula ?>&nbsp;</td>
          <td><?php echo $row->Profesor ?>&nbsp;</td>
          <td>
            <button type="button" class="btn btn-info btn-xs" onclick="location.href='asignatura-ver.php?codigo=<?= $row->Codigo ?>'">Ver</button>
            <button type="button" class="btn btn-success btn-xs" onclick="location.href='asignatura-editar.php?codigo=<?= $row->Codigo ?>'">Editar</button>
            <button type="button" class="btn btn-danger btn-xs" onclick="location.href='asignatura-borrar.php?codigo=<?= $row->Codigo ?>'">Borrar</button>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
<?php include('include/footer.php') ?>