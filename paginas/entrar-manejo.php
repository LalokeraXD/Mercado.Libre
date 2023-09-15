<?php

    include('includes/utilerias.php');

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $conexion = conectar();

    $sql = "SELECT emailUsuario,nombreUsuario,idUsuario FROM usuarios WHERE emailUsuario='$usuario' AND passwordUsuario='$password'";
    $result = $conexion->query($sql);

    if ($result->num_rows == 1) {
        redireccionar('Bienvenido '.$usuario,'index.php');
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $row['emailUsuario'];
        $_SESSION['nombre'] = $row['nombreUsuario'];
        $_SESSION['idUsuario'] = $row['idUsuario'];
        
    } else {
        redireccionar('Datos Incorrectos','entrar.php');
    }

?>