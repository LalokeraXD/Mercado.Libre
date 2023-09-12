<?php

    include('includes/utilerias.php');

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if($usuario="dlopez"&& $password=="2711"){
        redireccionar('Bienvenido Daniel','index.php');
        $_SESSION['usuario'] = 'dlopez';
    }else{
        redireccionar('Datos Incorrectos','entrar.php');
    }

?>