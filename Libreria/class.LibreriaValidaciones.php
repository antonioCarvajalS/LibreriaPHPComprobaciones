<?php

//Librería hecha por Antonio Carvajal//
//Version 1.0//
class LibreriaValidaciones{

    // ###### INICIO FUNCIONES DE COMPROBACIÓN DE CAMPOS ######//

    //Función que comprueba si un nombre esta bien compuesto//
    public static function compruebaNombre($nombre){
        $result = false;
        $nombre = self::quitarEspacios($nombre, false, false);

        $pattern="/^[A-Za-ZñÑáéíóúÁÉÍÓÚ]+$/";

        if(preg_match($pattern,$nombre)  && strlen($nombre) >= 2) {
            $result = true;
        }

        return $result;
    }

    //Función que comprueba si un apellido dado es correcto//
    public static function compruebaApellido($apellido){
        $result = false;
        $nombre = self::quitarEspacios($apellido, false, false);

        $pattern="/^([A-Za-zñÑáéíóúÁÉÍÓÚ]+[ ]?)+$/";

        if(preg_match($pattern,$nombre)  && strlen($apellido) >= 2) {
            $result = true;
        }

        return $result;
    }

    //Comprueba si una fecha es mayor que hoy//
    public static function compruebaFechaMayorHoy($fecha){
        $result = false;
        trim($fecha);

        $trozos = explode ("-", $fecha);

        if(count($trozos) != 3){
            $trozos = explode ("/", $fecha);
        }

        if(count($trozos) == 3) {
            $año = $trozos[0];
            $mes = $trozos[1];
            $dia = $trozos[2];

            //Compruebo que las fechas sean correctas. Miro que la fecha sea mayor o igual que hoy//
            if ((checkdate($mes, $dia, $año) && $año > date("Y")) || (checkdate($mes, $dia, $año) && $año == (int)date("Y") &&
                    $mes > (int)date("m") || (checkdate($mes, $dia, $año) && $año == (int)date("Y") && $mes == (int)date("m") && $dia >= (int)date("d")))) {
                $result = true;
            }
        }

        return $result;
    }

    //Comprueba si una fecha esta bien formada (aaaa-mm-dd) o (dd-mm-aaaa si el cambo $Input esta en true)//
    public static function compruebaFechaBBDD($fecha, $input){
        $result = false;
        trim($fecha);

        $trozos = explode ("-", $fecha);

        if(count($trozos) != 3){
            $trozos = explode ("/", $fecha);
        }

        if(count($trozos) == 3 && !$input){
            $anyo = $trozos[0];
            $mes = $trozos[1];
            $dia = $trozos[2];

            //Compruebo que las fechas sean correctas. Miro que la fecha sea mayor o igual que hoy//
            if ((checkdate($mes, $dia, $anyo))) {
                $result = true;
            }
        }else if(count($trozos) == 3 && $input){
            $dia = $trozos[0];
            $mes = $trozos[1];
            $anyo = $trozos[2];

            //Compruebo que las fechas sean correctas. Miro que la fecha sea mayor o igual que hoy//
            if ((checkdate($mes, $dia, $anyo))) {
                $result = true;
            }
        }

        return $result;
    }

    //Función que comprueba un DNI dado//
    public static function compruebaDNI($dni){
        $result = false;
        trim($dni);
        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);

        if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
            $result = true;
        }

        return $result;
    }

	//Función que comprueba una hora dada formato (hh:mm:ss)//
    public static function compruebaHora($hora){
        $result = false;
        $pattern="/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])[\:]([0-5][0-9])$/";

        if(preg_match($pattern,$hora)) {
            $result = true;
        }

        return $result;
    }
    // ###### FIN FUNCIONES DE COMPROBACIÓN DE CAMPOS ######//


    // ###### INICIO FUNCIONES QUE APORTAN UTILIDADES VARIADAS ######//

    /* Función que elimina los espacios en blanco al principio y al final de una cadena
     * $principio es un booleano, true corta por el principio y $final es un booleano true corta por el final
     * Si ambos son False corta por ambos lados */
    public static function quitarEspacios($cadena, $principio, $final){

        //Compruebo que tipo de función tengo qeu llamar//
        if($principio){
            $result = ltrim($cadena);
        }else if($final){
            $result = rtrim($cadena);
        }else{
            $result = trim($cadena);
        }

        return $result;
    }

    //Función que suma $dias a una $fecha dada (formato aaaa-mm-dd)//
    public static function sumaDias($fecha, $dias){
        $result = false;

        if(self::compruebaFechaBBDD($fecha, false)){;
            $nuevafecha = strtotime ( '+'.$dias.' day' , strtotime ( $fecha ) ) ;
            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

            $result = $nuevafecha;
        }

        return $result;
    }

    //Función que suma $meses a una $fecha dada (formato aaaa-mm-dd)//
    public static function sumaMeses($fecha, $meses){
        $result = false;

        if(self::compruebaFechaBBDD($fecha, false)){;
            $nuevafecha = strtotime ( '+'.$meses.' month' , strtotime ( $fecha ) ) ;
            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

            $result = $nuevafecha;
        }

        return $result;
    }

    //Función que suma $anyos a una $fecha dada (formato aaaa-mm-dd)//
    public static function sumaAnyos($fecha, $anyos){
        $result = false;

        if(self::compruebaFechaBBDD($fecha, false)){;
            $nuevafecha = strtotime ( '+'.$anyos.' year' , strtotime ( $fecha ) ) ;
            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

            $result = $nuevafecha;
        }

        return $result;
    }

    //Función que devuelve el día de una fecha dada(formato aaaa-mm-dd o aaaa/mm/dd)//
    public static function getDia($fecha){
        trim($fecha);
        $trozos = explode ("-", $fecha);

        if(count($trozos) != 3){
            $trozos = explode ("/", $fecha);
        }

        $result = $trozos[2];

        return $result;
    }

    //Función que devuelve el Mes de una fecha dada(formato aaaa-mm-dd o aaaa/mm/dd)//
    public static function getMes($fecha){
        trim($fecha);
        $trozos = explode ("-", $fecha);

        if(count($trozos) != 3){
            $trozos = explode ("/", $fecha);
        }

        $result = $trozos[1];

        return $result;
    }

    //Función que devuelve el Año de una fecha dada(formato aaaa-mm-dd o aaaa/mm/dd)//
    public static function getAnyo($fecha){
        trim($fecha);
        $trozos = explode ("-", $fecha);

        if(count($trozos) != 3){
            $trozos = explode ("/", $fecha);
        }

        $result = $trozos[0];

        return $result;
    }

    //Función que me devuelve la longitud de un String dado//
    public static function getLongitud($cadena){
        return strlen($cadena);
    }
    // ###### FIN FUNCIONES QUE APORTAN UTILIDADES VARIADAS ###### //

}