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
    public function post($id) {
        $postManager = new PostManager();
        $CommentManager = new CommentManager();

        $post = $postManager->getPost($id);
        $comments = $CommentManager->getComments($id);

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

    
    //Back-office : Publie un chapitre ou l'enregistre comme brouillon
    public function addChapter($post, $published) {
        $chapAdd = new PostManager();
        
            if (empty($_POST['title'])) {
                echo ('Vous avez oublié votre titre !'); //Commment faire pour un message avec bootstrap notify! 
            } elseif (empty($_POST['content'])) {
                echo ('Ce champ ne peut être vide...'); //Commment faire pour un message  avec notify! 
            } else { 
                $post = new post([
                    'title' => htmlspecialchars($_POST['title']),
                    'content' => $_POST['content']
                    ]);
            }
            if (isset($_POST ['publish'])) {
                $chapAdd->publishPost($post);
            }else { 
                if (isset($_POST ['draft'])) {
                $chapAdd->addPost($post);
            }}
            $this->listAllPosts();
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
    public function deleteChapter($id) {
        if (isset ($_POST ['delete'])){
        
        $deleteChap = new PostManager();
        $deleteChap->deletePost($id);
        }
        $this->listAllPosts();
    }

}
