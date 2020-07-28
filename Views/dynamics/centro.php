<?php 
include('../static/header.php');
?>

<div class="container bg-white rounded sm-12 shadow-lg p-3 mb-5 mt-5 ">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <h1 class="text-center mt-5">Agrega coordenadas</h1>
      <p class="mt-4 ml-5 mr-5 text-justify">
        Debes seleccionar un archivo de texto que cumpla con el formato de texto <strong> "T;N;X,Y"</strong>.
        <br><br>
        <strong>"T"</strong> puede ser <strong>"P"</strong>  o  <strong>"C"</strong>  para indicar si es
        un punto de venta o un centro de distribución respectivamente.
        <br><br>
        <strong>"N"</strong> es un identificador numérico entero de cada ubicación.
        <br><br>
        <strong>"X"</strong> e <strong>"Y"</strong> son las coordenadas X e Y donde está ubicado el centro, ingresada
        con valores enteros separados por <strong>","</strong>
      </p>
    </div>
    <div class="col-md-6 col-sm-12">
      <h1></h1>
      <div class="mt-5 mr-5">
        <div class="custom-file ml-2 mr-2 ">
          <input type="file" class="custom-file-input" id="archivo" required>
          <label class="custom-file-label" for="validatedCustomFile">Agregar archivo de texto...</label>
          <div class="invalid-feedback">Archivo invalido</div>
        </div>
        <div class="form-group shadow-textarea ml-2 ">
          <label for="exampleFormControlTextarea6"></label>
          <textarea class="form-control z-depth-1" id="editor" rows="3" ></textarea>
        </div>
      </div>
      <a href="Hoja de ruta.html" class="btn btn-success ml-2" role="button" aria-disabled="true">Agregar</a>
    </div>
  </div>
</div>

<?php include('../static/footer.php'); ?>