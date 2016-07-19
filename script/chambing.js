/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 18 de Julio de 2016
 * Descripción: Archivo de funciones jQuery para Chambing.mx
 */
$(document).ready(function(){
    
    $("#reg_birthday").prop('max', function(){
        console.log(new Date().toJSON());
        return new Date().toJSON().split('T')[0];
    });
});


