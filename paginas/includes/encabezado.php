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
    <title>Respostería Dulce Vida</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&family=Pacifico&family=Patua+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/verpostres.css">
    <script src="../scripts/menu.js" defer></script>  
    <script src="../scripts/carrito.js" defer></script>  
</head>
<body>

    <img src="../imagenes/cart.png" alt="" class="carrito-boton">
    <div class="carrito-fondo">
        <div class="carrito-ventana">
            <p class="titulo">Carrito de Compras</p>
            <div class="encabezado-detalle">
                <p class="columna-producto">Producto</p>
                <p class="columna-precio">Precio</p>
            </div>

            <div class="productos">
                <div class="renglon">
                    <p class="postre">Pastel de Chocolate</p>
                    <p class="precio">$420.00</p>
                    <button class="boton-quitar">Quitar</button>
                </div>
                <div class="renglon">
                    <p class="postre">Pastel de Fresa</p>
                    <p class="precio">$390.00</p>
                    <button class="boton-quitar">Quitar</button>
                </div>
                <div class="renglon">
                    <p class="postre">Pastel de Vainilla</p>
                    <p class="precio">$320.00</p>
                    <button class="boton-quitar">Quitar</button>
                </div>
            </div>

            <div class="total">
                <p>Total</p>
                <p class="precio-total">$1200.00</p>
            </div>

            <button class="boton boton-compra">Realizar Compra</button>

        </div>
    </div>


    <!-- Navegación del la página -->
    <div class="nav-contenedor">
        <nav>
            <div class="logo">
                <img src="../imagenes/cake.png" alt="">
                <h2>Dulce Vida</h2>
            </div>
            <h2 id="menu-boton">&#9776;</h2>
            <ul id="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php#postres">Postres</a></li>
                <li><a href="index.php#direccion">Dirección</a></li>
                
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