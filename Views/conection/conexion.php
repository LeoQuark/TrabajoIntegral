<?php
$link ='mysql:host=localhost:3306;dbname=trabajo_integral';
$usuario='root';
$pass='';
try{

    $pdo= new PDO($link,$usuario,$pass);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>