# LibreriaPHPComprobaciones
- Es una librería de uso OpenSource desarollada por mi. Todo el mundo puede colaborar.

- Son diversas funciones que devuelven datos o comprueban datos.

- Todas las funciones están sujetas a cambios, ya sean mios o de aportes de la gente.

<b>Intrucciones</b>: 

- Incluir estas lineas al principio de vuestros archivos Php para cargar la librería o cualquier clase con el formato "class.$clase.php"
- La librería deberéis meterla en un directorio llamado 'classes' sin comillas para que funcione correctamente.

//Autoload//<br/>
spl_autoload_register('myAutoloader');

function myAutoloader($class) {<br/>
    include 'classes./class.'.$class.'.php';<br/>
}

- Luego simplemente utilizar la clase LibreriaValidaciones::Funcion($datos)
ejemplo:
<div>
    $ejemploNombre = "Pedro";
    $ejemploNombreMal = "Pedro2";
    
    ejemplo($ejemploNombre); //Mostrará 'Nombre Bien'
    ejemplo($ejemploNombreMal); //Mostrará 'Nombre Mal'
    
    function ejemplo($nombre){
        if(LibreriaValidaciones::compruebaNombre($nombre)){
            echo ('Nombre Bien');
        }else{
            echo ('Nombre Mal');
        }
    }
</div>

<b>Funciones</b><br/><div>
    // ###### INICIO FUNCIONES DE COMPROBACIÓN DE CAMPOS ######//<br/>
    
    //Función que comprueba si un nombre esta bien compuesto//
    function compruebaNombre($nombre)

    //Función que comprueba si un apellido dado es correcto//
    function compruebaApellido($apellido)

    //Comprueba si una fecha es mayor que hoy//
    function compruebaFechaMayorHoy($fecha)

    //Comprueba si una fecha esta bien formada (aaaa-mm-dd) o (dd-mm-aaaa si el cambo $Input esta en true)//
    function compruebaFechaBBDD($fecha, $input)

    //Función que comprueba un DNI dado//
    function compruebaDNI($dni)
    
    //Función que comprueba una hora dada formato (hh:mm:ss)//
    function compruebaHora($hora)
    
    // ###### FIN FUNCIONES DE COMPROBACIÓN DE CAMPOS ######//<br/>

    //-----------------------------------------------------------//

    // ###### INICIO FUNCIONES QUE APORTAN UTILIDADES VARIADAS ######//
    
    /* Función que elimina los espacios en blanco al principio y al final de una cadena
     * $principio es un booleano, true corta por el principio y $final es un booleano true corta por el final
     * Si ambos son False corta por ambos lados */
    function quitarEspacios($cadena, $principio, $final){

    //Función que suma $dias a una $fecha dada (formato aaaa-mm-dd)//
    function sumaDias($fecha, $dias)

    //Función que suma $meses a una $fecha dada (formato aaaa-mm-dd)//
    function sumaMeses($fecha, $meses)

    //Función que suma $anyos a una $fecha dada (formato aaaa-mm-dd)//
    function sumaAnyos($fecha, $anyos)

    //Función que devuelve el día de una fecha dada(formato aaaa-mm-dd o aaaa/mm/dd)//
    function getDia($fecha)

    //Función que devuelve el Mes de una fecha dada(formato aaaa-mm-dd o aaaa/mm/dd)//
    function getMes($fecha)

    //Función que devuelve el Año de una fecha dada(formato aaaa-mm-dd o aaaa/mm/dd)//
    getAnyo($fecha)

    //Función que me devuelve la longitud de un String dado//
    getLongitud($cadena)
    
    // ###### Fin FUNCIONES QUE APORTAN UTILIDADES VARIADAS ######//
</div>
<b>Versiones</b><br/>
Version 1.0
