<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');
require_once(MODEL . 'userManager.php');

Class AdminController {

    public function getlogin() {
        
        include(VIEW . '/frontend/login.php');
    }
  
    public function getIndex() {
        $postManager = new PostManager(); 
        $commentManager = new CommentManager();

        $posts = $postManager->getPosts(); 


        require(VIEW . 'backend/admin.php');
    }

    
    public function listPosts() {
        $postManager = new PostManager();
        $CommentManager = new CommentManager();

        $posts = $postManager->getPosts();


        include(VIEW . 'backend/allposts.php');
    }

    public function post() {
        $postManager = new PostManager();
        $CommentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $CommentManager->getComments($_GET['id']);

        require(VIEW . 'backend/post.php');
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

    public function updateComment() {
        $commentmanager = new CommentManager();
        $commentmanager->updateComment($_POST['author'], $_POST['comment'], $_GET['id']);
        header('Location: chapters.php');
    }

    public function deleteComment($getid) {
        $commentmanager = new CommentManager();
        $comment = $commentManager->deleteComment($_GET['id']);

        header('Location : admin.php?action=deleteComment');
    }

// Reporte les commentaires signalés
    public function reportComment($postId, $id) {
        if (isset($report)) {

            if ($CommentManager->signaledComment($signal) == FALSE) {
                $CommentManager->reportcomment($moderation);
                $CommentManager->validate($id);
            } else {
                $CommentManager->updateSignaled();
                echo'Attention message déjà signalé';
            }
        }


        header('Location: index.php?action=comment&id=' . $postId, $id);
    }

}
