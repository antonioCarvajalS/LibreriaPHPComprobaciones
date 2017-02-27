# LibreriaPHPComprobaciones
- Es una librería de uso OpenSource desarollada por mi. Todo el mundo puede colaborar.

- Son diversas funciones que devuelven datos o comprueban datos.

- Todas las funciones están sujetas a cambios, ya sean mios o de aportes de la gente.

Intrucciones: 

- Incluir estas lineas al principio de vuestros archivos Php para cargar la librería o cualquier clase con el formato "class.$clase.php"
- La librería deberéis meterla en un directorio llamado 'classes' sin comillas para que funcione correctamente.

//Autoload//
spl_autoload_register('myAutoloader');

function myAutoloader($class) {
    include 'classes./class.'.$class.'.php';
}
