<?php
include('includes/encabezado.php');
include('includes/utilerias.php');
$usuario = 1;
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

        <button class="boton boton-compra">Realizar Compra</button>

    </div>
</div>

<?php

function ver_carrito($usuario,$conexion)
{
    $sql = "select * from carrito c inner join productos p on p.idProducto = c.idProducto where idUsuario = $usuario";

    $resultado = mysqli_query($conexion, $sql);

    echo "<div class='renglon'>";
    if (mysqli_num_rows($resultado) > 0) {
        while ($renglon = mysqli_fetch_assoc($resultado)) {
            $nombreProducto = $renglon['nombreProducto'];
            $precioProducto = $renglon['precioProducto'];
            $imagenProducto = $renglon['imagenProducto'];
            $cantidadProducto = $renglon['cantidadProductoCarrito'];
            $precioProducto = $precioProducto * $cantidadProducto;

            echo "
            <img class='imagen-carrito' src='$imagenProducto'>
                <div class='contenedor-prod-boton'>
                    <p class='postre'>$nombreProducto</p>
                    <button class='boton-quitar'>Eliminar</button>
                </div>
                <p class='precio'>$$precioProducto</p>
                <div class='contenedor-cantidad'>
                    <div class='cantidad'>
                        <p class='disminuir'>—</p>
                        <p class='num-cant' id='editable' contenteditable='true'>$cantidadProducto</p>
                        <p class='aumentar'>+</p>
                    </div>
                </div>
            </div>";
        }
    }
}

include('includes/pie.php');
?>