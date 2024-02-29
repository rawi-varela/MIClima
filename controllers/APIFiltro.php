<?php

namespace Controllers;

use Model\ResultadosDeptos;

class APIFiltro {


        public static function filtro() {
            $periodo = $_GET['periodos_id'] ?? '';
            $departamento = $_GET['departamentos_id'] ?? '';

            $periodo = filter_var($periodo, FILTER_VALIDATE_INT);
            $departamento = filter_var($departamento, FILTER_SANITIZE_SPECIAL_CHARS);

            if(!$periodo || !$departamento) {
                echo json_encode([]);
                return;
             }
        
            // Aquí obtienes los resultados filtrados de tu base de datos
            $resultadosFiltrados = ResultadosDeptos::filtrar([
                'periodos_id' => $periodo, 
                'departamentos_id' => $departamento
            ]);

            // Resultados del Depto del periodo anterior
            $resultadoPrevio = ResultadosDeptos::findPrevio($periodo, $departamento);

            // Crear un array que contenga todas las entidades
            $data = [
                'resultadosFiltrados' => $resultadosFiltrados,
                'resultadoPrevio' => $resultadoPrevio
            ];
        
            header('Content-Type: application/json');
            echo json_encode($data);
        }

}
    


