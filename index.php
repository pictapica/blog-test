<?php

require_once 'config.php';



$path = $_REQUEST;
$url = $_SERVER['QUERY_STRING'];

session_start();

$parseurl = parse_url($url);
$param = explode("-", $path['url']);

// ex : projet3-test/index.php?c=comments&a=report&id=3

$controller = $_GET['c'];
$action = $_GET['a'];


// $_GET[.......] id , label, ;... 

if(file_exists(CONTROLLER . '$controller')){
exit(0);

// ou on renvoie vers une page d'erreur 
}else {
     
        }



include_once(CONTROLLER . '$controller');

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
			$pass[] = $param->getDefaultValue();
	    }
	}

	// on instancie l'objet
	$obj = new $controller;

	// on invoke la méthode $action sur l'objet $obj avec les paramètres dans $pass 
	$reflection->invokeArgs($obj, $pass);
	
    } catch (Exception $e) {
		// si on a une erreur, on redirige vers la page 404 / 403 ..... 
    }
} else {
	// si la classe controller n'existe pas
	// on redirige vers la page 404 / 403 ..... 
}






     
     