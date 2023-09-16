<?php

include('includes/utilerias.php');


// falta que hagarre el usuario de manera dinamica

$usuario = $_POST['usuario'];
$numTarjeta = $_POST['numero-tarjeta'];
$mes = $_POST['mes'];
$year = $_POST['year'];
$cvv = $_POST['seguridad'];

$tarjetaSinEspacios = preg_replace('/\s+/', '', $numTarjeta);

$conexion = conectar();

$sql = "UPDATE usuarios SET tarjetaUsuario = '$tarjetaSinEspacios' WHERE idUsuario = '$usuario'";

$resultado = mysqli_query($conexion, $sql);


$sql = "DELETE FROM carrito WHERE idUsuario = $usuario";

$resultado = mysqli_query($conexion, $sql);
mysqli_close($conexion);

if ($resultado) {
    redireccionar('Procesando compra.', 'carrito.php');
} else {
    redireccionar('Error: ' . mysqli_error($conexion), 'agregar-tarjeta.php');
}

mysqli_close($conexion);

?>