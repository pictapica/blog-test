<?php

include(MODEL . 'UserManager.php');

class LoginController {

    public function login() {

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $password = $_POST['password'];
        if (!empty($pseudo) && !empty($password)) {
            //Hachage du mot de passe
            //$pass_hash = md5($_POST['password']);
            //if ($pwdSecure == $pass_hash) {
                $userManager = new UserManager();
                $result = $userManager->connect($_POST['pseudo'], $_POST['password']);
                if (!$result) {
                    header('Refresh:2, url=index.php?c=AdminController&a=getLogin');
                } else {
                    session_start();
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['pseudo'] = $pseudo;
                    header('Location : index.php?c=AdminController&a=getIndex');
                }
            }

            include_once(VIEW . '/frontend/login.php');
        }
    }


