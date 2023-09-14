<?php
include('includes/encabezado.php');
include('includes/utilerias.php');
?>

<div class="verproductos">

    <?php
    $conexion = conectar();

    ver_productos('Alimentos y bebidas', $conexion);
    ver_productos('Animales y mascotas', $conexion);
    ver_productos('Belleza y Cuidado', $conexion);
    ver_productos('Telefonía', $conexion);
    ver_productos('Videojuegos', $conexion);
    ver_productos('Calzado', $conexion);
    ver_productos('Hogar', $conexion);

    mysqli_close($conexion);
    ?>

</div>

<?php

function ver_productos($categoria, $conexion)
{
    $sql = "select P.* from productos P join categorias C on P.idCategoria = C.idCategoria where C.nombreCategoria = '$categoria'";

    $resultado = mysqli_query($conexion, $sql);

    echo "<h1 class='separador' id='$categoria'>$categoria</h1>";
    echo "<div class='contenedor'>";
    if (mysqli_num_rows($resultado) > 0) {
        while ($renglon = mysqli_fetch_assoc($resultado)) {
            $nombreProducto = $renglon['nombreProducto'];
            $descripcionProducto = $renglon['descripcionProducto'];
            $stock = $renglon['stock'];
            $precioProducto = $renglon['precioProducto'];
            $imagenProducto = $renglon['imagenProducto'];

            $idProducto = $renglon['idProducto'];
            $idUsuario = 1;

            echo "
                <div class='producto-tarjeta'>
                <h1 class='nombreProducto'>$nombreProducto</h1>
                <h2 class='stock'>Existencias: $stock</h2>
                <h2 class='precioProducto'>$$precioProducto</h2>
                <img src='$imagenProducto' alt='' class='imagenProducto'>
                <h2 class='descripcionProducto'>$descripcionProducto</h2>
                <form action='agregar-carrito.php' method='post'>
                    <input type='hidden' value='$idProducto' name='idProducto'>
                    <input type='hidden' value='$idUsuario' name='idUsuario'>
                    <input type='submit' class='boton max' value='Agregar al carrito'>
                </form>
                

                
                </div>";
        }
    }

    echo "</div>";
}

include('includes/pie.php');
?>