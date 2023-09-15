<?php
include('includes/encabezado.php');
include('includes/utilerias.php');

$usuario = 0;
if (isset($_SESSION['idUsuario'])) {
    # code...
}
?>

<div class="contenedor-tarjeta">
    <h1 class="titulo">Ingresar Tarjeta de Debito o Credito</h1>
    
    <div class="tarjeta-ventana">
		<form action="tarjeta-manejo.php" method="post">
        <div class="encabezado-detalle">
            <input type="text" value="1" name="usuario" style="display:none;">

            <label for="numero-tarjeta">Numero de tarjeta</label>
			<input type="text" id="numero-tarjeta" name="numero-tarjeta" placeholder="No. tarjeta">
            
            <div class="pago">
                <div class="datos-tarjeta">
                    <label for="numero-tarjeta">Fecha vencimiento</label>
                    <div class="vencimiento">
                        <select name="mes" id="mes" class="opciones">
                            <script>
                                const mes = document.getElementById('mes');
                                for(i=0; i<12; i++){
                                    const option = document.createElement('option');
                                    option.value = i+1;
                                    option.innerText = i+1;
                                    mes.appendChild(option);
                                }
                            </script>
                        </select>
                        <select name="year" id="year" class="opciones">
                            <script>
                                const year = document.getElementById('year');
                                let yearcurrent = 2023;
                                for(i=yearcurrent; i<(yearcurrent+20); i++){
                                    const option = document.createElement('option');
                                    option.value = i;
                                    option.innerText = i;
                                    year.appendChild(option);
                                }
                            </script>
                        </select>
                    </div>
                </div> 
                <div class="imagen-tarjeta">
                    <img src="../galeria/tarjeta.svg" alt="">
                </div>
            </div>
            <label for="seguridad">Codigo seguridad</label>
			<input type="text" id="seguridad" name="seguridad" placeholder="CVV">
			<input type="submit" value = "Agregar tarjeta" class="boton">
            
	    </form>
    </div>
</div>
<script>
    const numeroTarjeta = document.getElementById('numero-tarjeta');
    numeroTarjeta.addEventListener('keyup', (e) => {
        let valorInput = e.target.value;

        numeroTarjeta.value = valorInput
        // Permitir unicamente 16 digitos
        .slice(0,19)
        // Eliminamos espacios en blanco
        .replace(/\s/g, '')
        // Eliminar las letras
        .replace(/\D/g, '')
        // Ponemos espacio cada cuatro numeros
        .replace(/([0-9]{4})/g, '$1 ')
        // Elimina el ultimo espaciado
        .trim();
    });

    const seguridad = document.getElementById('seguridad');
    seguridad.addEventListener('keyup', (e) => {
        let valorInput = e.target.value;

        seguridad.value = valorInput
        // Permitir unicamente 3 digitos
        .slice(0,3)
        // Eliminamos espacios en blanco
        .replace(/\s/g, '')
        // Eliminar las letras
        .replace(/\D/g, '')
        // Ponemos espacio cada cuatro numeros
        .replace(/([0-9]{3})/g, '$1 ')
        // Elimina el ultimo espaciado
        .trim();
    });
</script>

<?php

include('includes/pie.php');
?>