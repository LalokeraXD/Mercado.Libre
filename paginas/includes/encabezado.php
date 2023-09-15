<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Libre</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&family=Pacifico&family=Patua+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/verpostres.css">
    <script src="../scripts/menu.js" defer></script>  
    <script src="../scripts/carrito.js" defer></script>  
</head>
<body>

    <!-- Navegación del la página -->
    <div class="nav-contenedor">
        <nav>
            <div class="logo">
                <img src="../imagenes/mercadolibre.png" alt="">
                
            </div>
            <h2 id="menu-boton">&#9776;</h2>
            <ul id="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php#postres">Productos</a></li>
                
                
                <?php
                    if(isset($_SESSION['usuario'])) {
                        echo '<li><a href="salir.php">Salir</a></li>';
                        echo '<li><a href="agregar.php">Agregar postre</a></li>';
                    } else {
                        echo '<li><a href="entrar.php">Entrar</a></li>';
                        echo '<li><a href="#">Crear cuenta</a></li>';
                    }
                ?>

            </ul>
        </nav>
    </div>
    <!-- Fin navegación -->


    <main>