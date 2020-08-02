const addTexto = document.querySelector("#enviar");
addTexto.addEventListener("click", () => {
  const texto = document.querySelector("#editor").value;
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
});
console.log("listaValores", listaValores);
