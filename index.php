<?php

require_once 'config.php';

session_start();

if (!(isset($_GET['c']) && isset($_GET['a']))) {
    $controller = 'HomeController';
    $action = 'getIndex';
} else {
    $controller = $_GET['c'];
    $action = $_GET['a'];
}



if (!file_exists(CONTROLLER . "$controller.php")) {
    exit(0);
}



include_once(CONTROLLER . "$controller.php");

// vérification que la classe existe
if (class_exists($controller)) {
    try {

        // test sur la méthode
        $reflection = new ReflectionMethod($controller, $action);

        // création du tableau des paramètres pour la méthode
        $pass = array();
        foreach ($reflection->getParameters() as $param) {
            if (isset($_REQUEST[$param->getName()])) { // on cherche une valeur dans la requête HTTP 
                $pass[] = $_REQUEST[$param->getName()];
            } else { // sinon, on regarde si on a une valeur par défaut  ex : public function post($a,$b,$c = 1){}
                //$pass[] = $param->getDefaultValue();
            }
        }

        // on instancie l'objet
        $obj = new $controller;

        // on invoque la méthode $action sur l'objet $obj avec les paramètres dans $pass 
        $reflection->invokeArgs($obj, $pass);
    } catch (Exception $e) {
        // si on a une erreur, on redirige vers la page 404 / 403 ..... 
    }
} else {
    // si la classe controller n'existe pas
    // on redirige vers la page 404 / 403 ..... 
}






     
     