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

<div class="container bg-white rounded col-8 sm-5 shadow-lg p-3 mb-5 mt-5 ">
  <div class="form-row">
    <div class="col">
      <h4 class=" text-center mt-4 mb-5">HOJA DE RUTA</h4>
      <div class="col-lg-4 col-sm-12">
        <h6 class="ml-1">Para comenzar selecciona tu camión</h6>
        <select class="custom-select mb-2 ">
          <option selected>Selecciona un camion</option>
          <?php foreach($resultado as $dato): ?>
          <option value="1"><?php echo $dato['PATENTE'] ?></option>
          <?php endforeach ?>  
        </select>
      </div>
      <div class="col-lg-7 col-sm-12">
      <hr>
      </div>
      <div class="col-12">
        <div class="mb-3 ml-2">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">Centro de distribución</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">Punto de venta</label>
          </div>
        </div>
        <select class="custom-select col-lg-4 col-sm-12 ">
          <option selected>Selecciona una opción</option>
          <option value="1">Centro 1</option>
          <option value="2">Centro 2</option>
          <option value="3">Centro 3</option>
        </select>
        <label for="exampleFormControlFile1" class="ml-1">Cantidad elementos a distribuir :</label>
        <input type="number" class="text-center mt-1" id="quantity" name="quantity" min="1" max="1000" placeholder="1">
        <button type="button" class=" ml-3 btn btn-success btn-sm">Agregar</button>
        <button type="button" class="ml-3 btn btn-danger btn-sm ">Eliminar</button>
      </div>
    </div>
  </div>
  <button type="button" class="ml-3 mt-4 btn btn-primary ">Finalizar</button>
</div>