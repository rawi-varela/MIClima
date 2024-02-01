
  <h1>Evaluación de Desempeño 2024</h1>
  <div class="datos">
    <div class="dato">
      <p class="bold">Nombre:</p>
      <p><?php echo $anfitrion->nombre . " " . $anfitrion->apellidoPat . " " . $anfitrion->apellidoMat ?></p>
    </div>
    <div class="dato">
      <p>Departamento:</p>
      <p><?php echo $anfitrion->area->nombreArea ?></p>
    </div>
    <div class="dato">
      <p>Posición:</p>
      <p><?php echo $anfitrion->posicion->nombrePosicion; ?></p>
    </div>
  </div>

  <p class="alinear-centro bold">Los niveles de calificación de los estándares están diseñados del 1 al 5 siendo de forma ascendente.</p>
  
  <div class="mantener" id="divFijo">
      <p>1 = Deficiente solo lo conoce.</p>
      <p>2 = Inconsistente menor a lo esperado, lo hace con errores.</p>
      <p>3 = Consistente esperado normal, lo hace y lo puede explicar, se autocorrige.</p>
      <p>4 = Supera Frecuentemente lo esperado busca mejorar su desempeño.</p>
      <p>5= Siempre supera el estandar, conoce, explica y genera controles del estándar, es experto.</p>
  </div>

  <script>
    window.addEventListener("scroll", function() {
    var divFijo = document.getElementById("divFijo");

    // Si el desplazamiento vertical es mayor que la posición original del div
    if (window.scrollY > divFijo.offsetTop) {
      divFijo.classList.add("fijo");
    } else {
      divFijo.classList.remove("fijo");
    }
  });
  </script>

<div class="contenedor-global">
  <main class="evaluacion-total">
      <form action="/lider-evaluar" method="POST" class="formulario" id="evaluacionForm">
        <!-- Contenedor para las preguntas -->
        <div id="preguntasContainer"></div>

        <input type="submit" value="Enviar Evaluación">
    </form>

  </main>


  <aside class="registro">
      <h2 class="registro__heading">Resultados</h2>

    <table class="resultado-evaluacion">
    <thead>
      <tr>
        <th>Competencias</th>
        <th>Calificacion</th>
        <th>Esperado</th>
        <th>Desviacion</th>
      </tr>
      <tr class="competencias">
              <th>Compromiso</th>
            <td><?php echo $esperado->compromiso ?? '0' ?></td>
                  <td><?php echo $esperado->esperadoCompromiso ?? '0' ?></td>
                  <td><?php echo $esperado->compromiso ?? '0' ?></td>
      </tr>

      <tr class="competencias">
              <th>Integridad</th>
            <td><?php echo $esperado->funciones_esp_area ?? '0' ?></td>
                  <td><?php echo $esperado->esperadoIntegridad ?? '0' ?></td>
                  <td><?php echo $esperado->compromiso ?? '0' ?></td>
      </tr>

      <tr class="competencias">
              <th>Pasión por lo Extraordinario</th>
            <td><?php echo $esperado->funciones_esp_area ?? '0' ?></td>
                  <td><?php echo $esperado->esperadoPasion ?? '0' ?></td>
                  <td><?php echo $esperado->compromiso ?? '0' ?></td>
      </tr>
              <tr class="competencias">
              <th>Sinergia / Trabajo en Equipo</th>
            <td><?php echo $esperado->funciones_esp_area ?? '0' ?></td>
                  <td><?php echo $esperado->esperadoSinergia ?? '0' ?></td>
                  <td><?php echo $esperado->compromiso ?? '0' ?></td>
      </tr>
              <tr class="competencias">
              <th>Maestria Emocional</th>
            <td><?php echo $esperado->funciones_esp_area ?? '0' ?></td>
                  <td><?php echo $esperado->esperadoMaestria ?? '0' ?></td>
                  <td><?php echo $esperado->compromiso ?? '0' ?></td>
      </tr>
              <tr class="competencias">
              <th>Comunicación Empática</th>
            <td><?php echo $esperado->funciones_esp_area ?? '0' ?></td>
                  <td><?php echo $esperado->esperadoComunicacion ?? '0' ?></td>
                  <td><?php echo $esperado->compromiso ?? '0' ?></td>
      </tr>
              <tr class="competencias">
              <th>Efectividad</th>
            <td><?php echo $esperado->funciones_esp_area ?? '0' ?></td>
                  <td><?php echo $esperado->jefeSupervisor ?? '0' ?></td>
                  <td><?php echo $esperado->compromiso ?? '0' ?></td>
      </tr>
              <tr class="competencias">
              <th>Liderazgo y Desarrollo de los esperadoes</th>
            <td><?php echo $esperado->funciones_esp_area ?? '0' ?></td>
                  <td><?php echo $esperado->gerenteDirector ?? '0' ?></td>
                  <td><?php echo $esperado->compromiso ?? '0' ?></td>
      </tr>
        <tr class="competencias">
        <th>Funciones Específicas del Área</th>
        <td><?php echo $esperado->funciones_esp_area ?? '0' ?></td>
            <td><?php echo $esperado->funcionesEspArea ?? '0' ?></td>
            <td><?php echo $esperado->compromiso ?? '0' ?></td>
      </tr>
    </thead>
    </table>
      
  </aside>
