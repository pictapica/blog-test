<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');

class PostController {

    //Retrieve login view
    function login() {
        require(VIEW . 'frontend/login.php');
    }

    //Retrieve all posts published for my index
    public function listPosts() {
        $postManager = new PostManager();

        $posts = $postManager->getPosts();

        require(VIEW . 'frontend/listPostsView.php');
    }

    //Retrieves only one post and its comments 
    public function post($id) {
        $postManager = new PostManager();
        $CommentManager = new CommentManager();

        $post = $postManager->getPost($id);
        $comments = $CommentManager->getComments($id);

        require(VIEW . 'frontend/postView.php');
    }

    //Back-office: Recovers all posts
    public function listAllPosts() {
        $postManager = new PostManager();

        $allChapters = $postManager->getAllPosts();

        require(VIEW . 'backend/allPosts.php');
    }

    //Back-office: Affiche TinyMce - AJOUTER UN POST
    function getTinyMce() {
        require(VIEW . 'backend/addPost.php');
    }

    //Back-office: Affiche TinyMce - MODIFIER UN POST
    function getTinyMce2($id) {
        $postManager = new PostManager();

        $post = $postManager->getPost($id);
        
        require(VIEW . 'backend/updatePost.php');
    }
    //Back-office: Publishes a chapter or saves it as a draft.
    public function addChapter($post, $published) {
        $chapAdd = new PostManager();

        if (empty($_POST['title'])) {
           echo 'Attention !', 'Vous avez oublié votre titre !' , 'warning'; //Commment faire pour un message avec bootstrap notify! 
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
            echo  "";
        } else {
            if (isset($_POST ['draft'])) {
                $chapAdd->addPost($post);
                echo  "";
            }
        }
        $this->listAllPosts();
    }

    //Back Office: Updating a chapter
    public function updateChapter($title, $content, $id) {
        if (isset($_POST['update'])) {
            if ((!empty($title)) && (!empty($content)) && (!empty($id))) {
                $chapUpdate = new PostManager();
                $chapUpdate->updatePost($title, $content, $id);
            }
        }$this->listAllPosts();
    }

    //Back office: Delete a chapter
    public function deleteChapter($id) {
        if (isset($_POST ['delete'])) {

            $deleteChap = new PostManager();
            $deleteChap->deletePost($id);
        }
        $this->listAllPosts();
    }

    public function publiChapter($id) {
        if (isset($_POST ['okpublish'])) {
            $publiChap = new PostManager();
            $publiChap->publiPost($id);
        }
        $this->listAllPosts();
    } 
    
}

