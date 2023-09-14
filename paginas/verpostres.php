<?php
    include('includes/encabezado.php');
    include('includes/utilerias.php');
?>

<div class="verproductos">

<?php
    $conexion = conectar();

    ver_productos($conexion);

    mysqli_close($conexion);
?>
        
</div>

<?php

function ver_productos($conexion){
    $sql = "select * from productos";
    $resultado = mysqli_query($conexion, $sql);

    echo "<div class='contenedor'>";
    if(mysqli_num_rows($resultado) > 0){
        while($renglon = mysqli_fetch_assoc($resultado)){
            $nombreProducto = $renglon['nombreProducto'];
            $descripcionProducto = $renglon['descripcionProducto'];
            $stock = $renglon['stock'];
            $precioProducto = $renglon['precioProducto'];
            $imagen = $renglon['imagen'];

            echo "
                <div class='producto-tarjeta'>
                <h1 class='nombreProducto'>$nombreProducto</h1>
                <h2 class='stock'>Existencias: $stock</h2>
                <h2 class='precioProducto'>$$precioProducto</h2>
                <img src='$imagen' alt='' class='imagen'>
                <h2 class='descripcionProducto'>$descripcionProducto</h2>
                <button class='boton max'>Agregar al Carrito</button>
                </div>";
        }
    }

        echo "</div>";
}

    include('includes/pie.php');
?>
