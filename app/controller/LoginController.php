<?php

include(MODEL . 'userManager.php');

class LoginController {

    public function login() {
        

        /**
          if (empty($_POST['pseudo']) && empty($_POST['password'])) {

          echo'Vous avez oublié de vous identifier...', 'warning';
          header('refresh: 2; login');
          }
          if (empty($_POST['pseudo'])) {

          echo'Vous avez oublié votre pseudo... ', 'warning';
          header('refresh: 2; url:../view/frontend/login.php?message=no_pseudo');
          exit();
          } elseif (empty($_POST['password'])) {

          echo 'Vous avez oublié votre mot de passe... ', 'warning';
          header('refresh: 2; url:../view/frontend/login.php?message=no_password');
          exit();
          } else {
         * */
        
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $password = ($_POST['password']);
        //$pwdsecure = md5($_POST['password']);

        if (!empty($pseudo) && !empty($password)){
        //Hachage du mot de passe
        // $pass_hash = md5($_POST['password']);
        //if ($pwdsecure == $pass_hash) {
            $userManager = new UserManager();
            $result = $userManager->connect($_POST['pseudo'], $_POST['password']);
            if (!isset($result)) {
                header('Refresh:2, url=index.php?c=AdminController&a=getLogin');
            } else {
                session_start();
                $_SESSION['id'] = $result['user_id'];
                $_SESSION['pseudo'] = $result['pseudo'];

                header('Location: index.php?c=AdminController&a=getIndex');
            }
        }
        

        include_once(VIEW . '/frontend/login.php');
    }

}
