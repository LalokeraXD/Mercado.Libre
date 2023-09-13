<?php
include 'includes/utilerias.php';
$conexion = conectar();
if (!$conexion) {
    redireccionar('Error en la conexión.', 'index.php');
    return;
}

$idProducto = validar($_POST['idProducto']);
print($idProducto);
$sql = "";
?>