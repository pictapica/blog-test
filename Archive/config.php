<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('MODEL', ROOT . '/app/model/');
define('VIEW', ROOT . '/app/view/');
define('HOST', 'http://' . $_SERVER['HTTP_HOST'] );
define('CONTROLLER', ROOT . '/app/controller/');

function chargerClasse($class) {
    if (file_exists(MODEL . $class . '.php')) {
        include_once (MODEL . $class . '.php');
    } elseif (file_exists(CONTROLLER . $class . '.php')) {
        include_once (CONTROLLER . $class . '.php');
    }
}

spl_autoload_register('chargerClasse');

include (CONTROLLER . 'functions.php');
