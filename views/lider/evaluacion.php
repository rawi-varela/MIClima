
    <h1>Evaluación de Desempeño 2023</h1>
    <div class="evaluacion-header">
        <p>Nombre: <?php echo $anfitrion->nombre . " " . $anfitrion->apellidoPat . " " . $anfitrion->apellidoMat ?> </p>
        <p>Área: <?php echo $anfitrion->area->nombreArea ?> </p>
        <p>Posición: <?php echo $anfitrion->posicion->nombrePosicion; ?> </p>
    </div>
    <p class="alinear-centro">Los niveles de calificación de los estándares están diseñados del 1 al 5 siendo de forma ascendente. </p>
    <div class="evaluacion-header mantener">
        <p>1 = Deficiente solo lo conoce.</p>
        <p>2 = Inconsistente menor a lo esperado, lo hace con errores.</p>
        <p>3 = Consistente esperado normal, lo hace y lo puede explicar, se autocorrige.</p>
        <p>4 = Supera Frecuentemente lo esperado busca mejorar su desempeño.</p>
        <p>5= Siempre supera el estandar, conoce, explica y genera controles del estándar, es experto.</p>
    </div>

<div class="contenedor-global">
    <main class="evaluacion-total">
        <form action="/lider-evaluar" method="POST" class="formulario">
        <div id="Compromiso">
      <br>
      <center><h4 class="controls3" >COMPROMISO</h4></center>
      <center><div id="resultado-r1-r4"></div></center>
      <div class="container text-center">
          <div class="row">
              <div class="col" required>
                Es responsable / Cumplir en tiempo y forma <br><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R1" id="R1-1" value="1" required>
                  <label class="form-check-label" for="Radio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R1" id="R1-2" value="2">
                  <label class="form-check-label" for="Radio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R1" id="R1-3" value="3">
                  <label class="form-check-label" for="Radio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R1" id="R1-4" value="4" >
                  <label class="form-check-label" for="Radio4">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R1" id="R1-5" value="5">
                  <label class="form-check-label" for="Radio5">5</label>
                </div>
              </div>
              <div class="col" required>
                Autoexigencia calidad <br><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R2" id="R2-1" value="1" required>
                  <label class="form-check-label" for="Radio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R2" id="R2-2" value="2">
                  <label class="form-check-label" for="Radio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R2" id="R2-3" value="3">
                  <label class="form-check-label" for="Radio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R2" id="R2-4" value="4" >
                  <label class="form-check-label" for="Radio4">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R2" id="R2-5" value="5">
                  <label class="form-check-label" for="Radio5">5</label>
                </div>
              </div>
          </div><!--cierre row-->
          <br>
          <div class="row">      
            <div class="col" required>
              Auto correción / Acepta sus errores <br><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R3" id="R3-1" value="1" required>
                  <label class="form-check-label" for="Radio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R3" id="R3-2" value="2">
                  <label class="form-check-label" for="Radio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R3" id="R3-3" value="3">
                  <label class="form-check-label" for="Radio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R3" id="R3-4" value="4">
                  <label class="form-check-label" for="Radio4">4</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="R3" id="R3-5" value="5">
                  <label class="form-check-label" for="Radio5">5</label>
                </div>
            </div>  
            <div class="col" required>
            Proactividad / Se anticipa, demuestra total disposición para colaborar <br><br>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R4" id="R4-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R4" id="R4-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R4" id="R4-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R4" id="R4-4" value="4" >
                    <label class="form-check-label" for="Radio4">4</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R4" id="R4-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                  </div>      
            </div>
          </div><!--cierre row-->
      </div><!--CIERRE CONTEINER CENTER-->
        </div><!--cierre división-->
        <!--Cierre COMPROMISO-->
        <!--<hr style="height:1px;border:none;color:#333;background-color:#333;" />!-->
        <hr>
            <br> 
        <div id="Integridad">
        <center><h4 class="controls3">INTEGRIDAD</h4></center>
        <center><div id="resultado-r5-r7"></div></center>
        <div class="container text-center">
            <div class="row">
                <div class="col" required>
                    Discreción<br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R5" id="R5-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R5" id="R5-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R5" id="R5-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R5" id="R5-4" value="4" >
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R5" id="R5-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
        <br>
                <div class="col" required>
                    Confidencialidad<br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R6" id="R6-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R6" id="R6-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R6" id="R6-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R6" id="R6-4" value="4" >
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R6" id="R6-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div><!--cierre col-->
            </div><!--cierre row-->
            <div class="row">
                <div class="col" required>
                    Honestidad y ética<br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R7" id="R7-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R7" id="R7-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R7" id="R7-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R7" id="R7-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R7" id="R7-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div><!--cierre col-->
            </div><!--cierre row-->
        </div><!--CIERRE CONTEINER-->-
        </div><!--CIERRE id INTEGRIDAD-->
        <hr>
        <br>
        <div id="Pasion">
        <center><h4 class="controls3">PASIÓN POR LO EXTRAORDINARIO</h4></center>
        <center><div id="resultado-r8-r11"></div></center>
        <div class="container text-center">
            <div class="row">
                <div class="col" required>
                    Orientación al servicio personalizado interno y externo<br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R8" id="R8-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R8" id="R8-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R8" id="R8-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R8" id="R8-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R8" id="R8-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
                <div class="col" required>
                    Sonrisa y contacto visual efectivo <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R9" id="R9-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R9" id="R9-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R9" id="R9-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R9" id="R9-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R9" id="R9-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
            <br>
            <div class="row">      
                <div class="col" required>
                Brinda alternativas y soluciones  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R10" id="R10-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R10" id="R10-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R10" id="R10-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R10" id="R10-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R10" id="R10-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>  
                <div class="col" required>
                Anticipación a necesidades del cliente <br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R11" id="R11-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R11" id="R11-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R11" id="R11-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R11" id="R11-4" value="4">
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R11" id="R11-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
        </div><!--CIERRE CONTEINER CENTER-->
        </div><!--cierre división-->
        <!--Cierre -->
        <hr>
        <div id="Trabajo en equipo">
        <center><h4 class="controls3">SINERGIA / TRABAJO EN EQUIPO</h4></center>
        <center><div id="resultado-r12-r14"></div></center>
        <div class="container text-center">
            <div class="row">
                <div class="col" required>
                    Resolución de conflictos <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R12" id="R12-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R12" id="R12-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R12" id="R12-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R12" id="R12-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R12" id="R12-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
                <div class="col" required>
                    Armoniza, colabora con compañeros <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R13" id="R13-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R13" id="R13-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R13" id="R13-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R13" id="R13-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R13" id="R13-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
            <div class="row">      
                <div class="col" required>
                Coordinación de talentos y tareas<br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R14" id="R14-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R14" id="R14-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R14" id="R14-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R14" id="R14-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R14" id="R14-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
        </div><!--CIERRE CONTEINER CENTER-->
        </div><!--cierre división-->
        <!--Cierre Trabajo en equipo-->
        <hr>
        <br>
        <div id="Maestria emocional">
        <center><h4 class="controls3">MAESTRÍA EMOCIONAL</h4></center>
        <center><div id="resultado-r15-r17"></div></center>
        <div class="container text-center">
            <div class="row">
                <div class="col" required>
                    Manejo de emociones / las expresa adecuadamente <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R15" id="R15-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R15" id="R15-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R15" id="R15-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R15" id="R15-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R15" id="R15-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
                <div class="col" required>
                    Manejo de emociones / las expresa adecuadamente <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R16" id="R16-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R16" id="R16-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R16" id="R16-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R16" id="R16-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R16" id="R16-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
            <div class="row">      
                <div class="col" required>
                Dedica tiempo para el manejo de su estrés<br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R17" id="R17-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R17" id="R17-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R17" id="R17-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R17" id="R17-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R17" id="R17-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
        </div><!--CIERRE CONTEINER CENTER-->
        </div><!--cierre división-->
        <!--Cierre MAESTRIA EMOCIONAL-->
        <hr>
        <br>
        <div id="COMUNICACIÓN EMPÁTICA">
        <center><h4 class="controls3">COMUNICACIÓN EMPÁTICA</h4></center>
        <center><div id="resultado-r18-r19"></div></center>
        <div class="container text-center">
            <div class="row">
                <div class="col" required>
                    Técnica de escucha activa / poner atención a las opiniones para establecer acuerdos <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R18" id="R18-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R18" id="R18-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R18" id="R18-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R18" id="R18-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R18" id="R18-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
                <div class="col" required>
                Relaciones sindicales <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R19" id="R19-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R19" id="R19-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R19" id="R19-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R19" id="R19-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R19" id="R19-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
        </div><!--CIERRE CONTEINER CENTER-->
        </div><!--cierre división-->
        <!--Cierre COMUNICACIÓN EMPÁTICA-->
        <hr>
        <br>
        <div id="Liderazgo y desarrollo">
        <center><h4 class="controls3">LIDERAZGO Y DESARROLLO DE ANFITRIONES</h4></center>
        <center><div id="resultado-r20-r26"></div></center>
        <div class="container text-center">
            <div class="row">
                <div class="col" required>
                Inducción / Entrenamiento <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R20" id="R20-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R20" id="R20-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R20" id="R20-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R20" id="R20-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R20" id="R20-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
                <div class="col" required>
                    Pensamiento ejecutivo <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R21" id="R21-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R21" id="R21-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R21" id="R21-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R21" id="R21-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R21" id="R21-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
            <br>
            <div class="row">      
                <div class="col" required>
                Técnicas de instrucción / Train the trainer  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R22" id="R22-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R22" id="R22-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R22" id="R22-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R22" id="R22-4" value="4" >
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R22" id="R22-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>                
                <div class="col" required>
                Clarifica y monitorea el cumplimiento de objetivos del equipo <br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R23" id="R23-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R23" id="R23-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R23" id="R23-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R23" id="R23-4" value="4" >
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R23" id="R23-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
        <br>
            <div class="row">      
                <div class="col" required>
                Reconoce el esfuerzo  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R24" id="R24-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R24" id="R24-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R24" id="R24-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R24" id="R24-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R24" id="R24-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>            
                <div class="col" required>
            Retroalimentación sobre el desempeño <br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R25" id="R25-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R25" id="R25-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R25" id="R25-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R25" id="R25-4" value="4">
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R25" id="R25-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
            <div class="row">      
                <div class="col" required>
                Planes de desarrollo / para el equipo  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R26" id="R26-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R26" id="R26-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R26" id="R26-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R26" id="R26-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R26" id="R26-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
        </div><!--CIERRE CONTEINER CENTER-->
        </div><!--cierre división-->
        <hr>
        <br>
        <div id="Efectividad">
        <center><h4 class="controls3">EFECTIVIDAD</h4></center>
        <center><div id="resultado-r27-r32"></div></center>
        <div class="container text-center">
            <div class="row">
                <div class="col" required>
                Cumplimiento de KPI / Objetivos <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R27" id="R27-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R27" id="R27-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R27" id="R27-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R27" id="R27-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R27" id="R27-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
                <div class="col" required>
                    Manejo de tiempo<br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R28" id="R28-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R28" id="R28-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R28" id="R28-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R28" id="R28-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R28" id="R28-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
            <br>
            <div class="row">      
                <div class="col" required>
                Sentido de urgencia / velocidad  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R29" id="R29-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R29" id="R29-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R29" id="R29-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R29" id="R29-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R29" id="R29-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>  
                <div class="col" required>
                Autogestión <br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R30" id="R30-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R30" id="R30-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R30" id="R30-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R30" id="R30-4" value="4">
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R30" id="R30-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
        <br>
            <div class="row">      
                <div class="col" required>
                Seguimiento  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R31" id="R31-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R31" id="R31-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R31" id="R31-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R31" id="R31-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R31" id="R31-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>            
                <div class="col" required>
            Control y manejo de presupuesto <br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R32" id="R32-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R32" id="R32-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R32" id="R32-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R32" id="R32-4" value="4">
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R32" id="R32-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
        </div><!--CIERRE CONTEINER CENTER-->
        </div><!--cierre división-->
        <hr>
        <br>
        <div id="Efectividad">
        <center><h4 class="controls3">FUNCIONES ESPECIFICAS DEL ÁREA</h4></center>
        <center><div id="resultado-r33-r48"></div></center>
        <div class="container text-center">
            <div class="row">
                <div class="col" required>
                Seguridad e higiene y medio ambiente en area de trabajo<br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R33" id="R33-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R33" id="R33-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R33" id="R33-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R33" id="R33-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R33" id="R33-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
                <div class="col" required>
                    Manejo de inspecciones gubernamentales y distintivos<br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R34" id="R34-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R34" id="R34-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R34" id="R34-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R34" id="R34-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R34" id="R34-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
            <br>
            <div class="row">      
                <div class="col" required>
                Organicazión y distribución de tareas / cargas de trabajo  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R35" id="R35-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R35" id="R35-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R35" id="R35-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R35" id="R35-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R35" id="R35-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>  
                <div class="col" required>
                Organizacíon de eventos especiales de gran magnitud <br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R36" id="R36-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R36" id="R36-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R36" id="R36-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R36" id="R36-4" value="4">
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R36" id="R36-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
        <br>
            <div class="row">      
                <div class="col" required>
                Aplicación de disciplina progresiva  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R37" id="R37-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R37" id="R37-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R37" id="R37-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R37" id="R37-4" value="4" >
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R37" id="R37-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>            
                <div class="col" required>
                Tecnica de entrevista y asesoria<br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R38" id="R38-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R38" id="R38-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R38" id="R38-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R38" id="R38-4" value="4" >
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R38" id="R38-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
        <br>
            <div class="row">
                <div class="col" required>
                Conocimiento culinario especializado / Actual <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R39" id="R39-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R39" id="R39-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R39" id="R39-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R39" id="R39-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R39" id="R39-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
                <div class="col" required>
                    Planeacion de menu y recetas <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R40" id="R40-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R40" id="R40-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R40" id="R40-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R40" id="R40-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R40" id="R40-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
            </div><!--cierre row-->
            <br>
            <div class="row">      
                <div class="col" required>
                Menus y servicios especiales  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R41" id="R41-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R41" id="R41-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R41" id="R41-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R41" id="R41-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R41" id="R41-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>  
                <div class="col" required>
                Costos de alimentos <br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R42" id="R42-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R42" id="R42-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R42" id="R42-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R42" id="R42-4" value="4">
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R42" id="R42-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
        <br>
            <div class="row">      
                <div class="col" required>
                Control de porciones  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R43" id="R43-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R43" id="R43-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R43" id="R43-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R43" id="R43-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R43" id="R43-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>            
                <div class="col" required>
                Control de inventarios<br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R44" id="R44-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R44" id="R44-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R44" id="R44-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R44" id="R44-4" value="4">
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R44" id="R44-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
            <br>
            <div class="row">      
                <div class="col" required>
                Control de compras  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R45" id="R45-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R45" id="R45-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R45" id="R45-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R45" id="R45-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R45" id="R45-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>  
                <div class="col" required>
                Manejo de almacenes e inventarios <br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R46" id="R46-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R46" id="R46-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R46" id="R46-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R46" id="R46-4" value="4" >
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R46" id="R46-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
                <br>
            <div class="row">      
                <div class="col" required>
                Control y manejo de equipo y materiales de trabajo  <br><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R47" id="R47-1" value="1" required>
                    <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R47" id="R47-2" value="2">
                    <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R47" id="R47-3" value="3">
                    <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R47" id="R47-4" value="4">
                    <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="R47" id="R47-5" value="5">
                    <label class="form-check-label" for="Radio5">5</label>
                    </div>
                </div>
                <div class="col" required>
                Nivel educativo (1= Primaria 2= Secundaria 3= Preparatoria 4=Univerdad  5=Maestría o Posgrado<br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R48" id="R48-1" value="1" required>
                        <label class="form-check-label" for="Radio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R48" id="R48-2" value="2">
                        <label class="form-check-label" for="Radio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R48" id="R48-3" value="3">
                        <label class="form-check-label" for="Radio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R48" id="R48-4" value="4" >
                        <label class="form-check-label" for="Radio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="R48" id="R48-5" value="5">
                        <label class="form-check-label" for="Radio5">5</label>
                    </div>      
                </div>
            </div><!--cierre row-->
            <?php //echo $mensaje;?>
        </div><!--CIERRE CONTEINER CENTER-->
        </div><!--cierre división-->

        <!-- Agregar un elemento para mostrar el resultado del cálculo del promedio de todos los promedios -->
            <center><div id="resultado-promedio-total"></div></center><br>

      <center><input type="submit" name="Registrar" value="Enviar" class="btn btn-sm btn-block btn-success"></center>

        </form>
    </main>


    <aside class="registro">
        <h2 class="registro__heading">Resultados</h2>

			<table class="anfitrion-resultados">
			<thead>
				<tr>
					<th>Competencias</th>
					<th>Calificacion</th>
                    <th>Esperado</th>
                    <th>Desviacion</th>
				</tr>
				<tr class="competencias">
	            	<th>Compromiso</th>
	        		<td><?php echo $anfitrion->compromiso ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>

				<tr class="competencias">
	            	<th>Pasión por lo Extraordinario</th>
	        		<td><?php echo $anfitrion->funciones_esp_area ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>
                <tr class="competencias">
	            	<th>Sinergia / Trabajo en Equipo</th>
	        		<td><?php echo $anfitrion->funciones_esp_area ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>
                <tr class="competencias">
	            	<th>Maestria Emocional</th>
	        		<td><?php echo $anfitrion->funciones_esp_area ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>
                <tr class="competencias">
	            	<th>Comunicación Empática</th>
	        		<td><?php echo $anfitrion->funciones_esp_area ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>
                <tr class="competencias">
	            	<th>Efectividad</th>
	        		<td><?php echo $anfitrion->funciones_esp_area ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>
                <tr class="competencias">
	            	<th>Liderazgo y Desarrollo de los Anfitriones</th>
	        		<td><?php echo $anfitrion->funciones_esp_area ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>
                <tr class="competencias">
	            	<th>Funciones Específicas del Área</th>
	        		<td><?php echo $anfitrion->funciones_esp_area ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
                    <td><?php echo $anfitrion->compromiso ?? '0' ?></td>
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
