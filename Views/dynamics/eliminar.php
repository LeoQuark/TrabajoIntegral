<?php

include_once '../conection/conexion.php';

$id = $_GET['id'];


$sql_eliminar = 'DELETE FROM camion WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($id));

// cerramos la conexion con la bd
$sentencia_eliminar = null;
$pdo = null;

header('location:camion.php');