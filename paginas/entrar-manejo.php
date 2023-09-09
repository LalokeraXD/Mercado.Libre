<?php

    include('includes/utilerias.php');

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if ($usuario = 'admin' && $password == "123") {
        redireccionar('Bienvenido Administrador', 'index.php');
        $_SESSION['usuario'] = 'Administrador';
    } else {
        redireccionar('Datos incorrectos', 'entrar.php');
    }

?>