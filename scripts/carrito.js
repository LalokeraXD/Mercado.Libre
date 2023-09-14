
const carritoBoton = document.querySelector('.carrito-boton');
const carritoFondo = document.querySelector('.carrito-fondo');
//let carritoVisible = false;

// carritoBoton.addEventListener('click', () => {
//     carritoVisible = !carritoVisible;

//     if(carritoVisible){
//         carritoFondo.style.visibility = "visible";
//         actualizarTotal();
//     } else {
//         carritoFondo.style.visibility = "hidden";
//     }
// });
// document.addEventListener('DOMContentLoaded', function () {
//     if (carritoFondo) {
//         carritoFondo.addEventListener('click', (event) => {
//             if (event.target === carritoFondo) {
//                 carritoVisible = false;
//                 carritoFondo.style.visibility = "hidden";
//             }
//             console.log(event.target);
//         });
//     }
// });


function contarRenglones() {
    const productos = document.querySelector('.productos');
    const renglones = productos.querySelectorAll('.renglon');
    
    if (renglones.length === 0) {
        const noProductos = document.querySelector('.carrito-vacio');
        noProductos.style.display = 'block';
    }
}
    
///////////////////BOTONES QUITAR////////////////////////////////

const botonesQuitar = document.getElementsByClassName('boton-quitar');

Array.from(botonesQuitar).forEach(boton => {
    boton.addEventListener('click', removerProducto);
});

function removerProducto(evento) {
    // evento.target.parentElement.remove();
    actualizarTotal();
    contarRenglones();
}

////////////////////ACTUALIZAR TOTAL////////////////////////////////

function actualizarTotal(){
    const precios = document.querySelectorAll('.renglon .precio');
    const total = document.querySelector('.precio-total');
    let sumaTotal = 0;

    Array.from(precios).forEach(precio => {
        sumaTotal += parseFloat(precio.innerHTML.substring(1));
    });

    total.innerHTML = '$' + sumaTotal.toFixed(2);

}

actualizarTotal();
contarRenglones();

/////////////////////////BOTONES AGREGAR POSTRE////////////////////////////
// const botonesAgregar = document.querySelectorAll('.producto-tarjeta .boton');

// Array.from(botonesAgregar).forEach(boton => {
    
//     boton.addEventListener('click', evento => {
//         let nombre = evento.target.parentElement.querySelector('.nombre');
//         let precio = evento.target.parentElement.querySelector('.precio');
    
//         agregarAlCarrito(nombre.innerHTML, precio.innerHTML);
    // boton.addEventListener('click', evento => {
    //     let nombre = evento.target.parentElement.querySelector('.nombre');
    //     let precio = evento.target.parentElement.querySelector('.precio');
    //     let imagen = evento.target.parentElement.querySelector('.imagen').src;
    
    //     agregarAlCarrito(nombre.innerHTML, precio.innerHTML, imagen);
        
//     });
    
// });

// function agregarAlCarrito(nombre, precio){
// function agregarAlCarrito(nombre, precio, imagen){
    
// //     const productos = document.querySelector('.productos');
// //     let renglon = document.createElement('div');

// //     renglon.classList.add('renglon');
// //     renglon.innerHTML = `<p class="postre">${nombre}</p>
// //                          <p class="precio">$${precio}</p>
// //                          <button class="boton-quitar">Quitar</button>`
//     renglon.classList.add('renglon');
//     renglon.innerHTML = `<img class="imagen-carrito" src="${imagen}">
//                          <div class="contenedor-prod-boton">
//                             <p class="postre">${nombre}</p>
//                             <button class="boton-quitar">Eliminar</button>
//                          </div>
//                          <p class="precio">$${precio}</p>
//                          <div class="contenedor-cantidad">
//                             <div class="cantidad">
//                                 <p class="disminuir">—</p>
//                                 <p class="num-cant" id="editable" contenteditable="true">1</p>
//                                 <p class="aumentar">+</p>
//                             </div>
//                          </div>`

//     const boton = renglon.querySelector('.boton-quitar');
//     boton.addEventListener('click', removerProducto);

//     productos.append(renglon);

//     alert('Producto agregado al carrito.');
    
// }

// const numCant = document.getElementById('editable');

// numCant.addEventListener('click', () => {
//     numCant.focus(); // Coloca el foco en el elemento editable al hacer clic
// });

// numCant.addEventListener('input', () => {
//     let newValue = numCant.textContent;
    
//     // Validación para asegurarse de que el valor sea un número entero positivo
//     const parsedValue = parseInt(newValue);
    
//     if (isNaN(parsedValue) || parsedValue <= 0) {
//         newValue = '1'; // Establece el valor en 1 si no es válido
//     }
    
//     numCant.textContent = newValue;
    
// });