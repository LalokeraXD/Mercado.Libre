<?php
    include('includes/encabezado.php');
    include('includes/utilerias.php');
?>

<div class="contenido">
<aside>
    <div class="categorias">
        <h2 class="titulo">CATEGORIAS</h2>
    </div> 
</aside>

<div class="verproductos">

    <?php
        $conexion = conectar();

        ver_productos($conexion);

        $cat = "SELECT nombreCategoria FROM categorias";
        $resultado = mysqli_query($conexion, $cat);
        // Inicializar un arreglo para almacenar los resultados

        // Recorrer el resultado y agregar cada fila al arreglo
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $categorias[] = $fila;
        }

        mysqli_close($conexion);
    ?>        
</div>
</div>



<?php
    function ver_productos($conexion){
        $sql = "select c.nombreCategoria, p.nombreProducto, p.descripcionProducto,
            p.stock, p.precioProducto, p.imagenProducto
        from productos p inner join categorias c on p.idCategoria = c.idCategoria";
        
        $resultado = mysqli_query($conexion, $sql);

        echo "<div class='contenedor'>";
        if(mysqli_num_rows($resultado) > 0){
            while($renglon = mysqli_fetch_assoc($resultado)){
                $nombreProducto = $renglon['nombreProducto'];
                $descripcionProducto = $renglon['descripcionProducto'];
                $stock = $renglon['stock'];
                $precioProducto = $renglon['precioProducto'];
                $categoriaProducto = $renglon['nombreCategoria'];
                $imagen = $renglon['imagenProducto'];

                echo "
                    <div class='producto-tarjeta'>
                    <h1 class='nombreProducto'>$nombreProducto</h1>
                    <h2 class='stock'>Existencias: $stock</h2>
                    <h2 class='precioProducto'>$$precioProducto</h2>
                    <img src='$imagen' alt='' class='imagen'>
                    <h2 class='descripcionProducto'>$descripcionProducto</h2>
                    <h2 class='categoriaProducto'>$categoriaProducto</h2>
                    <button class='boton max'>Agregar al Carrito</button>
                    </div>";
            }
        }
            echo "</div>";
            
    }
?>


<script>
    const categorias = <?php echo json_encode($categorias); ?>;
    const categoriasDiv = document.querySelector('.categorias');
    const verproductosDiv = document.querySelector('.verproductos');
    

    categorias.forEach(categoria => {
        const categoriaDiv = document.createElement('div');
        categoriaDiv.classList.add('categoria');
        categoriaDiv.innerHTML = 
        `<input type="checkbox" class="checkbox" checked checked data-nombre="${categoria.nombreCategoria}">${categoria.nombreCategoria}`
        categoriasDiv.appendChild(categoriaDiv);
    });

    const checkboxes = document.querySelectorAll('.checkbox');
    let checked = categorias.map(categoria => categoria.nombreCategoria);
    console.log(checked);
    // Función para manejar el cambio de estado de los checkboxes
    function handleCheckboxChange() {
        checked = [];
        noChecked = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                checked.push(checkbox.getAttribute('data-nombre'));
            }
        });
        mostrarCategorias(checked);
    }

    // Agregar un evento de cambio a cada checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', handleCheckboxChange);
    });

    const productotarjeta = document.querySelectorAll('.producto-tarjeta');
    
    function mostrarCategorias (checked){
        productotarjeta.forEach(element => {
            const cp = element.querySelector(".categoriaProducto");
            let mostrar = false; 
            for (let i = 0; i < checked.length; i++) {
                if (cp.textContent == checked[i]) {
                    mostrar = true; 
                    break; 
                }
            }

            if (mostrar) {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        });
    }

</script>

<?php
    include('includes/pie.php');
?>
