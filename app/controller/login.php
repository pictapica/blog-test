<?php
         

include(MODEL . 'userManager.php');

$userManager = new UserManager();

if (isset($_POST['connect'])) {
    if (empty($_POST['pseudo']) && empty($_POST['password'])) {

        $mess = setFlash('Vous avez oublié de vous identifier...', 'warning');
            header('refresh: 2; login');
    }
    if (empty($_POST['pseudo'])) {
        
        $mess = setFlash('Vous avez oublié votre pseudo... ', 'warning');
        header('refresh : 2; url:../view/frontend/login.php?message=no_pseudo');
        exit();
    } elseif (empty($_POST['password'])) {
        
        $mess = setFlash('Vous avez oublié votre mot de passe... ', 'warning');
        header('refresh : 2; url:../view/frontend/login.php?message=no_password');
        exit();
    } else {

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pwdsecure = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Hachage du mot de passe
        $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($pwdsecure == $pass_hash) {
            //vérification des identifiants
            $result = $userManager->connect($_POST['pseudo'], $_POST['password']);
            if (!isset($result)) {
                header('Refresh:2, url=../view/frontend/login.php?message=internal_error');
                echo'Mauvais identifiant ou mot de passe !';
            } else {
                session_start();
                $_SESSION['id'] = $result['user_id'];
                $_SESSION['pseudo'] = $result['pseudo'];
                echo 'Vous êtes connecté !';

                header('Location: controller/backend.php');
            }
        }
}
}
include_once(VIEW . '/frontend/login.php');
