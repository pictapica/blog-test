<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');

class PostController {

    public function publiPosts() {
        $manager = new PostManager();
        $publipost = $manager->publishedPosts();
    }

    function login() {
        require(VIEW . 'frontend/login.php');
    }

    public function listPosts() {
        $postManager = new PostManager(); //Création d'un objet
        $commentManager = new CommentManager();

        $posts = $postManager->getPosts(); //Appel d'une fonction de cet objet


        require(VIEW . 'frontend/listPostsView.php');
    }

    public function post() {
        $postManager = new PostManager();
        $CommentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $CommentManager->getComments($_GET['id']);

        require(VIEW . 'frontend/postView.php');
    }

    public function listPostsArray() {
        $postManager = new PostManager();

        $postsArray = $postManager->getPosts();
        require(VIEW . 'backend/allPosts.php');
    }

    function getTinyMce() {
        require(VIEW . 'backend/editPost.php');
    }

    public function editPost($post) {
        $title = htmlspecialchars($_POST['title']);
        $content = $_POST['content'];

        if ((!empty($title)) && (!empty($content))) {
            $post = new post($post);
            $post->setTitle($title);
            $post->setContent($content);
            $post->setUserId('1');
            $post->setPublished('1');

            $chapAdd = new PostManager();
            $addChapter = $chapAdd->addPost($post);


            echo 'oui mon chapitre est ajouté ! ';
            //require(VIEW . 'backend/editPost.php');
        }
    }
    
    public function addChapter() {
        $title = htmlspecialchars($_POST['title']);
        $content = $_POST['content'];

        if ((!empty($title)) && (!empty($content))) {
            $post = new post();
            $post->setTitle($title);
            $post->setContent($content);
            $post->setUserId('1');

            $chapAdd = new PostManager();
            $addChapter = $postManager->addPost($post);

            header('Location: editPost.php');
        }
    }

    public function deleteChapter() {
        $id = htmlspecialchars($_POST['id']);

        if (!empty($id)) {

            $deleteChap = new PostManager();
            $chapDelete = $deleteChap->deletePost($id);

            header('Location : admin.php?action=editPost');
        }
    }

    public function updateChapter() {
        $title = htmlspecialchars($_POST['title']);
        $content = $_POST['content'];
        $id = htmlspecialchars($_POST['id']);

        if ((!empty($titre)) && (!empty($content)) && (!empty($id))) {
            $post = new Post();
            $post->setTitle($title);
            $post->setContent($content);
            $post->setUserId('1');

            $chapUpdate = new PostManager();
            $updateChapter = $chapUpdate->updatePost($post);

            header('Location : admin.php?action=editPost');
        }
    }

}
