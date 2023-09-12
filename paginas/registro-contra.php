<?php

include('includes/utilerias.php');

if (isset($_POST['contra'])) {
    $contra = $_POST['contra'];

    if ($contra=== 'admin') {
        ?>
        <?php include('includes/encabezado.php'); ?>
        <div class="formulario-div">
            <form action="entrar.php" method="post">
                <h3 style="font-size: 1.6rem;">¡Registro completado!</h3>
                <img style="margin-top: 1rem; margin-bottom: 1rem;" src="../imagenes/finish-line.png">

                <button type="submit" class="boton">Continuar</button>
                
            </form>
        </div>
        <?php include('includes/pie.php'); ?>
        <?php
       
    } else {
        redireccionar('No se pudo almacenar. Intente de nuevo', 'registroContra.php');
    }
} else {
    redireccionar('No se pudo almacenar. Intente de nuevo', 'registroNombre.php');
}



?>
