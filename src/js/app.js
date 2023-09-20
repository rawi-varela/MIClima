//Variables


document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
    eventListeners();
});

function iniciarApp() {
    //Funciones de JS que cargan por defecto creo
    // ejemplo();
    // mostrar_ocultar();
}

// function ejemplo() {
// }

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    
    navegacion.classList.toggle('mostrar'); 

}

//Función para mostrar alertas en HTML
function mostrarAlerta(mensaje, tipo, elemento, desaparece = true) {

    // Previene que se generen más de 1 alerta
    const alertaPrevia = document.querySelector('.alerta');
    if(alertaPrevia) {
        alertaPrevia.remove();
    }

    // Scripting para crear la alerta
    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');
    alerta.classList.add(tipo);

    const referencia = document.querySelector(elemento);
    referencia.appendChild(alerta);

    if(desaparece) {
        // Eliminar la alerta
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
}
// La function de alerta se usa así;
// mostrarAlerta('Fines de semana no permitidos', 'error', '.formulario');


// // JS del login
// var botones = ['caja', 'caja2', 'caja3'];

// function ocultarTodos() {
//     for (var i = 0; i < botones.length; i++) {
//       document.getElementById(botones[i]).style.display = 'none';
//     }
// }

//   function mostrar_ocultar(id) {
//     ocultarTodos();
//     document.getElementById(id).style.display = 'block';
// }
