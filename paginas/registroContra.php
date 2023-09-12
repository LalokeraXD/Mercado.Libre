<?php
    include('includes/encabezado.php');
?>

<div class="formulario-div">
    <form action="registro-contra.php" method="post">
        <h3 style="font-size: 1.6rem;">Contraseña</h3>
        <p style="font-size: 0.8rem;">Ingresa una contraseña segura</p>
        
        <input type="password" name="contra" id="contra">
        <ul>
            <li style="font-size: 0.8rem;">Mínimo 8 caracteres con letras y números</li>
            <li style="font-size: 0.8rem;">No incluya secuencias tales como 12345</li>
            <li style="font-size: 0.8rem;">No incluir su nombre o apellidos</li>
        </ul>
        <p style="font-size: 1.5rem;  margin-bottom: -1rem;">Confirma la contraseña</p>
        <input type="password" name="contra" id="contra">

        <button type="submit" class="boton">Continuar</button>
    </form>
</div>




<?php
    include('includes/pie.php');
?>