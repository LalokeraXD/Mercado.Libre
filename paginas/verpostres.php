<?php
include('includes/encabezado.php');
include('includes/utilerias.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<div class="contenido">

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
        ver_productos('Muebles', $conexion);

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

                if (isset($_SESSION['idUsuario'])) {
                    $idUsuario = $_SESSION['idUsuario'];
                } else {
                    $idUsuario = 0;
                }
                echo "
                <div class='producto-tarjeta'>
                <h1 class='nombreProducto'>$nombreProducto</h1>
                <h2 class='stock'>Existencias: $stock</h2>
                <h2 class='precioProducto'>$$precioProducto</h2>
                <img src='$imagenProducto' alt='' class='imagenProducto'>
                <h2 class='descripcionProducto'>$descripcionProducto</h2>";
                if (isset($_SESSION['idUsuario'])) {
                    echo "
                <form action='agregar-carrito.php' method='post'>
                    <input type='hidden' value='$idProducto' name='idProducto'>
                    <input type='hidden' value='$idUsuario' name='idUsuario'>";

                    if (!stock($idProducto, $conexion))
                        echo "<input type='submit' class='boton max' value='No hay existencias' disabled>";
                    else
                        echo "<input type='submit' class='boton max' value='Agregar al carrito'>";
                    echo "
                </form>";
                } else {
                    echo "<a href='entrar.php' class='boton max'>Agregar al carrito</a>";
                }




                echo "</div>";
            }
        }

        echo "</div>";
    }

    include('includes/pie.php');
    ?>