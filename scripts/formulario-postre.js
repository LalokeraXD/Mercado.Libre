
const postre = document.getElementById('postre');
const descripcion = document.getElementById('descripcion');
const precio = document.getElementById('precio');
const imagen = document.getElementById('imagen');

const elementos = [postre, descripcion, precio, imagen];

elementos.forEach((elemento) => {
    elemento.addEventListener('blur', () => {
        if(elemento.value == ''){
            elemento.style.border = "3px solid red";
        } else {
            elemento.style.border = "";
        }
    });
});

