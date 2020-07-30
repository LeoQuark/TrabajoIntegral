function correcto() {
  alert(`¡ Enhorabuena !\n\nLa patente a sido actualizada correctamente.`);
}
function borrar() {
  var respuesta = confirm("¿Estás seguro que deseas eliminar esta patente?");
  if (respuesta == true) {
    return true;
  } else {
    return false;
  }
}
