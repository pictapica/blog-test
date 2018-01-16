<?php

include(MODEL . 'UserManager.php');

class LoginController {

    public function login($pseudo, $password) {



        $pseudo = htmlspecialchars($pseudo);
        $password = htmlspecialchars($password);


        $user = new UserManager();
        $result = $user->connect($pseudo, $password);
        if ($result) {
            $_SESSION['pseudo'] = $pseudo;

            $admin = new AdminController();
            $admin->getIndex();
        }else{
            $admin = new AdminController();
            $admin->getlogin();
        }
    }

    public function logout() {

        session_unset();
        session_destroy();

        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $posts = $postManager->getPosts();

        

        require(VIEW . 'frontend/listPostsView.php');
        //header('Location : index.php?c=HomeController&a=getIndex');
        //exit(0);
    }

}
