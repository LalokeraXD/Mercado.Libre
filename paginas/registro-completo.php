<?php

include('includes/utilerias.php');

$conexion = conectar();

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $email = $_POST['e-mail'];
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $contraseña2 = $_POST['contraseña2'];

    // Verifica que las contraseñas sean iguales
    if ($contraseña !== $contraseña2) {
        die("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
    }

    // Verifica que la contraseña cumpla con los requisitos
    if (strlen($contraseña) < 8) {
        die("La contraseña debe tener al menos 8 caracteres.");
    }

    if (preg_match('/12345/', $contraseña)) {
        die("La contraseña no debe contener la secuencia '12345'.");
    }

    // Verifica que la contraseña no contenga el nombre o apellidos
    if (stripos($contraseña, $nombre) !== false) {
        die("La contraseña no debe contener tu nombre.");
    }

    // Verifica si el correo electrónico ya existe en la base de datos
    $consulta_existencia = "SELECT COUNT(*) as total FROM usuarios WHERE emailUsuario = ?";
    $stmt_existencia = $conexion->prepare($consulta_existencia);
    $stmt_existencia->bind_param("s", $email);
    $stmt_existencia->execute();
    $resultado_existencia = $stmt_existencia->get_result();
    $fila_existencia = $resultado_existencia->fetch_assoc();

    if ($fila_existencia['total'] > 0) {
        die("El correo electrónico ya está registrado. Por favor, utiliza otro correo.");
    }

    // Si todo está bien, procede con la inserción en la base de datos
    $sql = "INSERT INTO usuarios (nombreUsuario, passwordUsuario, emailUsuario, direccionUsuario) VALUES (?, ?, ?, 'NULL')";
    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    // Vincula los parámetros y ejecuta la consulta
    $stmt->bind_param("sss", $nombre, $contraseña, $email);

    if (!$stmt->execute()) {
        die("Error en la ejecución de la consulta: " . $stmt->error);
    }


    $conexion->close();

    redireccionar("Registro exitoso","entrar.php");
}

?>
