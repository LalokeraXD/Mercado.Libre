<title>Mercado Libre</title>
<?php
    include('includes/utilerias.php');
    
    session_start();

    if(isset($_SESSION['usuario'])){
        redireccionar('La sesión ya está iniciada.', 'index.php');
        die();
    }
    include('includes/encabezado.php');
?>

<div class="formulario-div">
    <form action="entrar-manejo.php" method="post">
        <h3>Identificate</h3>

        <label for="usuario">Email</label>
        <input type="text" name="usuario" id="usuario" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Iniciar Sesion" class="boton">
    </form>
</div>


<?php
    include('includes/pie.php');
?>