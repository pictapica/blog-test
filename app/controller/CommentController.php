<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');
require_once(MODEL . 'Comments.php');

class CommentController {

        public function addComment($postId, $author, $comment, $moderation) {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment, $moderation);
        if ($affectedLines === false) {


            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?c=PostController&a=post&id=' . $postId);
        }
    }

    public function report() {
        $commentSignal = new CommentManager();

        $signal = $commentSignal->reportComment($id);


        header('Location : index.php?c=CommentController&a=report&id=' . $postId);
    }

    public function allComments(){
        $allcomments = new CommentManager();
        
        $comments = $allcomments->getAllComments();
        
        header('Location : index.php?c=CommentController&a=allComments&id=' . $postId);
    }
}
