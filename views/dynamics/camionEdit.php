<?php


$id = $_GET['id'];

$patente = $_GET['PATENTE'];


include_once '../conection/conexion.php';

$sql_editar = 'UPDATE camion SET PATENTE=? WHERE id=? ';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($patente, $id));

// cerramos la conexion con la bd
$sentencia_editar = null;
$pdo = null;

header('location:camion.php');