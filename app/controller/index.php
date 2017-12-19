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

function addComment($postId, $author, $comment, $moderation) {
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment, $moderation);

    if ($affectedLines === false) {
        
        
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}


function signal() {
    $commentSignal = new CommentManager();

    $signal = $commentSignal->reportComment($id);


    header('Location : index.php#comments');
}

$manager = new PostManager();
$posts = $manager->publishedPosts();
include(VIEW . '/frontend/header.php');
include(VIEW . '/frontend/sidebar.php');

    include(VIEW . '/frontend/index.php');


