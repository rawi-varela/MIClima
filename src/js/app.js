document.addEventListener('DOMContentLoaded', function() {
  iniciarApp();
});

function iniciarApp() {

  // IFFIE para la vista de Resultados
  (function() {
    const periodoInput = document.querySelector('#selectPeriodo');

    if(periodoInput) {
      cargarResultados();
    }
  })();


  // IFFIE para la vista de encuesta
  (function() {
    const departamentosInput = document.querySelector('#departamento');

    if(departamentosInput) {
      cargarDepartamentos();
    }
  })();
  
}

async function cargarResultados() {
  const selectPeriodo = document.getElementById('selectPeriodo');
  const selectDepartamento = document.getElementById('selectDepartamento');

  async function actualizarResultados() {
      // Verificar si ambos selects tienen una opción seleccionada
      const periodoSeleccionado = selectPeriodo.value;
      const departamentoSeleccionado = selectDepartamento.value;

      if (periodoSeleccionado && departamentoSeleccionado) {
          try {
              const url = `/resultados/api?periodos_id=${encodeURIComponent(periodoSeleccionado)}&departamentos_id=${encodeURIComponent(departamentoSeleccionado)}`;
              const respuesta = await fetch(url);
              const resultadosFiltrados = await respuesta.json();

              rellenarTabla(resultadosFiltrados);
          } catch (error) {
              console.error('Error al cargar los resultados:', error);
          }
      }
  }

  function rellenarTabla(data) {
    const tbody = document.querySelector('.table__tbody');
    tbody.innerHTML = ''; // Limpiar cuerpo de la tabla

    const preguntas = Array.from(document.querySelectorAll('#preguntas-container span')).map(span => span.dataset.pregunta);
    const resultadosFiltrados = data.resultadosFiltrados;
    const resultadoPrevio = data.resultadoPrevio;

    // Función para determinar la clase en base a la calificación
    function determinarClasePorCalificacion(calificacion) {
        if (calificacion >= 85) {
            return 'calificacion-verde';
        } else if (calificacion >= 80) {
            return 'calificacion-amarillo';
        } else {
            return 'calificacion-rojo';
        }
    }

    preguntas.forEach((pregunta, index) => {
        const fila = document.createElement('tr');
        fila.classList.add('table__tr');

        // Celda para la pregunta
        const celdaPregunta = document.createElement('td');
        celdaPregunta.classList.add('table__td-pregunta');
        celdaPregunta.textContent = pregunta;
        fila.appendChild(celdaPregunta);

        // Celda para el resultado actual
        const celdaResultadoActual = document.createElement('td');
        celdaResultadoActual.classList.add('table__td');
        const resultadoActual = resultadosFiltrados[0] && resultadosFiltrados[0]['cp' + (index + 1)];
        celdaResultadoActual.textContent = resultadoActual ? `${resultadoActual}%` : 'N/A';
        celdaResultadoActual.classList.add(determinarClasePorCalificacion(resultadoActual));
        fila.appendChild(celdaResultadoActual);

        // Celda para la diferencia
        const celdaDiferencia = document.createElement('td');
        celdaDiferencia.classList.add('table__td');
        if (resultadoActual && resultadoPrevio && resultadoPrevio['cp' + (index + 1)]) {
            const diferencia = resultadoActual - resultadoPrevio['cp' + (index + 1)];
            let textoDiferencia;
            let claseColor;

            if (diferencia > 0) {
                textoDiferencia = `+ ${diferencia.toFixed(2)}%`;
                claseColor = 'calificacion-verde';
            } else if (diferencia < 0) {
                textoDiferencia = `${diferencia.toFixed(2)}%`;
                claseColor = 'calificacion-rojo';
            } else {
                textoDiferencia = '0%';
                claseColor = determinarClasePorCalificacion(resultadoActual);
            }

            celdaDiferencia.textContent = textoDiferencia;
            celdaDiferencia.classList.add(claseColor);
        } else {
            celdaDiferencia.textContent = 'N/A';
        }
        fila.appendChild(celdaDiferencia);

        // Celda para el resultado previo
        const celdaResultadoPrevio = document.createElement('td');
        celdaResultadoPrevio.classList.add('table__td');
        const resultadoAnterior = resultadoPrevio && resultadoPrevio['cp' + (index + 1)];
        if (resultadoAnterior) {
            celdaResultadoPrevio.textContent = `${resultadoAnterior}%`;
            celdaResultadoPrevio.classList.add(determinarClasePorCalificacion(resultadoAnterior));
        } else {
            celdaResultadoPrevio.textContent = 'N/A';
        }
        fila.appendChild(celdaResultadoPrevio);

        tbody.appendChild(fila);
    });
}




  selectPeriodo.addEventListener('change', actualizarResultados);
  selectDepartamento.addEventListener('change', actualizarResultados);
}


async function cargarDepartamentos() {
  try {
      const url = "/encuesta/api";
      const response = await fetch(url);
      const data = await response.json();
      const departamentos = data.departamentos; // Acceder a la lista de departamentos

      const propiedadSelect = document.getElementById('propiedad');
      const departamentoSelect = document.getElementById('departamento');

      function llenarDepartamentos() {
          const propiedadSeleccionada = propiedadSelect.value;

          // Limpiar el select de departamentos
          departamentoSelect.innerHTML = '<option value="">-- Seleccione --</option>';

          // Filtrar los departamentos según la propiedad seleccionada
          const departamentosFiltrados = departamentos.filter(departamento => 
              departamento.propiedades_id == propiedadSeleccionada);

          // Llenar el select de departamentos
          departamentosFiltrados.forEach(departamento => {
              const option = document.createElement('option');
              option.value = departamento.id;
              option.textContent = departamento.nombreDepartamento;
              departamentoSelect.appendChild(option);
          });
      }

      // Evento para actualizar departamentos cuando cambia la propiedad
      propiedadSelect.addEventListener('change', llenarDepartamentos);

  } catch (error) {
      console.error('Error al cargar datos:', error);
  }
}



// Función para consultar la API y llenar el select de propiedades
// async function consultarAPI() {
//   try {
//       const urlPropiedades = "http://localhost:3000/encuesta/api/propiedades";
//       const responsePropiedades = await fetch(urlPropiedades);
//       const propiedades = await responsePropiedades.json();
  
//       // Obtener referencias a los elementos select
//       const propiedadSelect = document.getElementById("propiedad");
//       const departamentoSelect = document.getElementById("departamento");
  
//       // Deshabilitar el select de Departamento al cargar la página
//       departamentoSelect.setAttribute("disabled", true);
  
//       // Llenar el select de propiedades
//       propiedades.forEach((propiedad) => {
//           const option = document.createElement("option");
//           option.value = propiedad.id;
//           option.textContent = propiedad.nombrePropiedad;
//           propiedadSelect.appendChild(option);
//       });

//       // Agregar evento para actualizar el select de departamentos al cambiar la propiedad
//       propiedadSelect.addEventListener("change", () => departamentosAPI(propiedadSelect.value));
//   } catch (error) {
//       console.error(error);
//   }
// }





  