<?php

//   Date             Modified by         Change(s)
//   2013-09-24         HMP                 1.1

require_once ("Config.php");
require_once 'Error.inc';

class Conexion {

    private $id = null;

    function __construct() {
        $this->id = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
        if (isset($this->id)) {
            if (mysql_select_db(MYSQL_NAME, $this->id))
                return $this->id;
            else
                (Error::error_mysql(mysql_errno() . ": " . mysql_error(), __FILE__, __LINE__, __CLASS__, __FUNCTION__, __METHOD__, $_SERVER['PHP_SELF'], "Error al Conectar a la Base de Datos"));
        } else
            (Error::error_mysql(mysql_errno() . ": " . mysql_error(), __FILE__, __LINE__, __CLASS__, __FUNCTION__, __METHOD__, $_SERVER['PHP_SELF'], "Error al Conectar a la Base de Datos"));
    }

    /**
     * Destrucción del objeto Conexión
     * @return type
     */
    function __destruct() {
        if ($this->id) {
            return @mysql_close($this->id);
        }
    }

    /**
     * Obtner ID Conexión
     * @return type
     */
    function getIdConexion() {
        return $this->id;
    }

}

?>