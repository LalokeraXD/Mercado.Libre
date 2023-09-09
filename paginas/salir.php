
<?php
    include('includes/utilerias.php');

    session_start();

    if(isset($_SESSION['usuario'])){
        session_unset();
        session_destroy();    
        redireccionar('Sesión cerrada', 'index.php');
    } else {
        redireccionar('No has iniciado sesión', 'entrar.php');
    }
?>