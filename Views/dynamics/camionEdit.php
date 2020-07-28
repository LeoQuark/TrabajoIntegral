<?php


$id = $_GET['id'];

$PAT = $_GET['PATENTE'];


include_once '../conection/conexion.php';

$sql_editar = 'upadte camion set PATENTE=? WHERE id=? ';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar -> execute(array($PAT,$id));


header('location:camion.php');