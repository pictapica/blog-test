<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');

class HomeController {

    public function getIndex() {
        $postManager = new PostManager(); //Création d'un objet
        $commentManager = new CommentManager();

        $posts = $postManager->getPosts(); //Appel d'une fonction de cet objet


        require(VIEW . 'frontend/listPostsView.php');
    }

}
