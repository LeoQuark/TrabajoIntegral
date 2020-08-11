<?php 
include('../static/header.php');
?>
<!-- CONTENIDO -->
<br><br>
<div class="container bg-white rounded sm-12 shadow-lg p-3 my-5 slider-updown" id="divIndex">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h1 class="text-center mt-5 font-weight-bold title">Bienvenido</h1>
            <p class="mt-5 ml-5 mr-5 text-justify">
                En esta plataforma podrás tener acceso a tu hoja de ruta diaria de forma simplificada
                permitiendo disminuir los tiempos de traslado.
                <br><br>
                Ademas podrás agregar información de camiones y archivos de coordenadas
                <br><br>
                Para conocer la información de tu hoja de ruta ingresa un archivo de texto en la sección agregar.
            </p>
            <div class="ml-5 mt-5 mb-5">
                <a href="../dynamics/hojaDeRuta.php" class="btn btn-info btn-lg" role="button">Ver tu hoja de ruta</a>
                <button class="btn btn-outline-info btn-lg dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Agregar</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../dynamics/camion.php">Camión</a>
                    <a class="dropdown-item" href="../dynamics/centro.php">Archivo de coordenada</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center ">
            <img src="../../img/dist.jpg" alt="img" class="dist img-fluid align-center img-opacity">
        </div>
    </div>
</div>

<?php include('../static/footer.php'); ?>