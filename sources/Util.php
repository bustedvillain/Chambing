<?php

abstract class Util {

    /**
     * Recibe cadena y le aplica htmlentities
     * @param type $var
     * @return type
     */
    static function __($var) {
        $dato = htmlentities($var, ENT_QUOTES, 'UTF-8');
        $dato = strip_tags($dato);
        $dato = stripslashes($dato);
        return trim(addslashes($dato));
    }

    /**
     * Valida un dato que no sea nulo
     * @param type $dato
     * @return boolean
     */
    function val($dato) {
        if ($dato && isset($dato) && $dato != null) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Recibe una cadena y la recorta a la cantidad de letras especificas
     * @param type $txt
     * @param type $cuantos
     * @return type
     */
    static function reduceTxt($txt, $cuantos) {
        $t = utf8_encode(html_entity_decode($txt));
        if ($cuantos < strlen($txt)) {
            for ($i = $cuantos; $i > $cuantos - 10; $i--) {
                if (@strcmp($t{$i}, " ") == 0)
                    break;
            }
            return substr($t, 0, $i) . " ...";
        }
        else {
            return $t;
        }
    }

    /**
     * Retorna la IP
     * @return type
     */
    static function obtenIP() {
        if (isset($_SERVER)) {
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isSet($_SERVER["HTTP_CLIENT_IP"])) {
                $realip = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $realip = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } else if (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }
        return $realip;
    }

    /**
     * Función que valida si un correo es valido
     * @param type $email
     * @return boolean
     */
    static function esEmail($email = "") {
        $car = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
        if (strpos($email, '@') !== FALSE && strpos($email, '.') !== FALSE) {
            if (preg_match($car, $email)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Función que limpia correos en formato email
     * @param type $email
     * @return type
     */
    static function limpiaEmail($email) {
        $limpio = preg_replace('/[^a-z0-9+_.@-]/i', '', $email);
        return strtolower(_($limpio));
    }

    /**
     * Función que obtiene fecha en 2013-03-31
     * a 31 de Marzo de 2013
     * @global type $mes
     * @param type $fecha
     * @return type
     */
    static function obtenFecha($fecha) {
        global $mes;
        $txt = explode("-", $fecha);
        return $txt[2] . " de " . $mes[(int) $txt[1]] . " de " . $txt[0];
    }

    /**
     * Obtiene la fecha actual
     * @return type
     */
    static function obtenHoy() {
        $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        return $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
    }

    /**
     * Obtiene el dominio email
     * @param type $email
     * @return type
     */
    static function dominioDeEmail($email = NULL) {
        if (!empty($email)) {
            $email = strtolower($email);
            return substr(strrchr($email, '@'), 1);
        } else {
            exit("<p>No se ha proporcionado un dominio para procesar.");
        }
    }

    /**
     * Función que verifica si existe el dominio de un correo
     * @param type $dominio
     * @return type
     */
    static function existeDominioDeEmail($dominio = NULL) {
        if (!empty($dominio)) {
            $existe = FALSE;
            $url = "http://" . $dominio;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            $existe = (curl_errno($ch)) ? TRUE : FALSE;
            curl_close($ch);
            return $existe;
        } else {
            exit("<p>NO se ha proporcionado una direccion de email para extraer su extension</p>");
        }
    }

    /**
     * Genera password aleatorio.
     * $longitud define el tamaño del password
     * @param type $longitud
     * @return type
     */
    static function generaPwd($longitud = 6) {
        return substr(sha1(uniqid(rand())), 0, $longitud);
        //return chr(rand(33,48)).substr(sha1(uniqid(rand())),0,$longitud).chr(rand(33,48));
    }

    /**
     * Función que encripta una cadena bajo sha1
     * @param type $txt
     * @param type $x
     * @return type
     */
    static function encriptaTxt($txt, $x = "\?'#~") {
        return sha1($txt . $x);
    }

    /**
     * Genera URL
     * @param type $txt
     * @return type
     */
    static function generaUrl($txt) {
        $ca = array("&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "&ntilde;", "&Ntilde;");
        $sa = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N");
        $txt = str_replace($ca, $sa, trim($txt));
        $txt = str_replace(" ", "-", $txt);
        return strtolower(preg_replace("/[^a-z0-9-]/i", "", $txt));
    }

    /**
     * Función que encodea una cadena a HTML 
     * @param type $txt
     * @return type
     */
    static function HTML($txt) {
        return utf8_encode(html_entity_decode($txt));
    }

    /**
     * Función que quita el código HTML de una cadena
     * @param type $etiqueta
     * @return type
     */
    static function quitarHTML($etiqueta) {
        return strip_tags(trim($etiqueta));
    }

    /*
     * @param $valor - numero flotante
     * @param $moneta - tipo de moneda [pesoMX, dolar, libra, yen, franco, lira, peseta, euro]
     */

    static function formatoPrecio($valor, $moneda) {
        $precio = "";
        switch ($moneda) {
            case "pesoMX": $precio = "&#36; ";
                break;
            case "dolar": $precio = "USD &#36; ";
                break;
            case "libra": $precio = "&#163; ";
                break;
            case "yen": $precio = "&#165; ";
                break;
            case "franco": $precio = "&#8355; ";
                break;
            case "lira": $precio = "&#8356; ";
                break;
            case "peseta": $precio = "&#8359; ";
                break;
            case "euro": $precio = "&#128; ";
                break;
            default: exit("Moneda no encontrada");
                break;
        }
        return $precio . number_format($valor, 2, '.', ',');
    }

    /**
     * Codifica un mail a utf8
     * @param type $email
     * @param type $tipo
     * @return string
     */
    static function codificarMail($email, $tipo = "utf") {
        switch ($tipo) {
            default:
            case "utf":
                $mailCodificado = "";
                for ($i = 0; $i < strlen($email); $i++) {
                    if (rand(0, 1) == 0) {
                        //ord($var) - Devuelve el valor ASCII de un entero. 
                        $mailCodificado .= "&#" . (ord($email[$i])) . ";";
                    } else {
                        //dechex($var) - Devuelve la cadena hexadecimal de un n?mero
                        $mailCodificado .= "&#X" . dechex(ord($email[$i])) . ";";
                    }
                }
                return $mailCodificado;
                break;
            case "@":
                $original = array('@', '.');
                $sust = array("[arroba]", "[punto]");
                return str_replace($original, $sust, $email);
                break;
            case "js":
                return "<script language='javascript' type='text/javascript' >\n
			   				document.write(\"$email\");\n
		       			< /script>";
                break;
        }
    }

    /**
     * Función oculta texto de una cadena
     * cadena = *******
     * @param type $txt
     * @param type $car
     * @return type
     */
    static function ocultaTxt($txt, $car = '*') {
        return str_repeat($car, strlen($txt));
    }

    /**
     * Genera una letra aleatoria
     * @return type
     */
    static function letraAleatoria() {
        return chr(rand(97, 122));
    }

    /**
     * Genera un caracter aleotorio
     * @return type
     */
    static function caracterAleatorio() {
        return chr(rand(33, 48));
    }

    /**
     * Genera token
     * @return type
     */
    static function token() {
        $time = microtime();
        $time = explode(" ", $time);
        $microtime = $time[1] . substr($time[0], 2);
        return $microtime . self::letraAleatoria() . self::letraAleatoria() . self::letraAleatoria() . rand(1000, 100000) . self::letraAleatoria() . self::letraAleatoria() . rand(1000, 900000);
    }

    /*
     * Obtiene el tamaño de un archivo
     * @param $filesize en kilobytes
     */

    static function tamanoArchivo($filesize) {
        if (is_numeric($filesize)) {
            $decr = 1024;
            $step = 0;
            $prefix = array('Kbs', 'Mb', 'Gb', 'Tb', 'Pb');

            while (($filesize / $decr) > 0.9) {
                $filesize = $filesize / $decr;
                $step++;
            }
            return round($filesize, 2) . ' ' . $prefix[$step];
        } else {
            return 0;
        }
    }

    /**
     * Verifica la existencia de un directorio
     * @param type $directorio
     * @return boolean
     */
    static function existeDirectorio($directorio) {
        if (is_dir(ABSPATH . $directorio) && is_readable(ABSPATH . $directorio)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Crea un directorio baje una ruta
     * @param type $directorio
     * @return boolean
     */
    static function creaDirectorio($directorio) {
        if (mkdir(ABSPATH . $directorio, 0777, TRUE)) {
            echo (RESULTTRACE) ? "<p>El directorio " . ABSPATH . $directorio . DS . ", ha sido creado correctamente</p>" : "";
            return TRUE;
        } else {
            exit("<p>El directorio &quot;$directorio&quot; no puede ser creado, intente nuevamente.</p>");
        }
    }

    #falta trabnajarla
    /* function eliminaArchivo($archivo)
      {
      return unlink($file);
      }

      function eliminarcarpeta($file,$prof=""){
      return rmdir($file);
      }
     *
     * */

    /**
     * devuelve un string encriptado en el algoritmo nCrypt
     * @param type $string
     * @return string
     */
    function nCrypt($string) {
        $string = Util::fixEncoding($string);
        $string = htmlentities($string, ENT_QUOTES, "UTF-8");
        $arrayLetras = Util::arrayLetras();
        $arrayNCrypt = Util::arrayNCrypt();
        $arrTexto = str_split($string, 1);
        $strCrypted = "";
        foreach ($arrTexto as $a) {
            if (in_array($a, $arrayLetras)) {
                $index = array_search($a, $arrayLetras);
                $strCrypted = $strCrypted . $arrayNCrypt[$index];
            } else {
                $strCrypted = $strCrypted . "$!" . $a . "}/";
            }
        }
        return $strCrypted;
    }

    /**
     * Arregla el encoding
     * @param type $in_str
     * @return type
     */
    function fixEncoding($in_str) {
        $cur_encoding = mb_detect_encoding($in_str);
        if ($cur_encoding == "UTF-8" && mb_check_encoding($in_str, "UTF-8"))
            return $in_str;
        else
            return utf8_encode($in_str);
    }

    /**
     * Devuelve string desencryptado que haya sido encryptado en nCrypt
     * @param type $string
     * @return type
     */
    function nDCrypt($string) {
        $arrayLetras = Util::arrayLetras();
        $arrayNCrypt = Util::arrayNCrypt();
        $arrTexto = str_split($string, 5);
        $strDeCrypted = "";
        foreach ($arrTexto as $a) {
            if (in_array($a, $arrayNCrypt)) {
                $index = array_search($a, $arrayNCrypt);
                $strDeCrypted = $strDeCrypted . $arrayLetras[$index];
            } else {
                $strDeCrypted = $strDeCrypted . substr($a, 2, 1);
            }
        }
        return html_entity_decode($strDeCrypted, ENT_QUOTES, "UTF-8");
    }

    /**
     * Devuelve un arreglo de letras (alfaveto de nCrypt)
     * @return type
     */
    function arrayLetras() {
        return array(
            "a", "b", "c", "d", //1
            "e", "f", "g", "h", //2
            "i", "j", "k", "l", //3
            "m", "n", "ï¿½", //4
            "o", "p", "q", "r", //5
            "s", "t", "u", "v", //6
            "w", "x", "y", "z", //7
            "A", "B", "C", "D", //8
            "E", "F", "G", "H", //9
            "I", "J", "K", "L", //10
            "M", "N", "ï¿½", //11
            "O", "P", "Q", "R", //12
            "S", "T", "U", "V", //13
            "W", "X", "Y", "Z", //14
            "1", "2", "3", "4", //15
            "5", "6", "7", "8", //16
            "9", "0", //17
            "ï¿½"//18
        );
    }

    /**
     * Devuelve el alfabeto del Ncrypt (encriptado)
     * @return type
     */
    function arrayNCrypt() {
        return arraY(
            "86y9a", ",wx7/", "@bEsV", "5E-h[", //1
            "uxuH=", "Dak8a", "F45c4", "sR*VY", //2
            "dUKp9", "ysmi,", "+vF}N", "Sm@FW", //3
            "%OvRt", "9-59U", "=r4N%", //4
            "6JeU]", "#:.A4", "kxr)s", "556fD", //5
            "xPM_6", "QSEAm", "_Es6p", "zHFL#", //6
            "X-1HL", "xak#G", "JS@5u", "=*[F}", //7
            "d[Q]8", "@UU?y", "Hxz!U", "Q?.-u", //8
            "+G.4s", "wB58)", "XcD)A", "aS1RX", //9
            "7tAzc", "61:y@", "dbG[h", "X%dUJ", //10
            "JfKuy", "q([sy", "-?_4N", //11
            "Wp7L(", "}dbd0", "C7}CV", "Qf[eP", //12
            "MrPZi", "y/2nw", "/x-7c", "@pC2d", //13
            "E<iCy", "9xd]|", "tmn:m", "K450v", //14
            "9PS%i", "7]{W=", "o6#{4", "@+@y1", //15
            "hsvZy", "n6ib2", "Zm*}V", "o2esF", //16
            "5Du3=", "w,AXt", //17
            "!-_45"//18
        );
    }

}

?>