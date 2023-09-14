<?php
include('includes/encabezado.php');
include('includes/utilerias.php');
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
            <div class="renglon">
                <img class="imagen-carrito" src="../imagenes/pastel.png">
                <div class="contenedor-prod-boton">
                    <p class="postre">Pastel</p>
                    <button class="boton-quitar">Eliminar</button>
                </div>
                <p class="precio">$450.00</p>
                <div class="contenedor-cantidad">
                    <div class="cantidad">
                        <p class="disminuir">—</p>
                        <p class="num-cant" id="editable" contenteditable="true">1</p>
                        <p class="aumentar">+</p>
                    </div>
                </div>
            </div>
            <div class="renglon">
                <img class="imagen-carrito" src="../imagenes/pastel_chocolate.png">
                <div class="contenedor-prod-boton">
                    <p class="postre">Pastel de chocolate</p>
                    <button class="boton-quitar">Eliminar</button>
                </div>
                <p class="precio">$300.00</p>
                <div class="contenedor-cantidad">
                    <div class="cantidad">
                        <p class="disminuir">—</p>
                        <p class="num-cant" id="editable" contenteditable="true">1</p>
                        <p class="aumentar">+</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="total">
            <p>Total</p>
            <p class="precio-total">$420.00</p>
        </div>

        <button class="boton boton-compra">Realizar Compra</button>

    </div>
</div>

<?php
include('includes/pie.php');
?>