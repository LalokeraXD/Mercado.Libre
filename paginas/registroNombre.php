<?php
    include('includes/encabezado.php');
?>

<div class="formulario-div">
    <form action="registro-nombre.php" method="post">
        <h3 style="font-size: 1.6rem;">Ingresa tu nombre</h3>
        <p style="font-size: 0.8rem;  margin-top: -3rem;">Los demás usuarios podrán ver este nombre</p>
        
        <input type="text" name="nombre" id="nombre">

        <button type="submit" class="boton">Continuar</button>
    </form>
</div>

<script>
    var inputElement = document.getElementById('nombre');
    window.addEventListener('load', function() {
        inputElement.focus();
    });
</script>

<?php
    include('includes/pie.php');
?>
