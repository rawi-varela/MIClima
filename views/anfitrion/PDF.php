<?php
// Incluye la biblioteca TCPDF
require_once('tcpdf/tcpdf.php');

// Incluye el archivo de conexión a la base de datos



// Crea un nuevo documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establece los datos del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu nombre');
$pdf->SetTitle('Evaluación-' . $lista['id_u']);

// Establece el encabezado y el pie de página
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Agrega una página
$pdf->AddPage();

// Calcula la posición X para centrar la imagen en la página
$imageWidthInMM = 40;
$pageWidthInMM = $pdf->getPageWidth();
$imageXPosition = ($pageWidthInMM - $imageWidthInMM) / 2;

// Agrega la imagen al PDF
$pdf->Image('logos/mundoimperial.png', $imageXPosition, '', 40, 18);

// Establece la fuente
$pdf->SetFont('dejavusans', '', 10);

// Contenido del PDF
$html = '<br><br><h1>Datos del usuario</h1>
<table border="1">
    <tr>
        <th align="center">RFC</th>
        <td align="center">' . $lista['id_u'] . '</td>
    </tr>
    <tr>
        <th align="center">Nombre</th>
        <td align="center">' . $lista['pnombre_u'] . ' ' . $lista['snombre_u'] . ' ' . $lista['papellido_u'] . ' ' . $lista['sapellido_u'] . '</td>
    </tr>
    <tr>
        <th align="center">Área</th>
        <td align="center">' . $nombre_a . '</td>
    </tr>
    <tr>
        <th align="center">Puesto</th>
        <td align="center">' . $nombre_p . '</td>
    </tr>
</table>';

$html .= '<h1>Datos de la evaluación</h1>
<table border="1">
    <tr>
        <th align="center">Calificación final</th>
        <td align="center">' . $listac['cal_final'] . '</td>
    </tr>
    <tr>
        <th align="center">Nivel esperado</th>
        <td align="center">' . $listac['nivel_esperado'] . '</td>
    </tr>
    <tr>
        <th align="center">Desviación</th>
        <td align="center">' . $listac['desviacion'] . '</td>
    </tr>
</table>';

