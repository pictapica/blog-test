<?php

require_once 'config.php';


$path = $_REQUEST;
$url = $_SERVER['QUERY_STRING'];

session_start();

$parseurl = parse_url($url);
$param = explode("-", $path['url']);


if (stristr($url, 'welcome')) {
    include (VIEW . '/frontend/welcome.php');
}
elseif (stristr($url, 'index')) {
    include (CONTROLLER . 'index.php');
} elseif (stristr($url, 'login')) {
    include (VIEW . '/frontend/about.php');
} elseif (stristr($url, 'login')) {
    include(CONTROLLER . 'login.php');
}

// Destruction de session
elseif (stristr($url, 'logout')) {
    include(CONTROLLER . 'logout.php');
}




     
     