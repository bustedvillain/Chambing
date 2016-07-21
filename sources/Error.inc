<?php

//   Date             Modified by         Change(s)
//   2013-09-24         HMP                 1.0

class Error {
    #die(Error::error_mysql(mysqli_connect_errno(),mysqli_connect_error(),__FILE__,__LINE__,__CLASS__,__FUNCTION__,__METHOD__,$_SERVER['PHP_SELF'],$this->sql));

    static function error_mysql($error, $archivo, $linea, $clase, $funcion, $metodo, $script, $sql) {

        echo "<h1>Oops, ha ocurrido un problema en el Sistema de Chambing.mx! :(</h1>";
        print ("<p>Anota este c&oacute;digo de error y ponte en contacto con los chambingueros que administran este lujoso sistema.</p>");
        print ("<p>Contacto: app@chambing.mx</p>");

        $cuerpo = "<p>ERROR. " . $error . "</p>";
        $cuerpo .= "<p>Error enviado por: " . $archivo . "</p>";
        $cuerpo .= "<p>Linea: " . $linea . "</p>";
        $cuerpo .= "<p>Clase: " . $clase . "</p>";
        $cuerpo .= "<p>Funcion: " . $funcion . "</p>";
        $cuerpo .= "<p>Metodo: " . $metodo . "</p>";
        $cuerpo .= "<p>SQL: " . $sql . "</p>";
        $cuerpo .= "<p>Error generado en: " . $script . "</p>";
        echo $cuerpo;
        exit();
    }

}

?>