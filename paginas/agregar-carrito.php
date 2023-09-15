<?php
include 'includes/utilerias.php';

if (empty($_POST)) {
    redireccionar('Prohibido', 'index.php');
    return;
}

if (isset($_SESSION['idUsuario'])) {
    $idUsuario = $_SESSION['idUsuario'];
}else {
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
//Actualizar cantidad
if (mysqli_num_rows($resultado) != 0) {
    

    //Consultar el stock existente
    $sql = "SELECT stock FROM productos WHERE idProducto = $idProducto";
    $resultado = mysqli_query($conexion, $sql);
    $resultado = $resultado->fetch_assoc();
    $stock = $resultado['stock'];
    //Verificar que el stock no sea 0
    if ($stock > 0) {
        //Quitar del stock
        $sql = "UPDATE productos SET stock = stock - 1 WHERE idProducto = $idProducto";
        $resultado = mysqli_query($conexion,$sql);
        //Agregar 1 al carrito del usuario
        $sql = "UPDATE carrito SET cantidadProductoCarrito = cantidadProductoCarrito + 1 WHERE idProducto = $idProducto AND idUsuario = $idUsuario";
        $resultado = mysqli_query($conexion, $sql);
    }

    

} else { //Insertar nuevo
    //Consultar el stock existente
    $sql = "SELECT stock FROM productos WHERE idProducto = $idProducto";
    $resultado = mysqli_query($conexion, $sql);
    $resultado = $resultado->fetch_assoc();
    $stock = $resultado['stock'];
    //Verificar que el stock no sea 0
    if ($stock > 0) {
        //Quitar del stock
        $sql = "UPDATE productos SET stock = stock - 1 WHERE idProducto = $idProducto";
        $resultado = mysqli_query($conexion,$sql);
        //Agregar 1 al carrito del usuario
        $sql = "INSERT INTO carrito(idUsuario,idProducto,cantidadProductoCarrito) VALUES ($idUsuario,$idProducto,1)";
        $resultado = mysqli_query($conexion, $sql);
        mysqli_close($conexion);

        
    }
    
}

if ($resultado) {
    redireccionar('Agregado al carrito!', 'carrito.php');
} else {
    redireccionar('Error: ' . mysqli_error($conexion), $paginaError);
}


?>