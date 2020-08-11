<?php 
include('../static/header.php');
?>
<br><br>
<div class="container my-5 slider-updown">
  <div class="row bg-white rounded shadow-lg mx-1">
    <div class="col-lg-6 col-sm-12">
      <h3 class="text-center text-uppercase font-weight-bold my-5">Agrega coordenadas</h3>
      <hr>
      <div class="mx-1 px-3">
        <p class="text-justify parrafo">
        Aquí deberás agregar tu hoja de coordenadas, solo selecciona un <span class="badge badge-dark">Archivo de Texto</span> ( <i>.txt</i> ). Este archivo debe cumplir con el siguiente formato específico:<br>
      </p>
      <p class="text-center te"><strong>T;N;X,Y;</strong><br></p>
      <p>donde:</p>
      <table class="table table-borderless table-hover">
        <tr>
          <th scope="row" class="pt-auto">T</th>
          <td>Puede tomar los valores <strong>P</strong> ó <strong>C</strong>, en referencia a un Punto de venta o un Centro de distribución, respectivamente.</td>
        </tr>
        <tr>
          <th scope="row" class="pt-auto">N</th>
          <td>Es un identificador numérico ( <i>entero positivo</i> ).</td>
        </tr>
        <tr>
          <th scope="row" class="pt-auto">X,Y</th>
          <td>Son las coordenadas <i>x e y</i> donde está ubicado el punto "T". Estos valores deben ser valores enteros serparados por <i>"," (coma)</i> .</td>
        </tr>
      </table>
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="my-5">
        <div class="col-12">
          <div class="custom-file ml-2 mr-2 ">
            <input type="file" class="custom-file-input" id="archivo" required>
            <label class="custom-file-label" for="validatedCustomFile">Agregar archivo de texto...</label>
            <div class="invalid-feedback">Archivo invalido</div>
          </div>
          <div class="form-group shadow-textarea ml-2 ">
            <label for="exampleFormControlTextarea6"></label>
            <textarea class="form-control" id="editor" rows="3" ></textarea>
          </div>
          <button type="button" class="btn btn-success my-3 mx-2" id="enviar">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</div>



<?php 
  $valores=explode(",",$_COOKIE["valor"]);
  // $cont = 0;
  // foreach($valores as $valor){
  //   // if($cont === 3){
  //   //   // echo $valor;
  //   //   $cont = 0;
  //   // }
  //   // elseif($cont === 0){
  //   //   $t=$valor;
  //   //   echo $t;
  //   // }
  //   // else{
  //   //   // echo $valor;
  //   //   $cont++;
  //   // }
  //   // echo  $valor;
  // }
  // echo count($valores);

  // $final = count($valores) / 4;
  // $ciclos = 0;
  // // echo $final;
  // $va = 0;
  // for($cont; $cont < count($valores);$cont++){
  //   // echo $valores[$va]." ".$cont." ".$ciclos."<br>";
    
  //   $va++;
  //   if($cont === 3){
      
  //     $cont=-1;
  //     $ciclos++;
  //   }
  //   if($ciclos === $final){
  //     break;
  //   }
  // }
  // echo "<br>"
?>

<?php include('../static/footer.php'); ?>