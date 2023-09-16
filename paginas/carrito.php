<?php
include('includes/encabezado.php');
include('includes/utilerias.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['idUsuario'])) {
    $usuario = $_SESSION['idUsuario'];
} else {
    $usuario = 0;
}
//Botones de aumentar y disminuir
if (!empty($_POST['aumentar']) || !empty($_POST['disminuir'])) {
    //Realizar conexion de base de datos
    $conexion = conectar();
    if (!$conexion) {
        redireccionar('Error en la conexión.', $paginaError);
        return;
    }
    //Si cantidad es numerica y esta en post
    if (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) {

        $cantidad = $_POST['cantidad'];
        //disminuir y aumentar contienen idProducto
        //Ver si idProducto no está vacio y si la cantidad en el carrito no es 0
        if (!empty($_POST['disminuir']) && $cantidad != 0) {
            $idPro = $_POST['disminuir'];
            //disminuir del carrito
            $sql = "UPDATE carrito SET cantidadProductoCarrito = cantidadProductoCarrito - 1 WHERE idProducto = $idPro AND idUsuario = $usuario";
            $resultado = mysqli_query($conexion, $sql);
            //Si al momento de disminuir la cantidad fue 1, entonces será 0, por lo tanto se elimina del carrito
            if ($cantidad == 1) {
                $sql = "DELETE FROM carrito WHERE idProducto = $idPro AND idUsuario = $usuario";
                $resultado = mysqli_query($conexion, $sql);
            }

        } else if (!empty($_POST['aumentar'])) {

            $idPro = $_POST['aumentar'];
            //Ver si hay stock para aumentar productos en el carrito
            if (stock($idPro, $conexion)) {
                $sql = "UPDATE carrito SET cantidadProductoCarrito = cantidadProductoCarrito + 1 WHERE idProducto = $idPro AND idUsuario = $usuario";
                $resultado = mysqli_query($conexion, $sql);
            } else {
                redireccionar("Ya no hay stock disponible para aumentar", "carrito.php");
            }

        }

    } else {
        // Manejar el caso en el que 'cantidad' no está definido o no es numérico
        echo "Error: Cantidad no válida";
    }
    mysqli_close($conexion);
    header("Location: " . $_SERVER['REQUEST_URI']);
}
?>

<div class="contenedor-carrito">
    <h1 class="titulo">Carrito de Compras</h1>
    <div class="carrito-ventana">
        <div class="encabezado-detalle">
            <p class="columna-producto">Producto</p>
            <p class="columna-precio">Precio</p>
        </div>
        <div class="productos">
            <p class="carrito-vacio">No hay ningún producto en el carrito.</p>
            <?php
            $conexion = conectar();

            ver_carrito($usuario, $conexion);

            mysqli_close($conexion);
            ?>

        </div>

        <div class="total">
            <p>Total</p>
            <p class="precio-total">$420.00</p>
        </div>  

        <a href="agregar-domicilio.php"><button class="boton boton-compra">Realizar Compra</button></a>


    </div>
</div>

<?php

function ver_carrito($usuario, $conexion)
{
    $sql = "select * from carrito c inner join productos p on p.idProducto = c.idProducto where idUsuario = $usuario";

    $resultado = mysqli_query($conexion, $sql);
    $numresults = mysqli_num_rows($resultado);
    echo "<div class='renglon'>";
    if (mysqli_num_rows($resultado) > 0) {
        while ($renglon = mysqli_fetch_assoc($resultado)) {
            $idProducto = $renglon['idProducto'];
            $nombreProducto = $renglon['nombreProducto'];
            $precioProducto = $renglon['precioProducto'];
            $imagenProducto = $renglon['imagenProducto'];
            $cantidadProducto = $renglon['cantidadProductoCarrito'];
            $precioProducto = $precioProducto * $cantidadProducto;

            echo "
            <img class='imagen-carrito' src='$imagenProducto'>
                <div class='contenedor-prod-boton'>
                    <p class='postre'>$nombreProducto</p>
                    <form action='remover-carrito.php' method='post'>
                    <input type='hidden' name='producto' value='$idProducto'>
                    <input type='hidden' name='usuario' value='$usuario'>  
                    <input type='hidden' name='num' value='$numresults'>        
                    <button class='boton-quitar'>Eliminar</button>
                    </form>
                </div>
                <p class='precio'>$$precioProducto</p>
                <div class='contenedor-cantidad'>
                    <div class='cantidad'>
                        
                        <form action='' method='post'>
                            <input type='hidden' name='disminuir' value='$idProducto'>
                            <input type='hidden' name='cantidad' value='$cantidadProducto'>
                            <input type='submit' class='disminuir' value='—'>
                        </form>
                        <p class='num-cant' id='editable' contenteditable='false'>$cantidadProducto</p>

                        <form action='' method='post'>
                            <input type='hidden' name='aumentar' value='$idProducto'>
                            <input type='hidden' name='cantidad' value='$cantidadProducto'>
                            <input type='submit' class='aumentar' value='+'>
                        </form>
                    </div>
                </div>
            </div>";

        }
    }
}

include('includes/pie.php');
?>