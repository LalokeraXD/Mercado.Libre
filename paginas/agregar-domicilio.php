<?php
include('includes/encabezado.php');
include('includes/utilerias.php');

$usuario = 0;
if (isset($_SESSION['idUsuario'])) {
    # code...
}
?>

<div class="contenedor-domicilio">
    <h1 class="titulo">Domicilio</h1>
    <div class="domicilio-ventana">
		<form action="domicilio-manejo.php" method="post">
        <div class="encabezado-detalle">
                <input type="text" value="1" name="usuario" style="display:none;">
                <label for="domicilio">Calle y Numero</label>
                <input type="text" id="domicilio" name="domicilio" placeholder="calle, numero">
                <label for="postal">Codigo postal</label>
                <input type="text" id="postal" name="postal" placeholder="codigo postal">
                <div class="paquete">
                    <img src="../galeria/paquete.svg" alt="" class="svg-color">
                </div>
                <input type="submit" value = "Agregar direccion" class="boton">
        </div> 
	</form>
</div>

<script>
    //codigo postal de puro numero y que solo sean 5 digitos
    const postal = document.getElementById('postal');
    postal.addEventListener('keypress', (e) => {
        if(e.key >= 0 && e.key <= 9 && postal.value.length < 5){
            return true;
        } else {
            e.preventDefault();
        }
    });
    
</script>

<?php

include('includes/pie.php');
?>