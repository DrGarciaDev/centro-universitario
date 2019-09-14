<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Lista de Cursos";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT curso.Codigo,curso.Nombre,asignatura.Nombre AS Nombrea,CONCAT(aula.Modulo,aula.NoAula) as Aula,CONCAT(profesor.Nombre,' ',profesor.Apellidos) as Profesor FROM curso INNER JOIN asignatura ON curso.Asignatura_Codigo = asignatura.Codigo INNER JOIN aula ON curso.Asignatura_Aula_Codigo = aula.Codigo INNER JOIN profesor ON curso.Asignatura_Profesor_ID = profesor.ID";
$resultado = mysqli_query($enlace, $query);
?>
    <div class="container">
      <?php
      if(isset($_SESSION['flash'])){
        if($_SESSION['flash']=='CD'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Curso eliminado correctamente.</div>';
        }elseif($_SESSION['flash']=='CE'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Curso editado correctamente.</div>';
        }elseif($_SESSION['flash']=='CA'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Curso agregado correctamente.</div>';
        }elseif($_SESSION['flash']=='EditarError'){
          echo '<div class="alert alert-danger"><strong>Error!</strong> Curso no editado, verifica el formato.</div>';
        }elseif($_SESSION['flash']=='AgregarError'){
          echo '<div class="alert alert-danger"><strong>Error!</strong> Curso no agregado, verifica el formato.</div>';
        }
        unset($_SESSION['flash']);
      }
      ?>
      <div class="text-center">
        <img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
        <h2>Lista de Cursos</h2>
        <p>En la siguiente tabla se muestra el listado de todos los Cursos:</p>  
        <button type="button" class="btn btn-primary btn-sm" onclick="location.href='curso-agregar'">Agregar Nuevo</button><br><br>
      </div>
      <table class="table table-striped table-responsive">
        <tr>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Asignatura</th>
          <th>Aula</th>
          <th>Profesor</th>
          <th>Acciones</th>
        </tr>
        <?php while ($row = $resultado->fetch_object()){ ?>
        <tr>
          <td><?php echo $row->Codigo ?>&nbsp;</td>
          <td><?php echo $row->Nombre ?>&nbsp;</td>
          <td><?php echo $row->Nombrea ?>&nbsp;</td>
          <td><?php echo $row->Aula ?>&nbsp;</td>
          <td><?php echo $row->Profesor ?>&nbsp;</td>
          <td>
            <button type="button" class="btn btn-info btn-xs" onclick="location.href='curso-ver.php?codigo=<?= $row->Codigo ?>'">Ver</button>
            <button type="button" class="btn btn-success btn-xs" onclick="location.href='curso-editar.php?codigo=<?= $row->Codigo ?>'">Editar</button>
            <button type="button" class="btn btn-danger btn-xs" onclick="location.href='curso-borrar.php?codigo=<?= $row->Codigo ?>'">Borrar</button>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
<?php include('include/footer.php') ?>