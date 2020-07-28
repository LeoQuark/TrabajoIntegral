<?php

echo 'CamionEdit.php?id=1&PATENTE';

$id = $_GET['id'];

$PAT = $_GET['PATENTE'];

echo $id;

include_once '../conection/conexion.php';

$sql_editar = 'upadte camion set PATENTE=? WHERE id=? ';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar -> execute(array($PAT,$id));


header('location:Camion.php');