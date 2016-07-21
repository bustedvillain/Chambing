<?php

/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 18/07/2016
 * Descripción: Archivo para manejar funciones del registro de usuarios
 */

/**
 * Funcion que obtione el catalogo de nacionalidades cargadas al sistema
 */
function nationalitiesComboBox() {
    echo <<<select
            <select class='be-custom-select'>
            <option value="" disabled selected>
                Nacionalidad
            </option>
select;
    $nationalities = getNationalities();
    if (Util::val($nationalities)) {
        foreach ($nationalities as $nat) {
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
function residenceComboBox() {
    
    $residence = getResidences();

    echo <<<select
            <select class='be-custom-select'>
            <option value="" disabled selected>
                Lugar de Residencia
            </option>
select;

    if (Util::val($residence)) {
        foreach ($residence as $res) {
            echo "<option value='$res->residence_id'>$res->location</option>";
        }
        echo "</select>";
    } else {
        echo <<<select
            <option value="" disabled>
                No hay ciudades de residencia disponibles
            </option>
         </select>
select;
    }
}

/**
 * Funcion que despliega select con lugares de residencia dentro de la republica mexicana
 */
function professionComboBox() {
    
    $professions = getProfessions();

    echo <<<select
            <select class='be-custom-select'>
            <option value="" disabled selected>
                Profesi&oacute;n
            </option>
select;

    if (Util::val($professions)) {
        foreach ($professions as $prof) {
            echo "<option value='$prof->profession_id'>$prof->profession</option>";
        }
        echo "</select>";
    } else {
        echo <<<select
            <option value="" disabled>
                No hay profesiones disponibles
            </option>
         </select>
select;
    }
}
