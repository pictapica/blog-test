<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');

class CommentController {

    public function addComment($postId, $author, $comment, $moderation) {

        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($postId, $author, $comment, 0);
        
      //  header('Location: index.php?c=CommentController&a=addCommment&id=' .$postId);
        $postManager = new PostManager();
        $CommentManager = new CommentManager();

        $post = $postManager->getPost($postId);
        $comments = $CommentManager->getComments($postId);

        require(VIEW . 'frontend/postView.php');
    }

    public function report($postId, $id) {
        print "report";
        $commentSignal = new CommentManager();
        $signal = $commentSignal->reportComment($postId, $id);


        header('Location : index.php?c=CommentController&a=report&id=' . $postId);
    }

    public function listAllComments() {
        $commentManager = new CommentManager();
        $allCom = $commentManager->getAllComments();

        require(VIEW . 'backend/allComments.php');
    }

    public function listAllSignalComments() {
        $commentManager = new CommentManager();
        $allsigCom = $commentManager->getAllsignalComments();

        require(VIEW . 'backend/moderation.php');
    }

    public function updateComment() {
        $commentmanager = new CommentManager();
        $commentmanager->updateComment($_POST['author'], $_POST['comment'], $_GET['id']);
        header('Location: admin.php');
    }

    public function deleteComment($getid) {
        $commentmanager = new CommentManager();
        $comment = $commentManager->deleteComment($_GET['id']);

        header('Location : index.php');
    }

}
