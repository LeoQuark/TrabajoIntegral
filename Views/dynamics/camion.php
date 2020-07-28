<?php
include('../static/header.php');

include_once '../conection/conexion.php';
$sql_leer='SELECT * FROM camion';

$gsent = $pdo->prepare($sql_leer);
$gsent->execute();

$resultado = $gsent->fetchAll();
$contador=1;

if(isset($_POST['PATENTE'])){
  $PAT = $_POST['PATENTE'];
  $sql_agregar = 'INSERT INTO camion (PATENTE) VALUES (?)';
  $sentencia_agregar = $pdo->prepare($sql_agregar);
  $sentencia_agregar->execute(array($PAT));
  header('location:Camion.php');

}
?>
<div class="container bg-white rounded sm-12 shadow-lg p-3 mb-5 mt-5 ">
  <h2 class="text-center mb-5">Camiones</h1>
  <div class="row d-flex justify-content-center">
    <div class="col-lg-8 col-md-12">
      <form action="">
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">Camión</th>
              <th scope="col">Patente</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($resultado as $dato): ?>
            <tr>
              <th scope="row"><?php echo $contador ?></th>
              <td><?php echo $dato['PATENTE'] ?> 
                <a href="camion.php?id=" class="float-right"><i class="fa fa-pencil" ></i></a>
              </td>
            </tr>
            <?php $contador= $contador + 1; ?>   
            <?php endforeach ?>  
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<div class="container bg-white rounded sm-12 shadow-lg p-3 mb-5 mt-5 ">
  <h4 class="text-center mb-3">Administrar camiones</h4>
  <div class="row d-flex justify-content-center">
    <div class="col-lg-4 col-md-12">
      <form method="POST">
        <table class="table table-borderless table-striped table-sm">
          <tr>
            <td>Patente</td>
            <td><input type="text" class="form-control" placeholder="AABB00" name="PATENTE"></td>
          </tr>
        </table>
        <div class="mt-1 text-center">
          <button type="submit" class="btn btn-success ml-5"><span class="fa fa-plus" aria-hidden="true"></span></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include('../static/footer.php'); ?>
