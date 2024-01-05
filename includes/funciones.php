<?php

define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'] . '/images/');

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

//Validar tipo de contenido

function validarTipoContenido($type){
    $types = ['product', 'post', 'seller'];

    return in_array($type, $types);
}

function shortText($text) {
    // Obtén los primeros 50 caracteres del texto
    $shortenedText = substr($text, 0, 80);
    
    // echo $shortenedText;
    return $shortenedText;
}

function validarORedireccionar($url){
    //Validar la URL  por id valido (int)

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: {$url}");
    }

    return $id;
}

function IdByGet(){
    //Validar la URL  por id 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    return $id;
}

function mostrarNotificacion($codigo){
    $message = '';
    switch($codigo){
        case 1:
            $message = 'Created Successfully';
            break;
        case 2:
            $message = 'Updated Successfully';
            break;
        case 3:
            $message = 'Deleted Successfully';
            break;
        default:
            $message = false;
            break;
    }

    return $message;
}

//Revisar que el usuario esté autenticado

function isAuth(): void{
    if(!isset($_SESSION['login'])){
        header('Location: /');
    }
}
