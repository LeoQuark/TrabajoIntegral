<?php
include('../static/header.php');

include_once '../conection/conexion.php';
$sql_leer='SELECT * FROM camion';

$gsent = $pdo->prepare($sql_leer);
$gsent->execute();

$resultado = $gsent->fetchAll();

if(isset($_POST['PATENTE'])){
  $PAT = $_POST['PATENTE'];
  $sql_agregar = 'INSERT INTO camion (PATENTE) VALUES (?)';
  $sentencia_agregar = $pdo->prepare($sql_agregar);
  $sentencia_agregar->execute(array($PAT));
  header('location:camion.php');

}

if($_GET){
  $id = $_GET['id'];
  $sql_unico='SELECT * FROM camion WHERE id=?';
  $gsent_unico = $pdo->prepare($sql_unico);
  $gsent_unico->execute(array($id));
  $resultado_unico = $gsent_unico->fetch();

  }

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link type="text/css" rel="stylesheet" href="css/styles.css">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/b097035380.js" crossorigin="anonymous"></script>
  <link rel="icon" href="img/truck.png">

  <title>Inicio | Grafos</title>
</head>




<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <div class="container-fluid">
      <div class="row">
        <div>
          <a href="index.html"><img src="img/truck.png" class="pb-1 mx-2" alt="" width="30px" height="30px"></a>
          <a href="index.html" class="navbar-brand font-weight-bold text-uppercase mx-3">Trabajo Integral</a>
        </div>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbar">
        <div class="row">
          <ul class="navbar-nav ml-3">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Inicio</a>
            </li>
            <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Agregar
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Camiones.html">Camión</a>
                <a class="dropdown-item" href="Centros.html">Archivo de coordenadas</a>
              </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="hojaDeRuta.html">Hojas de ruta</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="nosotros.html">Nosotros</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  
  <?php if($_GET): ?>
  <div class="container bg-white rounded sm-12 shadow-lg p-3 mb-5 mt-5 ">
    

    <h4 class="text-center mb-3">Editar camiones</h4>
      <div class="row d-flex justify-content-center">
        <div class="col-lg-4 col-md-12">
          <form method="GET" action="camionEdit.php">
            <table class="table table-borderless table-striped table-sm">
              <tr>
                <td>Patente</td>
                <td><input type="text" class="form-control" placeholder="AABB00" name="PATENTE"
                 value="<?php echo $resultado_unico['PATENTE'] ?>">
                 <input type="text" class="d-none" value="<?php echo $resultado_unico['id'] ?>" name="id">
                 </td>
                </tr>
            </table>
            <div class="mt-1 text-center">
            <button type="submit" class="btn btn-success ml-5" onclick="correcto()"><span class="fa fa-check" aria-hidden="true"></span></button>
            
          </div>
          </form>
        </div>
      </div>
  </div>
  <?php endif ?>

  <br><br><br>
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
                <tr id="eliminar"style="text-transform:uppercase;">
                  <th scope="row"><?php echo $dato['id'] ?></th>
                  <td><?php echo $dato['PATENTE'] ?> 
                  
                  <a href="eliminar.php?id=<?php echo $dato['id'] ?>"
                   class="float-right " onclick="return borrar()"><i class="fa fa-trash ml-5" style="color: red"></i></a>

                  <a href="camion.php?id=<?php echo $dato['id'] ?>"
                   class="float-right"><i class="fa fa-pencil" ></i></a>
                
                </td>

                </tr>
                <?php endforeach ?>  
              </tbody>
            </table>
          </form>
        </div>
      </div>
  </div>
  
  <?php if(!$_GET): ?>
  <div class="container bg-white rounded sm-12 shadow-lg p-3 mb-5 mt-5 ">
    <h4 class="text-center mb-3">Agregar camiones</h4>
      <div class="row d-flex justify-content-center">
        <div class="col-lg-4 col-md-12">
          <form method="POST">
            <table class="table table-borderless table-striped table-sm">
              <tr>
                <td>Patente</td>
                <td><input type="text" class="form-control" placeholder="AABB00" 
                required name="PATENTE"style="text-transform:uppercase;"></td>
              </tr>
            </table>
            <div class="mt-1 text-center">
            <button type="submit" class="btn btn-success ml-5" onclick="agregar()"><span class="fa fa-plus" 
            aria-hidden="true"></span></button>
            </div>
          </form>
        </div>
      </div>
  </div>
  <?php endif ?>

 


 
<script>


function correcto() {
  alert("Patente actualizada correctamente !");
}


function borrar(){
  var respuesta = confirm("¿Estás seguro que deseas eliminar esta patente?");
  if (respuesta == true) {
    return true;
  } else {
    return false;
  }
}




</script>

<?php include('../static/footer.php'); ?>
