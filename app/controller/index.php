<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');


function publiposts(){
$manager = new PostManager();
$publipost = $manager->publishedPosts();
}

function login() {
    require(VIEW . 'frontend/login.php');
}

function listPosts() {
    $postManager = new PostManager(); //Création d'un objet
    $commentManager = new CommentManager();

    $posts = $postManager->getPosts(); //Appel d'une fonction de cet objet
 

    require(VIEW . 'frontend/listPostsView.php');
}

function post() {
    $postManager = new PostManager();
    $CommentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $CommentManager->getComments($_GET['id']);

    require(VIEW . 'frontend/postView.php');
}

