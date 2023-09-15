<?php
include('includes/encabezado.php');
include('includes/utilerias.php');

$usuario = 0;
if (isset($_SESSION['idUsuario'])) {
    # code...
}
?>

<div class="contenedor-domicilio">
    <h1 class="titulo">Ingresar Tarjeta de Debito o Credito</h1>
    <div class="domicilio-ventana">
		<form action="tarjeta-manejo.php" method="post">
        <div class="encabezado-detalle">
            <input type="text" value="1" name="usuario" style="display:none;">

            <label for="numero-tarjeta">Numero de tarjeta</label>
			<input type="number" id="numero-tarjeta" name="numero-tarjeta" placeholder="no tarjeta">
            
            
            <label for="numero-tarjeta">Fecha vencimiento</label>
            <div class="vencimiento">
                <select name="mes" id="mes">
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
                <select name="year" id="year">
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

            <label for="seguridad">Codigo seguridad</label>
			<input type="number" id="seguridad" name="seguridad" placeholder="CVV">
			<input type="submit" value = "Agregar tarjeta" class="boton">
        </div> 
	</form>
</div>


<?php

include('includes/pie.php');
?>