<?php
    include('includes/encabezado.php');
?>

<div class="formulario-div2">
    <form action="registro-completo.php" method="post">
        <h3 style="font-size: 1.6rem;">Registrate</h3>
        <p style="font-size: 0.9rem;">Es rápido y fácil.</p>
        
        <div class="row g-3">
            <div class="col">
            <div class="form-floating">
                <input type="email" class="form-control" name="e-mail" id="email" placeholder="name@example.com">
                <label for="floatingInput"style="font-size: 1rem;" >Correo electrónico</label>
            </div>
            </div>
            <div class="col">
            <div class="form-floating">
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre" >
        <label for="floatingInput"style="font-size: 1rem; padding: 0.9rem;" >Nombre</label>
        </div>
             </div>
        </div>
        <p style="font-size: 0.9rem; margin-top: 2rem">Ingresa una contraseña segura</p>
        <div class="form-floating mb-3">
        <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="" >
        <label for="floatingInput"style="font-size: 1rem; padding: 0.7rem;" >Contraseña</label>
        </div>
        <ul>
            <li style="font-size: 0.8rem;">Mínimo 8 caracteres con letras y números.</li>
            <li style="font-size: 0.8rem;">No incluya secuencias tales como 12345.</li>
            <li style="font-size: 0.8rem;">No incluir su nombre o apellidos.</li>
        </ul>
        <div class="form-floating mb-3">
        <input type="password" class="form-control" name="contraseña2" id="contraseña2" placeholder="" >
        <label for="floatingInput"style="font-size: 1rem; padding: 0.7rem;" >Confirma la contraseña</label>
        </div>
        <div class="form-check">
            <input type="checkbox" value="" id="terminos">
            <label class="form-check-label" for="terminos" style="font-size: 0.9rem; margin-bottom: 1rem;">
                Acepto los Términos y condiciones y autorizo el uso de mis datos.
            </label>
        </div>

        <button type="submit" class="boton">Continuar</button>
    </form>
</div>

<script>
    var inputElement = document.getElementById('email');
    window.addEventListener('load', function() {
        inputElement.focus();
    });
</script>


<?php
    include('includes/pie.php');
?>