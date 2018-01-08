<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');
require_once(MODEL . 'Post.php');

class CommentController {

//Ajoute un commentaire
    
    public function addComment($postId, $author, $comment, $moderation) {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($postId, $author, $comment, $moderation);
        require(VIEW . 'frontend/postView.php');
    }

//Signale un commentaire
    
    public function report($id) {
        $commentSignal = new CommentManager();
        $signal = $commentSignal->reportComment($id);
        require(VIEW . 'frontend/postView.php');
    }

//Récupère TOUS les commentaires classés par post_id
    
    public function listAllComments() {
        $commentManager = new CommentManager();
        $allCom = $commentManager->getAllComments();

        require(VIEW . 'backend/allComments.php');
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
        $commentManager = new CommentManager();
        $comment = $commentManager->deleteOneComment($getId);

        header('Location : index.php');
    }

}
