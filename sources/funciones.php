<?php

session_start();
require_once 'Query.php';
include ("funciones.registro.php");
include ("funciones.catalogos.php");
include("Util.php");

/**
 * Verifica si hay conexion a la base de datos
 * @return boolean
 */
checkDBIntegrity();
function checkDBIntegrity() {
    $query = new Query();
    $query->sql = "SELECT NOW() FROM DUAL";
    $check = @$query->select();

    if (Util::val($check)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Funcion que valida si la cadena es un email
 * @param type $email
 * @return boolean
 */
function esEmail($email = "") {
    $car = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
    if (strpos($email, '@') !== false && strpos($email, '.') !== false) {
        if (preg_match($car, $email)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/**
 * 
 * @param type $email
 * @return type
 */
function limpiaEmail($email) {
    $limpio = preg_replace('/[^a-z0-9+_.@-]/i', '', $email);
    return strtolower($limpio);
}

function codificaMail($email = "") {
    $mailCodificado = "";
    for ($i = 0; $i < strlen($email); $i++) {
        if (rand(0, 1) == 0) {
            $mailCodificado .= "&#" . (ord($email[$i])) . ";";
        } else {
            $mailCodificado .= "&#X" . dechex(ord($email[$i])) . ";";
        }
    }
    return $mailCodificado;
}

function guardaArchivo($carpeta, $titulo) {
    include_once ("Documento.inc");
    $img = new Documento();
    $img->archivo = $_FILES["imagen"]["tmp_name"];
    $img->error = $_FILES["imagen"]["errono"];
    $img->nombre = $_FILES["imagen"]["name"];
    //echo $img->nombre;
    $img->tamano = $_FILES["imagen"]["size"];
    $img->tipo = $_FILES["imagen"]["type"];
    $img->titulo = $titulo;
    $img->destino = $carpeta;

    if ($img->verificaError()) {
        if ($img->verificarExtension()) {
            //echo "\nextension correcta";
        }
        if ($img->cambiarNombre()) {
            //echo "\nNombre cambiado";
        }
        if ($img->copia()) {
            //echo "  Archivo subido";
        }
    }

    $ruta = $img->destino . "/" . $img->nombre;
    return $ruta;
}

/**
 * Funcion que inserta una funcion en JavaScript para redireccionar la pagina
 */
function redireccionar($path = "index.php") {
    echo "<script language='JavaScript' type='text/javascript'>";
    echo "function redireccionar(){";
    echo "location.href='" . $path . "';}";
    echo "setTimeout ('redireccionar()', 1)";
    echo "</script>";
}


?>                           
