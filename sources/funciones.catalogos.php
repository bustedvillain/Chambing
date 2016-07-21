<?php

/*
 * Autor: Jose Manue Nieto Gomez
 * Fecha: 20 de Julio de 2016
 * Objetivo: Crear funciones para realizar consultas sobre catalogos
 */

function getNationalities() {
    $query = new Query();
    $query->sql = "SELECT * FROM nationality WHERE status = 1 ORDER by nationality";
    $nationalities = $query->select();

    return $nationalities;
}

function getResidences(){
    $query = new Query();
    $query->sql = "SELECT * FROM residence_location ORDER by location";
    $residence = $query->select();
    
    return $residence;
}

function getProfessions(){
    $query = new Query();
    $query->sql = "SELECT * FROM profession WHERE status = 1 ORDER by profession";
    $residence = $query->select();
    
    return $residence;
}
