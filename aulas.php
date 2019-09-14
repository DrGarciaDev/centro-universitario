<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Lista de Aulas";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT * FROM aula;";
$resultado = mysqli_query($enlace, $query);
?>
    <div class="container">
      <?php
      if(isset($_SESSION['flash'])){
        if($_SESSION['flash']=='AD'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Aula eliminada correctamente.</div>';
        }elseif($_SESSION['flash']=='AE'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Aula editada correctamente.</div>';
        }elseif($_SESSION['flash']=='AA'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Aula agregada correctamente.</div>';
        }
        unset($_SESSION['flash']);
      }
      ?>
      <div class="text-center">
        <img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
        <h2>Lista de Aulas</h2>
        <p>En la siguiente tabla se muestra el listado de todas las Aulas:</p>  
        <button type="button" class="btn btn-primary btn-sm" onclick="location.href='aula-agregar'">Agregar Nueva</button><br><br>
      </div>
      <table class="table table-striped table-responsive">
        <tr>
          <th>Codigo</th>
          <th>Numero de Aula</th>
          <th>Modulo</th>
          <th>Acciones</th>
        </tr>
        <?php while ($row = $resultado->fetch_object()){ ?>
        <tr>
          <td><?php echo $row->Codigo ?>&nbsp;</td>
          <td><?php echo $row->NoAula ?>&nbsp;</td>
          <td><?php echo $row->Modulo ?>&nbsp;</td>
          <td>
            <button type="button" class="btn btn-info btn-xs" onclick="location.href='aula-ver.php?codigo=<?= $row->Codigo ?>'">Ver</button>
            <button type="button" class="btn btn-success btn-xs" onclick="location.href='aula-editar.php?codigo=<?= $row->Codigo ?>'">Editar</button>
            <button type="button" class="btn btn-danger btn-xs" onclick="location.href='aula-borrar.php?codigo=<?= $row->Codigo ?>'">Borrar</button>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
<?php include('include/footer.php') ?>