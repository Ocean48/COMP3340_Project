<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start(); //turn on session

    // Assign file paths to PHP constants
    // __FILE__ returns the current path to this file
    // dirname() returns the path to the parent directory
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . '/admin');
    define("SHARED_PATH", PRIVATE_PATH . '/shared');
    

    // Assign the root URL to a PHP constant
    // * Do not need to include the domain
    // * Use same document root as webserver
    // * Can set a hardcoded value:
    // define("WWW_ROOT", '/~kevinskoglund/globe_bank/admin');
    // define("WWW_ROOT", '');
    // * Can dynamically find everything in URL up to "/admin"
    $admin_end = strpos($_SERVER['SCRIPT_NAME'], '/admin') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $admin_end);
    define("WWW_ROOT", $doc_root);


    require_once('functions.php');
    require_once('database.php');
    require_once('query_functions.php');
    require_once('validation_functions.php');
    require_once('auth_functions.php');

    $db = db_connect();

?>