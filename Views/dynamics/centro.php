<?php 
include('../static/header.php');
?>
<br><br>
<div class="container  my-5 slider-updown">
  <div class="row bg-white rounded shadow-lg mx-1">
    <div class="col-md-6 col-sm-12">
      <h3 class="text-center text-uppercase font-weight-bold my-5">Agrega coordenadas</h3>
      <p class="mt-4 ml-5 mr-5 text-justify">
        Debes seleccionar un archivo de texto que cumpla con el formato de texto <strong> "T;N;X,Y"</strong>.
        <br><br>
        <strong>"T"</strong> puede ser <strong>"P"</strong>  o  <strong>"C"</strong>  para indicar si es
        un punto de venta o un centro de distribución respectivamente.
        <br><br>
        <strong>"N"</strong> es un identificador numérico (entero) de cada ubicación.
        <br><br>
        <strong>"X"</strong> e <strong>"Y"</strong> son las coordenadas X e Y donde está ubicado el centro, ingresada
        con valores enteros separados por <strong>","</strong>
      </p>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="mt-5 mr-5">
        <div class="custom-file ml-2 mr-2 ">
          <input type="file" class="custom-file-input" id="archivo" required>
          <label class="custom-file-label" for="validatedCustomFile">Agregar archivo de texto...</label>
          <div class="invalid-feedback">Archivo invalido</div>
        </div>
        <div class="form-group shadow-textarea ml-2 ">
          <label for="exampleFormControlTextarea6"></label>
          <textarea class="form-control" id="editor" rows="3" ></textarea>
        </div>
      </div>
      <a href="hojaDeRuta.php" class="btn btn-success ml-2 my-3" role="button" aria-disabled="true">Agregar</a>
    </div>
  </div>
</div>

<?php include('../static/footer.php'); ?>