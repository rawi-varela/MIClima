//Variables


document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
    eventListeners();
});

function iniciarApp() {
    //Funciones de JS que cargan por defecto creo
    // ejemplo();
    // mostrar_ocultar();

    consultarAPI();
    puestosAPI();

    cargarPropiedades();

    propiedadesAPI();
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

async function consultarAPI() {
    try {
        const url = "http://localhost:3000/admin/api";
        const response = await fetch(url);
        const data = await response.json();
    
        // Obtener referencias a los elementos select
        const propiedadSelect = document.getElementById("propiedadSelect");
        const areaSelect = document.getElementById("areaSelect");
        const posicionSelect = document.getElementById("posicionSelect");
    
        // Deshabilitar el select de Área y Posición al cargar la página
        areaSelect.setAttribute("disabled", true);
        posicionSelect.setAttribute("disabled", true);
    
        // Llenar el select de propiedades
        data.propiedades.forEach((propiedad) => {
          const option = document.createElement("option");
          option.value = propiedad.id;
          option.textContent = propiedad.nombrePropiedad;
          propiedadSelect.appendChild(option);
        });
    
        // Función para llenar el select de áreas según la propiedad seleccionada
        function llenarAreas() {
          // Obtener la propiedad seleccionada
          const propiedadSeleccionada = propiedadSelect.value;
    
          // Limpiar el select de áreas
          areaSelect.innerHTML = "<option value=''>-- Seleccione --</option>";
    
          // Filtrar las áreas según la propiedad seleccionada
          const areasFiltradas = data.areas.filter(
            (area) => area.propiedad_id === propiedadSeleccionada
          );
    
          // Llenar el select de áreas con las áreas filtradas
          areasFiltradas.forEach((area) => {
            const option = document.createElement("option");
            option.value = area.id;
            option.textContent = area.nombreArea;
            areaSelect.appendChild(option);
          });
    
          // Habilitar el select de áreas
          areaSelect.removeAttribute("disabled");
          
          // Llamar a la función para llenar el select de posiciones al cambiar la propiedad
          llenarPosiciones();
        }
    
        // Agregar evento para llenar el select de áreas al cambiar la propiedad
        propiedadSelect.addEventListener("change", llenarAreas);
    
        // Función para llenar el select de posiciones según el área seleccionada
        function llenarPosiciones() {
          // Obtener el área seleccionada
          const areaSeleccionada = areaSelect.value;
    
          // Limpiar el select de posiciones
          posicionSelect.innerHTML = "<option value=''>-- Seleccione --</option>";
    
          // Filtrar las posiciones según el área seleccionada
          const posicionesFiltradas = data.posiciones.filter(
            (posicion) => posicion.area_id === areaSeleccionada
          );
    
          // Llenar el select de posiciones con las posiciones filtradas
          posicionesFiltradas.forEach((posicion) => {
            const option = document.createElement("option");
            option.value = posicion.id;
            option.textContent = posicion.nombrePosicion;
            posicionSelect.appendChild(option);
          });
    
          // Habilitar el select de posiciones
          posicionSelect.removeAttribute("disabled");
        }
    
        // Agregar evento para llenar el select de posiciones al cambiar el área
        areaSelect.addEventListener("change", llenarPosiciones);

      } catch (error) {
        console.error(error);
      }   
}

async function puestosAPI() {
    try {
        const url = "http://localhost:3000/admin/api";
        const response = await fetch(url);
        const data = await response.json();
    
        // Obtener referencias a los elementos select
        const propiedadSelect = document.getElementById("propiedadSelect");
        const areaSelect = document.getElementById("areaSelect");
    
        // Deshabilitar el select de Área
        areaSelect.setAttribute("disabled", true);
    
        // Llenar el select de propiedades
        data.propiedades.forEach((propiedad) => {
          const option = document.createElement("option");
          option.value = propiedad.id;
          option.textContent = propiedad.nombrePropiedad;
          propiedadSelect.appendChild(option);
        });
    
        // Función para llenar el select de áreas según la propiedad seleccionada
        function llenarAreas() {
          // Obtener la propiedad seleccionada
          const propiedadSeleccionada = propiedadSelect.value;
    
          // Limpiar el select de áreas
          areaSelect.innerHTML = "<option value=''>-- Seleccione --</option>";
    
          // Filtrar las áreas según la propiedad seleccionada
          const areasFiltradas = data.areas.filter(
            (area) => area.propiedad_id === propiedadSeleccionada
          );
    
          // Llenar el select de áreas con las áreas filtradas
          areasFiltradas.forEach((area) => {
            const option = document.createElement("option");
            option.value = area.id;
            option.textContent = area.nombreArea;
            areaSelect.appendChild(option);
          });
    
          // Habilitar el select de áreas
          areaSelect.removeAttribute("disabled");
        }
    
        // Agregar evento para llenar el select de áreas al cambiar la propiedad
        propiedadSelect.addEventListener("change", llenarAreas);
    

      } catch (error) {
        console.error(error);
      }   
}


// Para hacer la Galería
async function cargarPropiedades() {
  try {
      // URL de la API
      const url = 'http://localhost:3000/api/propiedades';

      // Ruta base de las imágenes
      const rutaBaseImagenes = 'http://localhost:3000/imagenes/propiedades/';

      // Realizar la solicitud a la API y esperar la respuesta
      const response = await fetch(url);
      const data = await response.json();

      // Elemento HTML donde mostrarás las imágenes
      const gallery = document.getElementById('gallery');

      // Iterar a través de los datos y crear elementos de imagen con enlaces
      data.forEach(propiedad => {
          // Obtener el ID de la propiedad
          const propiedadID = propiedad.id;

          // Crear una ruta dinámica para el enlace
          const enlace = document.createElement('a');
          enlace.href = '/th-administrar-anfitriones'; // Ruta base

          // Agregar un atributo personalizado al enlace para almacenar el ID de la propiedad
          enlace.setAttribute('data-propiedad-id', propiedadID);

          // Crear un div contenedor para cada imagen
          const div = document.createElement('div');
          div.classList.add('propiedad'); // Agrega clases CSS según tus necesidades

          // Crear un elemento de imagen
          const img = document.createElement('img');
          img.alt = propiedad.nombrePropiedad;

          // Establecer la fuente de la imagen utilizando la ruta base y el nombre de la imagen
          img.src = rutaBaseImagenes + propiedad.imagen + '.png';

          // Crear elementos picture para formatos webp y png si es necesario
          const picture = document.createElement('picture');
          const sourceWebp = document.createElement('source');
          sourceWebp.srcset = rutaBaseImagenes + propiedad.imagen + '.webp';
          sourceWebp.type = 'image/webp';
          const sourcePng = document.createElement('source');
          sourcePng.srcset = rutaBaseImagenes + propiedad.imagen + '.png';
          sourcePng.type = 'image/png';

          // Agregar elementos al contenedor
          picture.appendChild(sourceWebp);
          picture.appendChild(sourcePng);
          picture.appendChild(img);
          div.appendChild(picture);

          // Agregar el div al enlace <a>
          enlace.appendChild(div);

          // Agregar el enlace al elemento de la galería
          gallery.appendChild(enlace);
      });
  } catch (error) {
      console.error('Error al cargar las propiedades:', error);
  }
}







