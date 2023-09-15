<?php
    include('includes/utilerias.php');

	// falta que hagarre el usuario de manera dinamica

    $usuario = $_POST['usuario'];
    $domicilio = $_POST['domicilio'];
    $postal = $_POST['postal'];

	$conexion = conectar();

    $sql = "UPDATE usuarios SET direccionUsuario = '$domicilio' WHERE idUsuario = '$usuario'";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado) {
        redireccionar('Datos guardados exitosamente.', 'verpostres.php');
    } else {
        redireccionar('Error: ' . mysql_error($conexion), 'agregar-domicilio.php');
    }

    mysqli_close($conexion);

?>