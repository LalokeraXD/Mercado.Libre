<?php
    include('includes/encabezado.php');
?>

<div class="formulario-div">
    <form action="registro-email.php" method="post">
        <h3 style="font-size: 1.6rem;">Ingresa tu e-mail</h3>
        
        <input type="text" name="e-mail" id="email">
        <div class="form-check">
       
            <input class="form-check-input" type="checkbox" value="" id="terminos">
            <label class="form-check-label" for="terminos" style="font-size: 0.9rem;">
                Acepto los Términos y condiciones y autorizo el uso de mis datos.
            </label>
        </div>

        <button type="submit" class="boton">Continuar</button>
    </form>
</div>

<script>
    var inputElement = document.getElementById('email');
    window.addEventListener('load', function() {
        inputElement.focus();
    });
</script>


<?php
    include('includes/pie.php');
?>