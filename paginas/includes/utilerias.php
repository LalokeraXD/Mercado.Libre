<?php
    function redireccionar($mensaje, $dir) {
        include('includes/encabezado.php');
        echo '<div class="formulario-div" style="color:#002f6d">';
        echo '<h1 style="text-align:center">' . $mensaje .'</h1>';
        echo '<h2 style="text-align:center">Redireccionando<h2>';
        echo '</div>';
        include('includes/pie.php');
        header('refresh:3, url=' . $dir);
    }

    function validar($texto) {
        $texto = trim($texto);
        $texto = stripslashes($texto);
        $texto = htmlspecialchars($texto);
        return $texto;
    }

    function conectar() {
        DEFINE('SERVIDOR', 'localhost');
        DEFINE('USUARIO', 'root');
        DEFINE('PASSWORD', '');
        DEFINE('BD', 'pasteleria');

        $resultado = mysqli_connect(SERVIDOR, USUARIO, PASSWORD, BD);

        return $resultado;
    }

    function subir_imagen($archivo) {
        if(empty($archivo)){
            return null;
        }

        $nombre = $archivo['name'];
        $origen = $archivo['tmp_name'];
        $tama = $archivo['size'];
        $tipo = $archivo['type'];
        $error = $archivo['error'];

        $extensiones = array('jpg', 'jpeg', 'png');

        $nombre_y_ext = explode('.', $nombre);

        $extension = strtolower(end($nombre_y_ext));

        if(!in_array($extension, $extensiones)) {
            echo 'Es un archivo no válido.';
        } else if($error > 0){
            echo 'Hubo un error al cargar la imagen';
            return null;
        } else if($tama > 1000000) {
            echo 'El tamaño de la imagen excede 1MB';
            return null;
        } else {
            $nombre_nuevo = uniqid('', true) . '.' . $extension;
            $destino = "../galeria/" . $nombre_nuevo;
            move_uploaded_file($origen, $destino);

            return $destino;
        }

    }

?>