$html .= '<h1>Evaluación K.C.H.A.T</h1>
<table border="1">
    <tr>
        <th align="center"><strong>COMPETENCIA</strong></th>
        <th align="center"><strong>CALIFICACIÓN</strong></th>
    </tr>
    <tr>
        <td><strong>COMPROMISO</strong></td>
        <td align="center"><strong>' . $listac['compromiso'] . ' </strong></td>
    </tr> 
    <tr>
        <td>ES RESPONSABLE / CUMPLIR EN TIEMPO Y FORMA</td>
        <td align="center">' . $listac['r1'] . '</td>
    </tr>
    <tr>
        <td>AUTOEXIGENCIA CALIDAD</td>
        <td align="center">' . $listac['r2'] . '</td>
    </tr>
    <tr>
        <td>AUTO CORRECCION/ ACEPTA SUS ERRORES</td>
        <td align="center">' . $listac['r3'] . '</td>
    </tr>
        <tr>
        <td>PROACTIVIDAD</td>
        <td align="center">' . $listac['r4'] . '</td>
    </tr>


    <tr>
        <td><strong>INTREGIDAD</strong></td>
        <td align="center"><strong>' . $listac['integridad'] . ' </strong></td>
    </tr> 
    <tr>
        <td>DISCRESION</td>
        <td align="center">' . $listac['r5'] . '</td>
    </tr>
    <tr>
        <td>CONFIDENCIALIDAD</td>
        <td align="center">' . $listac['r6'] . '</td>
    </tr>
    <tr>
        <td>HONESTIDAD Y ETICA</td>
        <td align="center">' . $listac['r7'] . '</td>
    </tr>


    <tr>
        <td><strong>PASION POR LO EXTRAORDINARIO</strong></td>
        <td align="center"><strong>' . $listac['pasion'] . ' </strong></td>
    </tr> 
    <tr>
        <td>ORIENTACION AL SERVICIO PERSONALIZADO INTERNO Y EXTERNO</td>
        <td align="center">' . $listac['r8'] . '</td>
    </tr>
    <tr>
        <td>SONRISA Y CONTACCTO VISUAL EFECTIVO</td>
        <td align="center">' . $listac['r9'] . '</td>
    </tr>
    <tr>
        <td>BRINDA ALTERNATIVAS Y SOPLUCIONES</td>
        <td align="center">' . $listac['r10'] . '</td>
    </tr>
        <tr>
        <td>ANTICIPACIÓN A NECESIDADES DEL CLIENTE</td>
        <td align="center">' . $listac['r11'] . '</td>
    </tr>


    <tr>
        <td><strong>SINERGIA / TRABAJO EN EQUIPO</strong></td>
        <td align="center"><strong>' . $listac['sinergia'] . ' </strong></td>
    </tr> 
    <tr>
        <td>RESOLUCION DE CONFLICTOS</td>
        <td align="center">' . $listac['r12'] . '</td>
    </tr>
    <tr>
        <td>ARMONIZA, COLABORA CON COMPAÑEROS</td>
        <td align="center">' . $listac['r13'] . '</td>
    </tr>
    <tr>
        <td>COORDINACIPON DE TALENTOS Y TAREAS</td>
        <td align="center">' . $listac['r14'] . '</td>
    </tr>


    <tr>
        <td><strong>MAESTRIA EMOCIONAL</strong></td>
        <td align="center"><strong>' . $listac['maestria'] . ' </strong></td>
    </tr> 
    <tr>
        <td>MANEJO DE EMOCIONES/ LAS EXPRESA ADECUADAMENTE</td>
        <td align="center">' . $listac['r15'] . '</td>
    </tr>
    <tr>
        <td>MUESTRA AUTODOMINIO EN SISTUACIONES DIFICILES</td>
        <td align="center">' . $listac['r16'] . '</td>
    </tr>
    <tr>
        <td>DEDICA TIEMPO PARA EL MANEJO DE SU ESTRÉS</td>
        <td align="center">' . $listac['r17'] . '</td>
    </tr>


    <tr>
        <td><strong>COMUNICACIÓN EMPÁTICA</strong></td>
        <td align="center"><strong>' . $listac['comunicacion'] . ' </strong></td>
    </tr> 
    <tr>
        <td>TECNICAS DE ESCUCHA ACTIVA/ PONER ATENCION LAS OPINIONES PARA ESTABLECER ACUERDOS</td>
        <td align="center">' . $listac['r18'] . '</td>
    </tr>
    <tr>
        <td>RELACIONES SINDICALES</td>
        <td align="center">' . $listac['r19'] . '</td>
    </tr>



    <tr>
        <td><strong>LIDERAZGO Y DESARROLLO DE ANFITRIONES</strong></td>
        <td align="center"><strong>' . $listac['liderazgo'] . ' </strong></td>
    </tr> 
    <tr>
        <td>INDUCCION/ENTRENAMIENTO</td>
        <td align="center">' . $listac['r20'] . '</td>
    </tr>
    <tr>
        <td>PENSAMIENTO EJECUTIVO</td>
        <td align="center">' . $listac['r21'] . '</td>
    </tr>
    <tr>
        <td>TECNICAS DE INSTRUCCIÓN/ TRAIN THE TRAINER</td>
        <td align="center">' . $listac['r22'] . '</td>
    </tr>
    <tr>
        <td>CLARIFICA Y MONITORIA EL CUMPLIMIENTO DE OBJETIVOS DEL EQUIPO</td>
        <td align="center">' . $listac['r23'] . '</td>
    </tr>
    <tr>
        <td>RECONOCE EL ESFUERZO</td>
        <td align="center">' . $listac['r24'] . '</td>
    </tr>
    <tr>
        <td>RETROALIMENTACION SOBRE EL DESEMPEÑO</td>
        <td align="center">' . $listac['r25'] . '</td>
    </tr>
    <tr>
        <td>PLANES DE DESARROLLO / PARA EL EQUIPO</td>
        <td align="center">' . $listac['r26'] . '</td>
    </tr>


    <tr>
        <td><strong>EFECTIVIDAD</strong></td>
        <td align="center"><strong>' . $listac['efectividad'] . ' </strong></td>
    </tr> 
    <tr>
        <td>CUMPLIMEINTO DE KPI/ OBJETIVOS</td>
        <td align="center">' . $listac['r27'] . '</td>
    </tr>
    <tr>
        <td>MANEJO DE TIEMPO</td>
        <td align="center">' . $listac['r28'] . '</td>
    </tr>
    <tr>
        <td>SENTIDO DE URGENCIA/ VELOCIDAD</td>
        <td align="center">' . $listac['r29'] . '</td>
    </tr>
    <tr>
        <td>AUTOGESTION</td>
        <td align="center">' . $listac['r30'] . '</td>
    </tr>
        <tr>
        <td>SEGUIMIENTO</td>
        <td align="center">' . $listac['r31'] . '</td>
    </tr>
    <tr>
        <td>CONTROL Y MANEJO DE PRESUPUESTO</td>
        <td align="center">' . $listac['r32'] . '</td>
    </tr>


    <tr>
        <td><strong>FUNCIONES ESPECIFICAS DEL AREA</strong></td>
        <td align="center"><strong>' . $listac['funciones_esp_area'] . ' </strong></td>
    </tr> 
    <tr>
        <td>SEGURIDAD E HIGIENE Y MEDIO AMBIENTE EN AREA DE TRABAJO</td>
        <td align="center">' . $listac['r33'] . '</td>
    </tr>
    <tr>
        <td>MANEJO DE INSPECCIONES GUBERNAMENTALES Y DISTINTIVOS</td>
        <td align="center">' . $listac['r34'] . '</td>
    </tr>
    <tr>
        <td>ORGANIZACIÓN Y DISTRIBUCIÓN DE TAREAS / CARGAS DE TRABAJO</td>
        <td align="center">' . $listac['r35'] . '</td>
    </tr>
    <tr>
        <td>ORGANIZACIÓN DE EVENTOS ESPECIALES DE GRAN MAGNITUD</td>
        <td align="center">' . $listac['r36'] . '</td>
    </tr>
    <tr>
        <td>APLICACIÓN DE DISCIPLINA PROGRESIVA</td>
        <td align="center">' . $listac['r37'] . '</td>
    </tr>
    <tr>
        <td>TECNICA DE ENTREVISTA Y ASESORIA</td>
        <td align="center">' . $listac['r38'] . '</td>
    </tr> 
    <tr>
        <td>CONOCIMEINTO CULINARIO ESPECIALIDADO / Actual</td>
        <td align="center">' . $listac['r39'] . '</td>
    </tr>
    <tr>
        <td>PLANEACIÓN DEL MENÚ Y RECETAS</td>
        <td align="center">' . $listac['r40'] . '</td>
    </tr>
    <tr>
        <td>MENÚS Y SERVICIOS ESPECIALES</td>
        <td align="center">' . $listac['r41'] . '</td>
    </tr>
    <tr>
        <td>COSTO DE ALIMENTOS</td>
        <td align="center">' . $listac['r42'] . '</td>
    </tr>
    <tr>
        <td>CONTROL DE PORCIONES</td>
        <td align="center">' . $listac['r43'] . '</td>
    </tr>
    <tr>
        <td>CONTROL DE INVENTARIOS</td>
        <td align="center">' . $listac['r44'] . '</td>
    </tr>
    <tr>
        <td>CONTROL DE COMPRAS</td>
        <td align="center">' . $listac['r45'] . '</td>
    </tr>
    <tr>
        <td>MANEJO DE ALMACENES E INVENTARIOS</td>
        <td align="center">' . $listac['r46'] . '</td>
    </tr>
    <tr>
        <td>CONTROL Y MANEJO DE EQUIPO Y MATERIALES DE TRABAJO</td>
        <td align="center">' . $listac['r47'] . '</td>
    </tr>
    <tr>
        <td>NIVEL EDUCATIVO (1= PRIMARIA 2= SECUNDARIA 3= PREPARATORIA 4=UNIVERSIDAD 5=MAESTRÍA O POSGRADO</td>
        <td align="center">' . $listac['r48'] . '</td>
    </tr>



</table>';

$html .= '<br><br><table border="0" style="width: 100%;">
    <tr style="text-align: center;">
        <td style="width: 50%;">' . $lista['pnombre_u'] . ' ' . $lista['snombre_u'] . ' ' . $lista['papellido_u'] . ' ' . $lista['sapellido_u'] .'<br><br><br><br></td>
        <td style="width: 50%;">'. $InLider['pnombre_m'] . ' ' . $InLider['snombre_m'] . ' ' . $InLider['papellido_m'] . ' ' . $InLider['sapellido_m'].'<br><br><br><br></td>
    </tr>
    <tr style="text-align: center;">
        <td style="width: 50%;"><hr></td>
        <td style="width: 50%;"><hr></td>
    </tr> 
    <tr style="text-align: center;">
        <td style="width: 50%;">Firma de Anfitrión</td> 
        <td style="width: 50%;">Firma de Lider</td> 
    </tr> 

</table>';

// Escribe el contenido en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Cierra y envía el documento PDF
$filename = 'Evaluación-' . $lista['id_u'] . '.pdf';
$pdf->Output($filename, 'I');

?>


