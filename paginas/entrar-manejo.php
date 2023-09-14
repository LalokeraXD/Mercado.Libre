<?php

    include('includes/utilerias.php');

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $conexion = conectar();

    $sql = "SELECT nombreUsuario FROM usuarios WHERE nombreUsuario='$usuario' AND passwordUsuario='$password'";
    $result = $conexion->query($sql);

    if ($result->num_rows == 1) {
        redireccionar('Bienvenido '.$usuario,'index.php');
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $row['nombreUsuario'];
        
    } else {
        redireccionar('Datos Incorrectos','entrar.php');
    }

    /*
    if($usuario="dlopez"&& $password=="2711"){
        redireccionar('Bienvenido Daniel','index.php');
        $_SESSION['usuario'] = 'dlopez';
    }else{
        redireccionar('Datos Incorrectos','entrar.php');
    }*/

?>