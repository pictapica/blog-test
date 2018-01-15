<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');
require_once(MODEL . 'Post.php');
require_once(CONTROLLER . 'PostController.php');

class CommentController {

//Ajoute un commentaire

    public function addComment($id, $postId, $author, $comment, $moderation) {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($postId, $author, $comment, $moderation);

        $add = new PostController($id);
        $add->post($id);
    }

//Signale un commentaire

    public function report($id) {
        if (isset($_POST['report'])) {
            $commentSignal = new CommentManager();
            $signal = $commentSignal->reportComment($id);
        }
        if (!empty($signal)) {
            header("Location: index.php?c=PostController&a=post&id=" . $_POST['postId'] . "");
        }
    }

//Récupère TOUS les commentaires classés par post_id

    public function listAllComments() {
        $commentManager = new CommentManager();
        $allCom = $commentManager->getAllComments();

        require(VIEW . 'backend/allComments.php');
    }

//Récupère les derniers commentaires postés depuis 30 jours

    public function listLastComments() {
        $commentManager = new CommentManager();
        $lastCom = $commentManager->getLastComments();

        require (VIEW . '/backend/lastComments.php');
    }

//Récupère les commentaires signalés (moderation = 1 ) classés par post_id

    public function listAllSignalComments() {
        $commentManager = new CommentManager();
        $allsigCom = $commentManager->getAllsignalComments();

        require(VIEW . 'backend/moderation.php');
    }

//Passe moderation à 
    public function updateComment() {
        $commentManager = new CommentManager();
        $commentManager->updateOneComment($_POST['author'], $_POST['comment'], $_GET['id']);
        header('Location: admin.php');
    }

    public function deleteComment($getId) {
        if (isset($_POST['delete'])) {
            $commentManager = new CommentManager();
            $delete = $commentManager->deleteOneComment($getId);
            
            
        }
        $this->listAllComments();
    }

}
