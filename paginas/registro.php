<?php
include('includes/encabezado.php');
?>
<div class="formulario-div">
    <form action="#" method="post">
        <h2>Entrada</h2>
        <input type="text" placeholder="Nombre">
        <input type="text" placeholder="Apellidos">
        <input type="email" placeholder="Correo">
        <input type="email" placeholder="Confirmar correo">
        <input type="password" placeholder="Contraseña">
        <input type="password" placeholder="Confirmar Contraseña">
        <input type="checkbox">
        <p>Recibir ofertas por correo.</p>
        <input type="checkbox">
        <p>Aceptos los términos del servicio.</p>
        <input type="submit" value="Entrar" class="boton">
        <input type="reset" value="Borrar" class="boton">
    </form>
</div>
<?php
include('includes/pie.php');
?>