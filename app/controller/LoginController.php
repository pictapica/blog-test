<?php

include(MODEL . 'UserManager.php');

class LoginController {

    
    public function login($pseudo, $password) {

        $pseudo = htmlspecialchars($pseudo);
        
        if (!empty($pseudo) && !empty($password)) {
            //Hachage du mot de passe
            //$pass_hash = md5($_POST['password']);
            //if ($pwdSecure == $pass_hash) {
                $userManager = new UserManager();
                $result = $userManager->connect($pseudo, $password);
                if (!$result) {
                    header('Location : index.php?c=AdminController&a=getLogin&message=');//Ajouter message erreur
                    exit(0);
                } else {
                    session_start();
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['pseudo'] = $pseudo;
                    header('Location : index.php?c=AdminController&a=getIndex');
                    exit(0);
                }
            }

            include_once(VIEW . '/frontend/login.php');
            //Ajouter message erreur
        }
    }


