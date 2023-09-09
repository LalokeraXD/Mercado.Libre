<?php
    include('includes/encabezado.php');
?>

<script src="../scripts/formulario-postre.js" defer></script>

<div class="formulario-div">
    <form action="agregar-manejo.php" method="post" enctype="multipart/form-data">
        
        <h3>Nuevo Postre</h3>

        <label for="postre">Postre</label>
        <input type="text" id="postre" name="postre" required>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="3" required></textarea>

        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo">
            <option value="Pastel">Pastel</option>
            <option value="Mostachón">Mostachón</option>
            <option value="Pay">Pay</option>
        </select>

        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" step=".01" required>

        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="imagen">

        <input type="submit" value="Guardar" name="guardar" class="boton">

    </form>
</div>




<?php
    include('includes/pie.php');
?>