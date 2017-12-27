<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');
require_once(MODEL . 'userManager.php');

Class AdminController {

    public function getlogin() {

        include(VIEW . '/frontend/login.php');
    }

    public function getIndex() {

        require(VIEW . 'backend/admin.php');
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
