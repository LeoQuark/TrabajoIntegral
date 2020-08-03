const addTexto = document.querySelector("#enviar");
addTexto.addEventListener("click", () => {
  const texto = document.querySelector("#editor").value;
  if (texto === "" || texto === null || texto === undefined) {
    console.log("uwu");
  } else {
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
      } else {
        aux.push(textoPlano[i]);
        cont++;
      }
    }
    console.log("listaValores", listaValores);
    const showCoordenadas = document.querySelector('.showCoordenadas'),
      showHojaDeRuta = document.querySelector('.showHojaDeRuta');

    showCoordenadas.style.display = "none";
    showHojaDeRuta.style.display = "block";
    addTexto.disbled = true;
  }

///--------------------------------------------------------------------------------------
  //DECLARACION DEL OBJETO 
function Punto(nombre,coordenada){
  this.nombre = nombre,	
  this.coordenada = coordenada
}
var Ventas = [], Centros = []
function llenar(Centros, Ventas, listaValores){
  for(let i=0;i<listaValores.length;i++){
    var aux = new Object()
    aux.nombre = listaValores[i][1]
    aux.coordenada = listaValores[i][2]
    if(listaValores[i][0] === "C"){ //CENTROS
      Centros.push(aux);
    }
    if(listaValores[i][0] === "P"){ //PUNTOS DE VENTA
      Ventas.push(aux);
    }
  }
  console.log(Centros,Ventas)
}
llenar(Centros,Ventas,listaValores)




function Hipotenusas(CoordenadaInicial, Ventas){
  var hip = [], x ,y, suma, h
  //console.log(Ventas[0].coordenada)
  for(let i=0;i<Ventas.length;i++){
    x = CoordenadaInicial[0] - Ventas[i].coordenada[0]
    y = CoordenadaInicial[1] - Ventas[i].coordenada[1]
    x = Math.abs(x), y =  Math.abs(y)
    suma = Math.pow(x,2) + Math.pow(y,2)
    h = Math.sqrt(suma)
    h= h.toFixed(5)
    hip.push(h)
  }
  return hip;
}
function Menor(hipotenusas){
  var indice = 0, aux = hipotenusas[0]
  for(let i=0;i<hipotenusas.length;i++){
    var n = parseInt(aux, 10), m = parseInt(hipotenusas[i], 10);
    if(n >= m){
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

function Ruta(Ventas, Centros){
  var ruta = []
  var ventas_aux = Centros.coordenada
  var lista_ventas = JSON.parse(JSON.stringify(Ventas))
  for(let i=0;i < Ventas.length;i++){
    var hip = Hipotenusas(ventas_aux,lista_ventas)
    var menor = Menor(hip)
    ruta.push(lista_ventas[menor.indice])
    ventas_aux = lista_ventas[menor.indice].coordenada
    lista_ventas.splice(menor.indice,1)
  }
  console.log(ruta)
}
Ruta(Ventas,Centros[0])


});

