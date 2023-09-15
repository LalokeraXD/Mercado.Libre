<?php
include 'includes/utilerias.php';

if (empty($_POST)) {
    redireccionar('Prohibido', 'index.php');
    return;
}

if (isset($_SESSION['idUsuario'])) {
    $idUsuario = $_SESSION['idUsuario'];
} else {
    $idUsuario = 0;
}

$paginaError = 'verpostres.php';

$conexion = conectar();
if (!$conexion) {
    redireccionar('Error en la conexión.', $paginaError);
    return;
}

$idProducto = validar($_POST['idProducto']);
$idUsuario = validar($_POST['idUsuario']);


if ($idUsuario == '' || $idProducto == '') {
    redireccionar('Información no válida.', $paginaError);
    return;
}
//Verificar si ya existe
$sql = "SELECT * FROM carrito WHERE idProducto = $idProducto AND idUsuario = $idUsuario";

$resultado = mysqli_query($conexion, $sql);
//Actualizar cantidad si ya existe en el carrito
if (mysqli_num_rows($resultado) != 0) {

    if (stock($idProducto, $conexion)) {
        //Agregar 1 al carrito del usuario
        $sql = "UPDATE carrito SET cantidadProductoCarrito = cantidadProductoCarrito + 1 WHERE idProducto = $idProducto AND idUsuario = $idUsuario";
        $resultado = mysqli_query($conexion, $sql);
    }

} else { //Insertar nuevo
    if (stock($idProducto, $conexion)) {
        $sql = "INSERT INTO carrito(idUsuario,idProducto,cantidadProductoCarrito) VALUES ($idUsuario,$idProducto,1)";
        $resultado = mysqli_query($conexion, $sql);
    }


    mysqli_close($conexion);


}

if ($resultado) {
    redireccionar('Agregado al carrito!', 'carrito.php');
} else {
    redireccionar('Error: ' . mysqli_error($conexion), $paginaError);
}


?>