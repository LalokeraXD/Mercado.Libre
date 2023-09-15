<?php

    include('includes/utilerias.php');

	// falta que hagarre el usuario de manera dinamica

    $usuario = $_POST['usuario'];
    $numTarjeta = $_POST['numero-tarjeta'];
    $mes = $_POST['mes'];
    $year = $_POST['year'];
    $cvv = $_POST['seguridad'];

	$conexion = conectar();

    $sql = "UPDATE usuarios SET tarjetaUsuario = '$numTarjeta' WHERE idUsuario = '$usuario'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado) {
        redireccionar('Datos guardados exitosamente.', 'verpostres.php');
    } else {
        redireccionar('Error: ' . mysql_error($conexion), 'agregar-tarjeta.php');
    }

    mysqli_close($conexion);

?>