document.addEventListener('DOMContentLoaded', function() {
  const selectPeriodo = document.getElementById('selectPeriodo');
    const selectDepartamento = document.getElementById('selectDepartamento');

    selectPeriodo.addEventListener('change', cargarResultados);
    selectDepartamento.addEventListener('change', cargarResultados);
  iniciarApp();
});

function iniciarApp() {

  (function() {
    const departamentosInput = document.querySelector('#departamento');

    if(departamentosInput) {
      cargarDepartamentos();
    }
  })();
  
}

function cargarResultados() {
  const periodoSeleccionado = document.getElementById('selectPeriodo').value;
  const departamentoSeleccionado = document.getElementById('selectDepartamento').value;

  if(periodoSeleccionado && departamentoSeleccionado) {
      // Aquí realizas la petición AJAX
      fetch(`/http://localhost:3000/resultados/api?periodo=${periodoSeleccionado}&departamento=${departamentoSeleccionado}`)
          .then(response => response.json())
          .then(data => actualizarTabla(data))
          .catch(error => console.error('Error:', error));
  }
}

function actualizarTabla(data) {
  // Aquí actualizas tu tabla con los nuevos datos
}


async function cargarDepartamentos() {
  try {
      const url = "http://localhost:3000/encuesta/api";
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





  