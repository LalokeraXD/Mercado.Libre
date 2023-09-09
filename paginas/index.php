<?php
    include('includes/encabezado.php');
?>
        
        <!--Sección de inicio-->
        <section class="seccion-inicio" id="inicio">

            <div class="tarjeta-inicio">
                <h1>Repostería <span>DulceVida</span></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, beatae?</p>
                <!--<button class="boton">Ver Postres</button>-->
                <a href="verpostres.php" class="boton">Ver postres</a>
            </div>

            <div class="img-contenedor">

                <script src="../scripts/carrusel.js" defer></script>  

                <div class="carrusel">
                    <img src="../imagenes/pastel.png" alt="">
                    <img src="../imagenes/pastel.png" alt="">
                    <img src="../imagenes/pastel.png" alt="">
                    <img src="../imagenes/pastel.png" alt="">
                    <img src="../imagenes/pastel.png" alt="">
                </div>
                
                <div class="contenedor-nav-img">
                    <ul class="navegador-img">
                        <li class="carrusel-btn">&#8718;</li>
                        <li class="carrusel-btn">&#8718;</li>
                        <li class="carrusel-btn">&#8718;</li>
                        <li class="carrusel-btn">&#8718;</li>
                        <li class="carrusel-btn">&#8718;</li>
                    </ul>
                </div>

            </div>

        </section>
        <!-- Fin sección de inicio-->

        <!-- Sección categorías de postres -->
        <section class="seccion-categorias" id="postres">

            <h1 class="categoria-titulo">¿Qué se te antoja hoy?</h1>

            <div class="contenedor-tarjetas">               

                <!-- Tarjeta pasteles-->
                <div class="categoria-tarjeta">
                    <img src="../imagenes/pastel_chocolate.png" alt="">
                    <h2>Pasteles</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos obcaecati ad sint distinctio.</p>
                    <a href="verpostres.php#pastel" class="boton">Ver Pasteles</a>
                </div>
                <!-- Fin tarjeta pasteles-->

                <!-- Tarjeta Mostachones-->
                <div class="categoria-tarjeta">
                    <img src="../imagenes/pastel_chocolate.png" alt="">
                    <h2>Mostachones</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos obcaecati ad sint distinctio.</p>
                    <a href="verpostres.php#mostachón" class="boton">Ver Mostachones</a>
                </div>
                <!-- Fin tarjeta pasteles-->

                <!-- Tarjeta pays-->
                <div class="categoria-tarjeta">
                    <img src="../imagenes/pastel_chocolate.png" alt="">
                    <h2>Pays</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos obcaecati ad sint distinctio.</p>
                    <a href="verpostres.php#pay" class="boton">Ver Pays</a>
                </div>
                <!-- Fin tarjeta pays-->
            </div>
        </section>
        <!-- Fin sección de categorías de postres -->

        <!-- Sección Dirección y horarios -->
        <section class="seccion-direccion" id="direccion">
            <div class="direccion-tarjeta">
                <div class="imagen-div">
                    <img src="../imagenes/logo2.png" alt="">
                </div>
                
                <div class="direccion-datos">
                    <h3>DIRECCIÓN</h3>
                    <p>Avenida Tecnológico #420</p>
                    <h3>HORARIOS</h3>
                    <p>Lunes a Viernes: 10:00 - 20:00</p>
                    <p>Sábados: 09:00 - 14:00</p>
                </div>
            </div>
        </section>
        <!-- Fin sección Dirección y horarios -->
 
<?php
    include('includes/pie.php');
?>