</div>


<script type="text/javascript">

    // Obtener los elementos de radio para cada grupo
  var r1_r4 = document.querySelectorAll('input[name="R1"], input[name="R2"], input[name="R3"], input[name="R4"]');
  var r5_r7 = document.querySelectorAll('input[name="R5"], input[name="R6"], input[name="R7"]');
  var r8_r11 = document.querySelectorAll('input[name="R8"], input[name="R9"], input[name="R10"], input[name="R11"]');
  var r12_r14 = document.querySelectorAll('input[name="R12"], input[name="R13"], input[name="R14"]');
  var r15_r17 = document.querySelectorAll('input[name="R15"], input[name="R16"], input[name="R17"]');
  var r18_r19 = document.querySelectorAll('input[name="R18"], input[name="R19"]');

  var r20_r26 = document.querySelectorAll('input[name="R20"], input[name="R21"], input[name="R22"], input[name="R23"], input[name="R24"],  input[name="R25"], input[name="R26"]');
  var r27_r32 = document.querySelectorAll('input[name="R27"], input[name="R28"], input[name="R29"], input[name="R30"], input[name="R31"], input[name="R32"]');

  var r33_r48 = document.querySelectorAll('input[name="R33"], input[name="R34"], input[name="R35"], input[name="R36"], input[name="R37"], input[name="R38"], input[name="R39"], input[name="R40"], input[name="R41"], input[name="R42"], input[name="R43"], input[name="R44"], input[name="R45"], input[name="R46"], input[name="R47"], input[name="R48"]');

  // ...

  // Obtener los elementos donde se mostrará el resultado para cada grupo
  var resultado_r1_r4 = document.getElementById('resultado-r1-r4');
  var resultado_r5_r7 = document.getElementById('resultado-r5-r7');
  var resultado_r8_r11 = document.getElementById('resultado-r8-r11');
  var resultado_r12_r14 = document.getElementById('resultado-r12-r14');
  var resultado_r15_r17 = document.getElementById('resultado-r15-r17');
  var resultado_r18_r19 = document.getElementById('resultado-r18-r19');
  var resultado_r20_r26 = document.getElementById('resultado-r20-r26');
  var resultado_r27_r32 = document.getElementById('resultado-r27-r32');
  var resultado_r33_r48 = document.getElementById('resultado-r33-r48');

  // ...

  // Función para calcular el promedio de un grupo de elementos de radio
  function calcularPromedio(radios, resultado) {
    var suma = 0;
    var contador = 0;
    
    // Sumar los valores de los elementos seleccionados
    radios.forEach(function(radio) {
      if (radio.checked) {
        suma += parseInt(radio.value);
        contador++;
      }
    });
    
    // Calcular el promedio
    var promedio = suma / contador;
    
    // Mostrar el resultado
    resultado.textContent = 'Promedio: ' + promedio.toFixed(2);
  }

  // Agregar event listeners para detectar cambios en los valores de los elementos de radio
  r1_r4.forEach(function(radio) {
    radio.addEventListener('change', function() {
      calcularPromedio(r1_r4, resultado_r1_r4);
    });
  });
  r5_r7.forEach(function(radio) {
    radio.addEventListener('change', function() {
      calcularPromedio(r5_r7, resultado_r5_r7);
    });
  });
  r8_r11.forEach(function(radio) {
    radio.addEventListener('change', function() {
      calcularPromedio(r8_r11, resultado_r8_r11);
    });
  });
  r8_r11.forEach(function(radio) {
    radio.addEventListener('change', function() {
      calcularPromedio(r8_r11, resultado_r8_r11);
    });
  });
  r12_r14.forEach(function(radio) {
    radio.addEventListener('change', function() {
      calcularPromedio(r12_r14, resultado_r12_r14);
    });
  });
  r15_r17.forEach(function(radio) {
    radio.addEventListener('change', function() {
      calcularPromedio(r15_r17, resultado_r15_r17);
    });
  });
  r18_r19.forEach(function(radio) {
    radio.addEventListener('change', function() {
      calcularPromedio(r18_r19, resultado_r18_r19);
    });
  });
  r20_r26.forEach(function(radio) {
    radio.addEventListener('change', function() {
      calcularPromedio(r20_r26, resultado_r20_r26);
    });
  });
  r27_r32.forEach(function(radio) {
    radio.addEventListener('change', function() {
      calcularPromedio(r27_r32, resultado_r27_r32);
    });
  });
  r33_r48.forEach(function(radio) {
    radio.addEventListener('change', function() {
      calcularPromedio(r33_r48, resultado_r33_r48);
    });
  });

  // ...





