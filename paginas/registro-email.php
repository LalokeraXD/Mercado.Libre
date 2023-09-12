<?php

include('includes/utilerias.php');

if (isset($_POST['e-mail'])) {
    $email = $_POST['e-mail'];

    if ($email=== 'admin') {
        ?>
        <?php include('includes/encabezado.php'); ?>
        <div class="formulario-div">
            <form action="registroNombre.php" method="post">
                <h3 style="font-size: 1.6rem;">E-mail agregado</h3>
                <img src="../imagenes/message.png">
                <?php echo '<p style="font-size: 0.9rem; text-align: center; margin-top: -1.5rem; margin-bottom: 2rem;">' . $email . '</p>'; ?>


                <button type="submit" class="boton">Continuar</button>
            </form>
        </div>
        <?php include('includes/pie.php'); ?>
        <?php
       
    } else {
        redireccionar('No se pudo almacenar. Intente de nuevo', 'registro.php');
    }
} else {
    redireccionar('No se pudo almacenar. Intente de nuevo', 'registro.php');
}



?>
