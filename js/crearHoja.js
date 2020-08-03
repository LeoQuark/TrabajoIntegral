const addTexto = document.querySelector("#enviar");
addTexto.addEventListener("click", () => {
  const texto = document.querySelector("#editor").value;
  if (texto === "" || texto === null || texto === undefined) {
    const showAlert = document.querySelector(".showAlert");
    showAlert.style.display = "block";
    setTimeout(() => {
      showAlert.style.display = "none";
    }, 5000);
  }
  else {
    // FUNCION QUE REPARA LAS LINEAS DEL TXT 
    const separar = (str) => {
      let aux = str.split(" ");
      let aux1 = aux[0];
      let aux2 = aux1.replace(/\n|\r/g, "");
      let total = aux2.split(";");
      return total;
    };
    // textoPlano es un array con cada valor del txt
    var textoPlano = separar(texto);
    // console.log("textoPano: ",textoPlano);
    var listaValores = [], cont = 0, aux = [];
    for (let i = 0; i < textoPlano.length; i++) {
      let coor = [];
      if (cont == 2) {
        coor.push(textoPlano[i].split(","));
        aux.push(textoPlano[i].split(","));
        listaValores.push(aux);
        cont = 0;
        aux = [];
      }
      else {
        aux.push(textoPlano[i]);
        cont++;
      }
    }
    // console.log("listaValores", listaValores);
    const showCoordenadas = document.querySelector('.showCoordenadas'),
      showHojaDeRuta = document.querySelector('.showHojaDeRuta');

    showCoordenadas.style.display = "none";
    showHojaDeRuta.style.display = "block";
    addTexto.disbled = true;
  }

  //DECLARACION DEL OBJETO 
  function Punto(nombre, coordenada) {
    this.nombre = nombre,
      this.coordenada = coordenada
  }

  var Ventas = [], Centros = []
  // FUNCION QUE LLENA LOS ARREGLOS DE VENTAS Y CENTROS CON LOS VALORES OBTENIDOS DEL ARCHIVO
  function llenar(Centros, Ventas, listaValores) {
    for (let i = 0; i < listaValores.length; i++) {
      var aux = new Object()
      aux.nombre = listaValores[i][1]
      aux.coordenada = listaValores[i][2]
      if (listaValores[i][0] === "C") { //CENTROS
        Centros.push(aux);
      }
      if (listaValores[i][0] === "P") { //PUNTOS DE VENTA
        Ventas.push(aux);
      }
    }
    // console.log(Centros, Ventas)
  }
  llenar(Centros, Ventas, listaValores)

  // FUNCION QUE RETORNA LA HIPOTENUSA DE LAS COORDENADAS
  function Hipotenusas(CoordenadaInicial, Ventas) {
    var hip = [], x, y, suma, h
    //console.log(Ventas[0].coordenada)
    for (let i = 0; i < Ventas.length; i++) {
      x = CoordenadaInicial[0] - Ventas[i].coordenada[0]
      y = CoordenadaInicial[1] - Ventas[i].coordenada[1]
      x = Math.abs(x), y = Math.abs(y)
      suma = Math.pow(x, 2) + Math.pow(y, 2)
      h = Math.sqrt(suma)
      h = h.toFixed(5)
      hip.push(h)
    }
    return hip;
  }

  // FUNCION QUE RETORNA LA HIPOTENUSA MENOR
  function Menor(hipotenusas) {
    var indice = 0, aux = hipotenusas[0]
    for (let i = 0; i < hipotenusas.length; i++) {
      var n = parseInt(aux, 10), m = parseInt(hipotenusas[i], 10);
      if (n >= m) {
        aux = hipotenusas[i]
        indice = i
      }
    }
    //console.log(aux,indice)
    var menor_hip = new Object()
    menor_hip.indice = indice
    menor_hip.hip = aux
    return menor_hip;
  }

  console.log("Centros:", Centros, "\nP.Ventas:", Ventas);

  // FUNCION QUE RETORNA UN ARREGLO DE OBJETOS CON LA RUTA MAS CORTA 
  function Ruta(Ventas, Centros) {
    var ruta = []
    var ventas_aux = Centros.coordenada
    var lista_ventas = JSON.parse(JSON.stringify(Ventas))
    for (let i = 0; i < Ventas.length; i++) {
      var hip = Hipotenusas(ventas_aux, lista_ventas)
      var menor = Menor(hip)
      ruta.push(lista_ventas[menor.indice])
      ventas_aux = lista_ventas[menor.indice].coordenada
      lista_ventas.splice(menor.indice, 1)
    }
    return ruta;
  }
  Ruta(Ventas, Centros[0]);


  // EVENTO PARA CREAR EL ACCORDION JUNTO CON EL FORMULARIO
  const cantidadCamiones = document.querySelector('#cantidadCamiones');
  const btnCamiones = document.querySelector('#btnCamiones');
  btnCamiones.addEventListener('click', function dibujarAccordion(e) {
    e.preventDefault();
    var cantCam = parseInt(cantidadCamiones.value);
    if (cantCam <= 0 || !/^[0-9]+$/.test(cantidadCamiones.value)) {
      alert(`¡ Error !\nLa cantidad de camiones debe ser un numero entero.`);
    }
    else {
      const accordionCamiones = document.querySelector('#accordionCamiones');
      btnCamiones.disabled = true;
      // AGREGO UN TEMPLATE LITERAL CON EL HTML DEL CARD DEL ACCORDION
      var total_acordeon = "";
      for (let i = 1; i <= cantidadCamiones.value; i++) {
        var accordion = `
      <div class="card">
        <div class="card-header bg-light" id="accordion-${i}">
          <h2 class="mb-0">
            <button class="btn btn-block text-center" type="button" data-toggle="collapse" data-target="#collapse-${i}" aria-expanded="true" aria-controls="collapse-${i}">
              <p class="font-weight-bold font-size pt-2">Camion n°${i}</p>
            </button>
          </h2>
        </div>
        <div id="collapse-${i}" class="collapse" aria-labelledby="accordion-${i}" data-parent="#accordionCamiones">
          <div class="card-body">
            <div class="col-12">
              <div class="row d-flex justify-content-center">
                <div class="col-5">
                  <label for="">Seleccione un centro de distribución</label>
                  <select name="" class="custom-select" id="centroDistribucion-${i}">
                  
                  </select >
                </div >
                <div class="col-5">
                  <label for="">Cantidad de puntos de ventas a repartir</label>
                  <input type="number" class="form-control px-3" id="cantidadPV-${i}" min="1" max="1000" placeholder="1">
                </div>
              </div>
              <div class="row d-flex justify-content-center my-3">
                <button type="button" class="btn btn-success" id="agregarPV-${i}">Agregar</button>
              </div>
              <hr>
              <div id="divPuntosVenta-${i}">
              </div>
              <div class="row d-flex justify-content-center my-3" id="divBotonHR-${i}">
              </div>
              <hr>
              <div class="row d-flex justify-content-center my-3" id="divHojaDeRuta-${i}">
              </div>
            </div>
          </div >
        </div >
      </div >`;
        total_acordeon = total_acordeon + accordion;
      }
      accordionCamiones.innerHTML = total_acordeon;

      //AGREGAR OPTION AL SELECT DE CENTRO
      var total_op = "";
      for (let i = 1; i <= cantidadCamiones.value; i++) {
        const centroDistribucion = document.querySelector(`#centroDistribucion-${i}`);
        for (let j = 0; j < Centros.length; j++) {
          var op = `<option value="${Centros[j].nombre}">Centro ${Centros[j].nombre}</option>`;
          total_op = total_op + op;
        }
        centroDistribucion.innerHTML = total_op;
        total_op = "";
      }

      // CODIGO CUANDO SE PRESIONA AGREGAR (CENTROS Y CANT DE PUNTOS DE VENTAS)
      for (let i = 1; i <= cantidadCamiones.value; i++) {
        const btnCantidadPV = document.querySelector(`#agregarPV-${i}`),
          cantidadPV = document.querySelector(`#cantidadPV-${i}`);
        if (cantidadPV.value != " " || cantidadPV.value != null || cantidadPV.value != 0) {
          btnCantidadPV.addEventListener('click', () => {
            // console.log(cantidadPV.value);
            const divPuntosVenta = document.querySelector(`#divPuntosVenta-${i}`),
              divBotonHR = document.querySelector(`#divBotonHR-${i}`);
            var total_form = "";
            for (let j = 1; j <= cantidadPV.value; j++) {
              var form = `
              <div class="col-12" >
                <div class="row d-flex justify-content-center">
                  <div class="col-lg-4 col-sm-12">
                    <label for="">Punto de Venta n°${j}</label>
                    <select name="" id="puntosDeVenta-${i}-${j}" class="custom-select custom-select-sm">
                      
                    </select>
                  </div >
                  <div class="col-lg-4 col-sm-12">
                    <label for="">Ingrese la cantidad de productos</label>
                    <input type="number" class="form-control form-control-sm" id="cantidadProducto-${i}-${j}" min="1" max="1000" value="1">
                  </div>
                </div>
              </div > `;
              total_form = total_form + form;
              divPuntosVenta.innerHTML = total_form;
            }
            var btn = `<button type="button" class="btn btn-success w-auto" id="btnObtenerHojaRuta-${i}"> Obtener hoja de ruta</button> `;
            divBotonHR.innerHTML = btn;

            // RELLENA LOS OPTION DEL SELECT DE LOS PUNTOS DE VENTAS
            var total_op2 = "";
            for (let a = 1; a <= cantidadPV.value; a++) {
              const cantidadProducto = document.querySelector(`#puntosDeVenta-${i}-${a}`);
              for (let b = 0; b < Ventas.length; b++) {
                var op2 = `<option value="${Ventas[b].nombre}">P. Venta ${Ventas[b].nombre}</option>`;
                total_op2 = total_op2 + op2;
              }
              cantidadProducto.innerHTML = total_op2;
              total_op2 = "";
            }

            var arrayVentas = [], arrayProductos = [];
            // EVENTO PARA OBTENER LA HOJA DE RUTA 
            const btnHojaRuta = document.querySelector(`#btnObtenerHojaRuta-${i}`);
            btnHojaRuta.addEventListener('click', () => {
              const centroDistribucion = document.querySelector(`#centroDistribucion-${i}`);
              // console.log(centroDistribucion.value);
              var totalProductos = 0;
              for (let b = 1; b <= cantidadPV.value; b++) {
                const cantidadProducto = document.querySelector(`#cantidadProducto-${i}-${b}`);
                totalProductos = totalProductos + parseInt(cantidadProducto.value);
              }
              if (totalProductos > 1000) {
                alert(`¡ Error !\nUn camion solo puede llevar 1.000 productos por dia.`);
              }
              else {
                console.log("Productos totales:", totalProductos);
                for (let b = 1; b <= cantidadPV.value; b++) {
                  const puntosDeVenta = document.querySelector(`#puntosDeVenta-${i}-${b}`),
                    cantidadProducto = document.querySelector(`#cantidadProducto-${i}-${b}`);
                  totalProductos = totalProductos + parseInt(cantidadProducto.value);
                  arrayVentas.push(puntosDeVenta.value);
                  arrayProductos.push(cantidadProducto.value);
                }
                function objeto(Ventas, arrayVentas) {
                  var objVentas = []
                  for (let i = 0; i < arrayVentas.length; i++) {
                    for (let j = 0; j < Ventas.length; j++) {
                      if (arrayVentas[i] == Ventas[j].nombre) {
                        var aux = new Punto(Ventas[j].nombre, Ventas[j].coordenada)
                        objVentas.push(aux)
                      }
                    }
                  }
                  return objVentas;
                }

                function objd(Centros, NombreCentro) {
                  var objCentro = []
                  for (let i = 0; i < Centros.length; i++) {
                    if (Centros[i].nombre == NombreCentro) {
                      var aux = new Punto(Centros[i].nombre, Centros[i].coordenada)
                      objCentro.push(aux)
                    }
                  }
                  return objCentro;
                }

                var ventasObj = objeto(Ventas, arrayVentas);
                var centroObj = objd(Centros, centroDistribucion.value);
                var rutaFinal = Ruta(ventasObj, centroObj[0]);
                console.log("DATOS OBTENIDOS PARA EL CAMION", centroDistribucion.value, "\n");
                console.log("P. Ventas:", ventasObj, "\nCentro Distribución: ", centroObj, "\nProductos", arrayProductos, "\nRuta del camion", rutaFinal);
                const divHojaDeRuta = document.querySelector(`#divHojaDeRuta-${i}`);
                var textoHR = `
                  <div class="col-12 pt-2">
                    <h4 class="text-center text-uppercase font-weight-bold my-2">hoja de ruta</h4>
                    <hr>
                    <p>El orden que debe seguir el camion es:</p>
                    <br>
                    <div class="row d-flex justify-content-center">
                      <div>
                        <table class="table table-borderless table-hover text-center">
                          <thead class="thead-dark">
                              <th scope="col">#</th>
                              <th scope="col">ID</th>
                              <th scope="col">Coordenadas (X,Y)</th>
                          </thead>
                          <tbody id="orden-${i}">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>`;
                divHojaDeRuta.innerHTML = textoHR;

                // MUESTRO LOS DATOS EN LA TABLA HOJA DE RUTA
                const orden = document.querySelector(`#orden-${i}`);
                var total_orden = "";
                for (let h = 0; h < rutaFinal.length; h++) {
                  var ord = `
                  <tr>
                      <th scope="row">${h + 1}</th>
                      <td>${rutaFinal[h].nombre}</td>
                      <td>${rutaFinal[h].coordenada}</td>
                  </tr>`;
                  total_orden = total_orden + ord;
                }
                orden.innerHTML = total_orden;
              }
            })


          });
        }

      }
    }
  });
});


