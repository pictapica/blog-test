<?php

define ('ROOT', $_SERVER['DOCUMENT_ROOT'].'/projet3/');
    define ('MODEL', ROOT . 'app/model/');
    define ('VIEW', ROOT . 'app/view/');
    define ('HOST','http://' . $_SERVER['HTTP_HOST'] . '/projet3/');
    define ('CONTROLLER', ROOT . 'app/controller/');
    
    
function chargerClasse($classe)
    {
        require MODEL.$classe.'.php';
    }
    spl_autoload_register('chargerClasse');
    
    include (CONTROLLER.'functions.php');