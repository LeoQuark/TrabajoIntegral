<?php
include('../static/header.php');

include_once '../conection/conexion.php';
$sql_leer = 'SELECT * FROM camion';

$gsent = $pdo->prepare($sql_leer);
$gsent->execute();

$resultado = $gsent->fetchAll();

if (isset($_POST['PATENTE'])) {
  $PAT = $_POST['PATENTE'];
  $sql_agregar = 'INSERT INTO camion (PATENTE) VALUES (?)';
  $sentencia_agregar = $pdo->prepare($sql_agregar);
  $sentencia_agregar->execute(array($PAT));
  header('location:camion.php');
}

if ($_GET) {
  $id = $_GET['id'];
  $sql_unico = 'SELECT * FROM camion WHERE id=?';
  $gsent_unico = $pdo->prepare($sql_unico);
  $gsent_unico->execute(array($id));
  $resultado_unico = $gsent_unico->fetch();
}
?>

<?php if ($_GET) : ?>
<br><br><br>
<div class="container slider-updown">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-sm-12 bg-white rounded shadow-lg">
            <div class="d-flex justify-content-center">
                <h4 class="text-capitalize mt-3 mb-2">editar camiones</h4>
            </div>
            <hr>
            <div class="">
                <form method="GET" action="camionEdit.php">
                    <div class="">
                        <table class="table table-borderless table-sm table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col" class="text-uppercase">patente</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $resultado_unico['id'] ?></th>
                                    <td><input type="text" class="form-control form-control-sm"
                                            value="<?php echo $resultado_unico['PATENTE'] ?>" name="PATENTE">
                                        <input type="text" class="d-none" value="<?php echo $resultado_unico['id'] ?>"
                                            name="id">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center my-2 pb-2">
                        <button type="submit" class="btn btn-success" onclick="correcto()"><span class="fa fa-check"
                                aria-hidden="true"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>

<!-- CONTENIDO -->
<br><br>
<div class="container bg-white rounded shadow-lg my-5 slider-lr" id="divCamiones">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-5 col-sm-12 border-dark">
            <h4 class="text-center text-capitalize font-weight-bold my-3">agregar camiones</h4>
            <hr>
            <form action="" method="POST">
                <table class="table table-borderless table-hover">
                    <tr>
                        <td class="text-uppercase pt-3">patente</td>
                        <td><input type="text" class="form-control" placeholder="AABB00" required name="PATENTE"
                                style="text-transform:uppercase;"></td>
                    </tr>
                </table>
                <div class="d-flex justify-content-center my-2">
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
        <div class="col-lg-5 col-sm-12">
            <h4 class="text-center text-capitalize font-weight-bold my-3">flota de camiones</h4>
            <div class="d-flex">
                <table class="table table-sm text-center table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" class="text-uppercase">patente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $dato) : ?>
                        <tr id="eliminar" style="text-transform:uppercase;">
                            <th scope="row"><?php echo $dato['id'] ?></th>
                            <td><?php echo $dato['PATENTE'] ?>
                                <a href="eliminar.php?id=<?php echo $dato['id'] ?>" class="float-right "
                                    onclick="return borrar()"><i class="fa fa-trash ml-5" style="color: red"></i></a>
                                <a href="camion.php?id=<?php echo $dato['id'] ?>" class="float-right"><i
                                        class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('../static/footer.php'); ?>