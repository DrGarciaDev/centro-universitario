<?php
session_start();
if( !isset($_SESSION['usuario']) ){
  header('Location: ingresar');exit();
}
$titulo = "Lista de Profesores";
include('config/conexion.php');
include ('include/header.php');
$query = "SELECT * FROM profesor";
$resultado = mysqli_query($enlace, $query);
?>
    <div class="container">
      <?php
      if(isset($_SESSION['flash'])){
        if($_SESSION['flash']=='PD'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Profesor eliminado correctamente.</div>';
        }elseif($_SESSION['flash']=='PE'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Profesor editado correctamente.</div>';
        }elseif($_SESSION['flash']=='PA'){
          echo '<div class="alert alert-success"><strong>Completado!</strong> Profesor agregado correctamente.</div>';
        }
        unset($_SESSION['flash']);
      }
      ?>
      <div class="text-center">
        <img class="img-responsive center-block" src="img/cucei.PNG" alt="cucei">
        <h2>Lista de Profesores</h2>
        <p>En la siguiente tabla se muestra el listado de todos los Profesores:</p>  
        <button type="button" class="btn btn-primary btn-sm" onclick="location.href='profesor-agregar'">Agregar Nuevo</button><br><br>
      </div>
      <table class="table table-striped table-responsive">
        <tr>
          <th>ID</th>
          <th>Nombre(s)</th>
          <th>Apellidos</th>
          <th>Dirección</th>
          <th>Ciudad</th>
          <th>Telefono</th>
          <th>CP</th>
          <th>Acciones</th>
        </tr>
        <?php while ($row = $resultado->fetch_object()){ ?>
        <tr>
          <td><?php echo $row->ID ?>&nbsp;</td>
          <td><?php echo $row->Nombre ?>&nbsp;</td>
          <td><?php echo $row->Apellidos ?>&nbsp;</td>
          <td><?php echo $row->Direccion ?>&nbsp;</td>
          <td><?php echo $row->Ciudad ?>&nbsp;</td>
          <td><?php echo $row->Telefono ?>&nbsp;</td>
          <td><?php echo $row->CP ?>&nbsp;</td>
          <td>
            <button type="button" class="btn btn-info btn-xs" onclick="location.href='profesor-ver.php?id=<?= $row->ID ?>'">Ver</button>
            <button type="button" class="btn btn-success btn-xs" onclick="location.href='profesor-editar.php?id=<?= $row->ID ?>'">Editar</button>
            <button type="button" class="btn btn-danger btn-xs" onclick="location.href='profesor-borrar.php?id=<?= $row->ID ?>'">Borrar</button>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
<?php include('include/footer.php') ?>