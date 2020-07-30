window.addEventListener("load", inicio, false);

function inicio() {
  document.getElementById("archivo").addEventListener("change", cargar, false);
}

function cargar(ev) {
  var arch = new FileReader();
  arch.addEventListener("load", leer, false);
  arch.readAsText(ev.target.files[0]);
}

function leer(ev) {
  document.getElementById("editor").value = ev.target.result;
}