// Obtener el elemento donde se mostrará el resultado del cálculo del promedio de todos los promedios
var resultado_promedio_total = document.getElementById('resultado-promedio-total');

// Función para calcular el promedio de todos los promedios
function calcularPromedioTotal() {
var suma = 0;
var contador = 0;

// Sumar los valores de los elementos seleccionados
r1_r4.forEach(function(radio) {
  if (radio.checked) {
    suma += parseInt(radio.value);
    contador++;
  }
});
r5_r7.forEach(function(radio) {
  if (radio.checked) {
    suma += parseInt(radio.value);
    contador++;
  }
});
r8_r11.forEach(function(radio) {
  if (radio.checked) {
    suma += parseInt(radio.value);
    contador++;
  }
});
r12_r14.forEach(function(radio) {
  if (radio.checked) {
    suma += parseInt(radio.value);
    contador++;
  }
});
r15_r17.forEach(function(radio) {
  if (radio.checked) {
    suma += parseInt(radio.value);
    contador++;
  }
});
r18_r19.forEach(function(radio) {
  if (radio.checked) {
    suma += parseInt(radio.value);
    contador++;
  }
});
r20_r26.forEach(function(radio) {
  if (radio.checked) {
    suma += parseInt(radio.value);
    contador++;
  }
});
r27_r32.forEach(function(radio) {
  if (radio.checked) {
    suma += parseInt(radio.value);
    contador++;
  }
});
r33_r48.forEach(function(radio) {
  if (radio.checked) {
    suma += parseInt(radio.value);
    contador++;
  }
});

// ...

// Calcular el promedio
var promedio = suma / contador;

// Mostrar el resultado
resultado_promedio_total.textContent = 'Promedio total: ' + promedio.toFixed(2);
}

// Agregar event listeners para detectar cambios en los valores de los elementos de radio
r1_r4.forEach(function(radio) {
radio.addEventListener('change', calcularPromedioTotal);
});
r5_r7.forEach(function(radio) {
radio.addEventListener('change', calcularPromedioTotal);
});
r8_r11.forEach(function(radio) {
radio.addEventListener('change', calcularPromedioTotal);
});
r12_r14.forEach(function(radio) {
radio.addEventListener('change', calcularPromedioTotal);
});
r15_r17.forEach(function(radio) {
radio.addEventListener('change', calcularPromedioTotal);
});
r18_r19.forEach(function(radio) {
radio.addEventListener('change', calcularPromedioTotal);
});
r20_r26.forEach(function(radio) {
radio.addEventListener('change', calcularPromedioTotal);
});
r27_r32.forEach(function(radio) {
radio.addEventListener('change', calcularPromedioTotal);
});
r33_r48.forEach(function(radio) {
radio.addEventListener('change', calcularPromedioTotal);
});
// ...





</script>
<style type="text/css">
/* Agregar una regla CSS para cambiar el color del texto de los elementos con id específico */
#resultado-r1-r4,
#resultado-r5-r7,
#resultado-r8-r11,
#resultado-r12-r14,
#resultado-r15-r17,
#resultado-r18-r19,
#resultado-r20-r26,
#resultado-r27-r32,
#resultado-r33-r48,
#resultado-promedio-total {
color: green;
}
</style>
