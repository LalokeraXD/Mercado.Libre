<?php
include('includes/utilerias.php');
if (empty($_POST)) {
    header('refresh:0, url=index.php');    
    return;
}
$conexion = conectar();
if (!$conexion) {
    redireccionar('Error en la conexión.', 'index.php');
    return;
}

$idProducto = validar($_POST['producto']);
$idUsuario = validar($_POST['usuario']);
$numresults = validar($_POST['num']);
$sql = "DELETE FROM carrito WHERE idProducto = $idProducto AND idUsuario = $idUsuario";    
 
$resultado = mysqli_query($conexion, $sql);
mysqli_close($conexion);

if($numresults>1){
    header('refresh:0, url=carrito.php');
}else{
    header('refresh:0, url=index.php');
}

?>