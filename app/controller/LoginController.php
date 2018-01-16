<?php

include(MODEL . 'UserManager.php');

class LoginController {

    public function login() {
        $pseudoValid = "JeanJean";
        $passwordValid = "Alaska2017";

        if (isset($_POST ['connect'])) {
            if ($pseudoValid == $_POST['pseudo'] && $passwordValid == $_POST['password']) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $password = htmlspecialchars($_POST['password']);


                $user = new UserManager();
                $result = $user->connect($pseudo, $password);
                $_SESSION['pseudo'] = $pseudo;

                require (VIEW . '/backend/admin.php');
                //header('Location : index.php?c=AdminController&amp;a=getIndex');
                exit(0);
            } else {
                echo'nope';
            }
        }
    }

    public function logout() {

        session_unset();
        session_destroy();

        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $posts = $postManager->getPosts();

        $mess = setFlash("A bientôt !", "Vous êtes maintenant déconnecté", "success");

        require(VIEW . 'frontend/listPostsView.php');
        //header('Location : index.php?c=HomeController&a=getIndex');
        //exit(0);
    }

}
