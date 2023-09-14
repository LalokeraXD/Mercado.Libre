<?php
include 'includes/utilerias.php';

if(empty($_POST)){
    redireccionar('Prohibido', 'index.php');
    return;
}

$paginaError = 'verpostres.php';

$idProducto = validar($_POST['idProducto']);
$idUsuario = validar($_POST['idUsuario']);


if($idUsuario == '' || $idProducto == '') {
    redireccionar('Información no válida.', $paginaError);
    return;
}

$conexion = conectar();
if (!$conexion) {
    redireccionar('Error en la conexión.', $paginaError);
    return;
}
$sql = "INSERT INTO carrito(idUsuario,idProducto,cantidadProductoCarrito) VALUES ($idUsuario,$idProducto,1)";

$resultado = mysqli_query($conexion, $sql);

if($resultado) {
    redireccionar('Agregado al carrito!', 'carrito.php');
} else {
    redireccionar('Error: ' . mysqli_error($conexion), $paginaError);
}

mysqli_close($conexion);
?>