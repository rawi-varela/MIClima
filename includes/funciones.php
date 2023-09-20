<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//Validar la URL por un ID válido
function validarORedireccionar(string $url) {
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: $url " );
    }

    return $id;
}

// Función que revisa que el usuario este autenticado
// Para proteger las rutas
function isAuthAnfitrion() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}
//Se ponen después de los session_start() en los Controllers
function isAuthALider() : void {
    if(!isset($_SESSION['lider'])) {
        header('Location: /');
    }
}

function isAuthTH() : void {
    if(!isset($_SESSION['th'])) {
        header('Location: /');
    }
}