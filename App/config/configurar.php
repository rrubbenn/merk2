<?php
    //**Desarollo */
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);

    error_reporting(E_ALL);
    //**Desarollo */

    // AUMENTAR EL PESO DE LOS ARCHIVOS PERMITIDOS
    $size_limit_mb = 20;
    $size_limit_bytes = $size_limit_mb * 1024 * 1024; // Convertir de MB a bytes

    // Establecer la configuración en tiempo de ejecución
    ini_set('upload_max_filesize', $size_limit_mb . 'M');
    ini_set('post_max_size', $size_limit_mb . 'M');

    //Ruta de la aplicacion
    define('RUTA_APP', dirname(dirname(__FILE__)));
    
    //Ruta url
    
    //  $serverEngine = $_SERVER["SERVER_SOFTWARE"];
     
     
     


    define('RUTA_URL_STATIC', 'https://merk2/public');
    define('RUTA_URL', 'https://merk2'); 


    DEFINE('NOMBRE_SITIO', 'PROYECTO');

    //Configuración de la Base de Datos
    define('DB_HOST', '192.168.100.4');
    define('DB_USUARIO', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NOMBRE', 'proyecto');
