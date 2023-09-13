<?php
include 'includes/utilerias.php';

if(empty($_POST)){
    redireccionar('Prohibido', 'index.php');
    return;
}

$idProducto = validar($_POST['idProducto']);
$idUsuario = validar($_POST['idUsuario']);

$sql = "INSERT (idUsuario,idProducto) INTO carrito VALUES ($idUsuario,$idProducto)";

if($idUsuario == '' || $idProducto == '') {
    redireccionar('Información no válida.', 'index.php');
    return;
}

$conexion = conectar();
if (!$conexion) {
    redireccionar('Error en la conexión.', 'index.php');
    return;
}

$resultado = mysqli_query($conexion, $sql);

$resultado = mysqli_query($conexion, $sql);

if($resultado) {
    redireccionar('Datos guardados exitosamente.', 'agregar.php');
} else {
    redireccionar('Error: ' . mysql_error($conexion), 'agregar.php');
}

mysqli_close($conexion);
?>