<?php

require_once("../model/UserManager.php");
require_once("../model/User.php");

$manager = new UserManager();
$user = new User();



if (!isset($_POST['firstname']) OR ! isset($_POST['name']) OR ! isset($_POST['pseudo'])OR ! isset($_POST['email']) OR ! isset($_POST ['password']) OR !isset($_POST['confirm_pass'])) {

    header('Location: ../view/frontend/login.php?message=no_data');
    exit();
}

// Sécurisation des données
$firstname = htmlspecialchars($_POST['firstname']);
$name = htmlspecialchars($_POST['name']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['email']);
$password = $_POST['password'];
$confirm_pass = $_POST['confirm_pass'];

// Hachage du mot de passe
$pwdsecure = password_hash($_POST['password'], PASSWORD_DEFAULT);

//Validation de l'email
if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {

    header('Location: ../view/frontend/login.php?message=bad_email');
    exit();
}
//Vérification du mot de passe
if ($password != $confirm_pass) {
    header('Location: ../view/inscription.php?message=no_password_confirmation');
    exit();
}
if (save($firstname,$name, $pseudo,$email,$pwdsecure)) {
    // Redirection du visiteur vers la page de connexion
    header('Location: ../view/frontend/login.php');
} else {
    // Redirection du visiteur vers la page de connexion
    header('Location: ../view/inscription.php?message=internal_error');
}

