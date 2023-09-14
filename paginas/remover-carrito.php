<?php
include 'utilerias.php';

if (empty($_POST)) {
    header('refresh:0, url=../index.php');    
    return;
}
$conexion = conectar();
if (!$conexion) {
    redireccionar('Error en la conexión.', 'index.php');
    return;
}

$idProducto = validar($_POST['idProducto']);
$idUsuario = validar($_POST['idUsuario']);
print($idProducto . " : ");
print($idUsuario);
$sql = "";

header('refresh:0, url=../index.php');

?>