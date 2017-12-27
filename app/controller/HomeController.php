<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');

class HomeController {

    public function getIndex() {
        $postManager = new PostManager(); 
        $commentManager = new CommentManager();

        $posts = $postManager->getPosts(); 


        require(VIEW . 'frontend/listPostsView.php');
    }
    
    public function about() {
        require(VIEW . 'frontend/about.php');
    }

}
