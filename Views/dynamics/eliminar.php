<?php

include_once '../conection/conexion.php';

$id = $_GET['id'];


$sql_eliminar = 'DELETE FROM camion WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar -> execute(array($id));


header('location:camion.php');
?>