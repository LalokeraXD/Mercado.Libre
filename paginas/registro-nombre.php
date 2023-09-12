<?php

include('includes/utilerias.php');

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];

    if ($nombre=== 'admin') {
        ?>
        <?php include('includes/encabezado.php'); ?>
        <div class="formulario-div">
            <form action="registroContra.php" method="post">
                <h3 style="font-size: 1.6rem;">Nombre añadido</h3>
                <img style="margin-top: 1rem;" src="../imagenes/id-card.png">
                <?php echo '<p style="font-size: 0.9rem; text-align: center; margin-top: -1.5rem; margin-bottom: 2rem;">' . $nombre . '</p>'; ?>


                <button type="submit" class="boton">Continuar</button>
            </form>
        </div>
        <?php include('includes/pie.php'); ?>
        <?php
       
    } else {
        redireccionar('No se pudo almacenar. Intente de nuevo', 'registroNombre.php');
    }
} else {
    redireccionar('No se pudo almacenar. Intente de nuevo', 'registroNombre.php');
}



?>
