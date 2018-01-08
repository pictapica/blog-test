<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');

class PostController {

    //Récupère la vue login
    function login() {
        require(VIEW . 'frontend/login.php');
    }

    //Récupère tous les posts publiés pour mon index
    public function listPosts() {
        $postManager = new PostManager();

        $posts = $postManager->getPosts();

        require(VIEW . 'frontend/listPostsView.php');
    }

    //Récupère un seul post et ses commentaires 
    public function post() {
        $postManager = new PostManager();
        $CommentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $CommentManager->getComments($_GET['id']);

        require(VIEW . 'frontend/postView.php');
    }

    //Back-office : Récupère tous les posts
    public function listAllPosts() {
        $postManager = new PostManager();

        $allChapters = $postManager->getAllPosts();

        require(VIEW . 'backend/allPosts.php');
    }

    //Back-office : Affiche TinyMce
    function getTinyMce() {
        require(VIEW . 'backend/addPost.php');
    }

    
    //Back-office : Publie un chapitre ou l'enregistra comme brouillon
    public function addChapter($post) {
        $chapAdd = new PostManager();
        if (isset($_POST['publish']) || isset($_POST['brouillon'])) {
            if (empty($_POST['title'])) {
                echo ('Vous avez oublié votre titre !'); //Commment faire pour un message d'alerte avec bootstrap notify! 
            } elseif (empty($_POST['content'])) {
                echo ('Ce champ ne peut être vide...'); //Commment faire pour un message d'alerte avec notify! 
            } else { 
                $post = new post([
                    'title' => htmlspecialchars($_POST['title']),
                    'content' => htmlspecialchars($_POST['content'])
                    ]);
            }
            if (isset($_POST ['brouillon'])) {
                $chapAdd->addPost($post);
                echo 'Message enregistré comme brouillon';
                require(VIEW . 'backend/allPosts.php');
                //header('refresh: 3; Location : index.php?c=PostController&a=allpost');
            } elseif (isset($_POST ['publish'])) {
                $chapAdd->publishPost($post);
                echo 'Message publié';
                require(VIEW . 'backend/allPosts.php');
                //header('refresh: 3; Location : index.php?c=PostController&a=allpost');
            }
        }
    }

    //Back-office : Enregistre un brouillon
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

            require(VIEW . 'backend/addPost.php');
            header('Location : index.php?c=PostController&a=allpost');
        }
    }

    
    //Back-office : Mettre à jour un chapitre
    public function updateChapter($post, $id, $published) {
        $title = htmlspecialchars($_POST['title']);
        $content = $_POST['content'];


        if ((!empty($title)) && (!empty($content)) && (!empty($id))) {
            $post = new Post();
            $post->setTitle($title);
            $post->setContent($content);
            $post->setUserId('1');

            $chapUpdate = new PostManager();
            $chapUpdate->updatePost($post, $id, $published);

            header('Location : admin.php?action=editPost');
        }
    }

    //Back-office : Efface un chapitre
    public function deleteChapter($getId) {
        $post = new Post;
        $post->getId($getId);
        $deleteChap = new PostManager();
        $deleteChap->deletePost($getId);

        require(VIEW . 'backend/allPosts.php');
        header('Location : index.php?c=PostController&a=allpost');
    }

}
