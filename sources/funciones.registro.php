<?php

/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 18/07/2016
 * Descripción: Archivo para manejar funciones del registro de usuarios
 */

/**
 * Funcion que obtione el catalogo de nacionalidades cargadas al sistema
 */
function nationalities() {
    require_once 'Query.inc';
    $query = new Query();
    $nationalities = $query->select("*", "nationality", "status=1", "order by nationality");

    echo <<<select
            <select class='be-custom-select'>
            <option value="" disabled selected>
                Nacionalidad
            </option>
select;

    if (val($nationalities)) {
        foreach($nationalities as $nat){
            echo "<option value='$nat->nationality_id'>$nat->nationality</option>";
        }
        echo "</select>";
    } else {
        echo <<<select
            <option value="" disabled>
                No hay nacionalidades disponibles
            </option>
         </select>
select;
    } 
}

/**
 * Funcion que despliega select con lugares de residencia dentro de la republica mexicana
 */
function residence() {
    require_once 'Query.inc';
    $query = new Query();
    $residence = $query->select("*", "residence_location", "1=1", "order by location");

    echo <<<select
            <select class='be-custom-select'>
            <option value="" disabled selected>
                Lugar de Residencia
            </option>
select;

    if (val($residence)) {
        foreach($residence as $res){
            echo "<option value='$res->residence_id'>$res->location</option>";
        }
        echo "</select>";
    } else {
        echo <<<select
            <option value="" disabled>
                No hay nacionalidades disponibles
            </option>
         </select>
select;
    } 
}
