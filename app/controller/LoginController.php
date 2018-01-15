<?php

include(MODEL . 'UserManager.php');

class LoginController {

    public function login() {
        if(isset($_POST ['connect'])) {
                
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $password = htmlspecialchars($_POST['password']);

        
            $user = new UserManager();
            $result = $user->connect($pseudo, $password);
            print_r($result);
            /**if ($login == TRUE) {
                $_SESSION['loggedIn'];
                $_SESSION['id'] = $login['id'];
                $_SESSION['pseudo'] = $pseudo;
**/
                require (VIEW . '/backend/admin.php');
                //header('Location : index.php?c=AdminController&amp;a=getIndex');
                exit(0);
           
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
