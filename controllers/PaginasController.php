<?php

namespace Controllers;

use Model\Antiguedades;
use Model\Departamentos;
use Model\Edades;
use Model\Generos;
use Model\Globales;
use Model\Periodos;
use Model\Preguntas;
use Model\Propiedades;
use Model\Resultados;
use Model\ResultadosDeptos;
use Model\TipoPuestos;
use MVC\Router;

class PaginasController {
    public static function index( Router $router) {

        $inicio = true;

        $router->render('paginas/index', [
            'inicio' => $inicio
        ]);
    }

    public static function responder( Router $router) { //Método de page Encuesta
        $alertas = [];

        $resultado = new Resultados; //Instancia vacía

        $propiedades = Propiedades::all();
        $areas = Departamentos::all();
        $generos = Generos::all();
        $edades = Edades::all();
        $tipoPuestos = TipoPuestos::all();
        $antiguedades = Antiguedades::all();

        $preguntas = Preguntas::all();
        $contador = 0;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado->sincronizar($_POST);

            // Obtener el id del último periodo de esa Propiedad
            $lastPeriodo = Periodos::where('propiedades_id',$resultado->periodos_id, 'DESC');
            // Reemplazar el id de la Propiedad por el del Periodo
            $resultado->periodos_id = $lastPeriodo->id;

            $alertas = $resultado->validar();

            

            if(empty($alertas)) {
                //Guardar en BD Resultados
                $resultadoBD = $resultado->crearAI();

                if($resultadoBD) {

                    // ACTUALIZAR ESTADÍSTICAS DE GLOBALES
                    $globalExistente = Globales::where('periodos_id', $resultado->periodos_id); //Buscar registro global existente
                    // Si existe, actualizar
                    if ($globalExistente) {
                        $globalExistente->cantidad++; // Incrementar la cantidad

                        // Actualizar promedios 
                        $totalPorcentaje = 0;
                        for ($i = 1; $i <= 12; $i++) {
                            $campo = "cp" . $i;
                            $pregunta = "p" . $i;
                            $valor = ($i == 1 || $i == 3) ? 'Negativo' : 'Positivo'; // 'Negativo' para p1 y p3, 'Positivo' para los demás

                            $promedio = Resultados::promedio($pregunta, $valor, 'periodos_id', $resultado->periodos_id);
                            $globalExistente->$campo = $promedio; // Asignar el promedio al campo correspondiente
                            $totalPorcentaje += $promedio;
                        }

                        $globalExistente->porcentaje = round($totalPorcentaje / 12, 2);

                        // Actualizar cambios
                        $globalExistente->guardar();
                    } else {
                        // Si no existe, crear nuevo registro
                        $nuevoGlobal = new Globales([
                            'cantidad' => 1,
                            'periodos_id' => $resultado->periodos_id
                        ]);

                        // Asignar valores calculados a campos adicionales si es necesario
                        $totalPorcentaje = 0;
                        for ($i = 1; $i <= 12; $i++) {
                            $campo = "cp" . $i;
                            $pregunta = "p" . $i;
                            $valor = ($i == 1 || $i == 3) ? 'Negativo' : 'Positivo';

                            $promedio = Resultados::promedio($pregunta, $valor, 'periodos_id', $resultado->periodos_id);
                            $nuevoGlobal->$campo = $promedio;
                            $totalPorcentaje += $promedio;
                        }

                        // Calcular y asignar el promedio para porcentaje
                        $nuevoGlobal->porcentaje = round($totalPorcentaje / 12, 2);


                        // Guardar nuevo registro
                        $nuevoGlobal->crearAI();
                    }


                    // ACTUALIZAR ESTADÍSTICAS DE DEPARTAMENTOS
                    $resultadoDeptoExistente = ResultadosDeptos::whereArray([
                        'periodos_id' => $resultado->periodos_id,
                        'departamentos_id' => $resultado->departamentos_id
                    ]);


                    // Si existe, actualizar
                    if ($resultadoDeptoExistente) {
                        // Actualizar promedios 
                        for ($i = 1; $i <= 12; $i++) {
                            $campo = "cp" . $i;
                            $pregunta = "p" . $i;
                            $valor = ($i == 1 || $i == 3) ? 'Negativo' : 'Positivo'; // 'Negativo' para p1 y p3, 'Positivo' para los demás

                            $promedio = Resultados::promedio($pregunta, $valor, 'periodos_id', $resultado->periodos_id, 'departamentos_id', $resultado->departamentos_id);
                            $resultadoDeptoExistente->$campo = $promedio; // Asignar el promedio al campo correspondiente
                        }

                        // Actualizar cambios
                        $resultadoDeptoExistente->guardar();
                    } else {
                        // Si no existe, crear nuevo registro
                        $nuevoResultadoDepto = new ResultadosDeptos([
                            'departamentos_id' => $resultado->departamentos_id,
                            'periodos_id' => $resultado->periodos_id
                        ]);

                        // Calcular y asignar promedios
                        for ($i = 1; $i <= 12; $i++) {
                            $campo = "cp" . $i;
                            $pregunta = "p" . $i;
                            $valor = ($i == 1 || $i == 3) ? 'Negativo' : 'Positivo'; // 'Negativo' para p1 y p3, 'Positivo' para los demás

                            $promedio = Resultados::promedio($pregunta, $valor, 'periodos_id', $resultado->periodos_id, 'departamentos_id', $resultado->departamentos_id);
                            $nuevoResultadoDepto->$campo = $promedio; // Asignar el promedio al campo correspondiente
                        }

                        // Guardar nuevo registro
                        $nuevoResultadoDepto->crearAI();
                        
                    }
                    
                    header('Location: /respuestas-enviadas');
                }
            }
        }

        $router->render('paginas/encuesta', [
            'propiedades' => $propiedades,
            'areas' => $areas,
            'generos' => $generos,
            'edades' => $edades,
            'tipoPuestos' => $tipoPuestos,
            'antiguedades' => $antiguedades,
            'preguntas' => $preguntas,
            'contador' => $contador,
            'resultado' => $resultado
        ]);
    }

    public static function volver( Router $router) {

        $router->render('paginas/enviado', [
            
        ]);
    }

    public static function error(Router $router) {

        $router->render('paginas/error', [
            'titulo' => 'Página no encontrada'
        ]);
    }

    // public static function admin( Router $router) {
    //     $router->render('paginas/usuario', [

    //     ]);
    // }
}