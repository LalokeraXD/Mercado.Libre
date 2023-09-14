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

        <label for="usuario">email</label>
        <input type="text" name="usuario" id="usuario">
        
        <label for="password">passsword</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Iniciar Sesion" class="boton">
    </form>
</div>


<?php
    include('includes/pie.php');
?>