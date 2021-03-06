<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');
require_once(MODEL . 'Post.php');
require_once(CONTROLLER . 'PostController.php');

class CommentController {

//Add a comment

    public function addComment($id, $postId, $author, $comment, $moderation) {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($postId, $author, $comment, $moderation);

        $add = new PostController($id);
        $add->post($id);
    }

//Report a comment

    public function report($id) {
        if (isset($_POST['report'])) {
            $commentSignal = new CommentManager();
            $signal = $commentSignal->reportComment($id);
        }
        if (!empty($signal)) {
            header("Location: index.php?c=PostController&a=post&id=" . $_POST['postId'] . "");
        }
    }
   
 
//Report a comment in the table of all comments

    public function oneReport($id) {
        if (isset($_POST['onereport'])) {
            $commentSignal = new CommentManager();
            $oneSignal = $commentSignal->reportComment($id);
        }
        if (!empty($oneSignal)) {
            header("Location: index.php?c=CommentController&a=listAllComments");
        }
    }

//Report a comment in the table of last comments

    public function lastReport($id) {
        if (isset($_POST['lastreport'])) {
            $commentSignal = new CommentManager();
            $lastSignal = $commentSignal->reportComment($id);
        }
        if (!empty($lastSignal)) {
            header("Location: index.php?c=CommentController&a=listLastComments");
        }
    }
//Retrieve ALL comments sorted by post_id

    public function listAllComments() {
        $commentManager = new CommentManager();
        $allCom = $commentManager->getAllComments();

        require(VIEW . 'backend/allComments.php');
    }

//Retrieve the last comments posted for 30 days

    public function listLastComments() {
        $commentManager = new CommentManager();
        $lastCom = $commentManager->getLastComments();

        require (VIEW . 'backend/lastComments.php');
    }

//Retrieves reported comments (moderation = 1) sorted by post_id

    public function listAllSignalComments() {
        $commentManager = new CommentManager();
        $allsigCom = $commentManager->getAllsignalComments();

        require(VIEW . 'backend/moderation.php');
    }
    
//Retrieves reported comments (moderation = 1) sorted by post_id

    public function listAllBanComments() {
        $commentManager = new CommentManager();
        $allBanCom = $commentManager->getAllBanComments();

        require(VIEW . 'backend/ban.php');
    }
//Count comments for each post
    
    public function countComment() {
        $commentManager = new CommentManager();
        $nbComments = $commentManager->getCountComments();
    }

//Moderate to 0
    
    public function confirmComment($id) {
        if (isset($_POST['confirm'])) {
            $confirmCom = new CommentManager();
            $confirm = $confirmCom->confirm($id);
        }
        if (!empty($confirm)) {
           header("Location: index.php?c=CommentController&a=listAllSignalComments");
        }
    }

//Moderate pass to 0 for a banned comment
    
    public function confirmBanComment($id) {
        if (isset($_POST['confirmBan'])) {
            $confirmCom = new CommentManager();
            $confirmBan = $confirmCom->confirmBan($id);
        }
        if (!empty($confirmBan)) {
           header("Location: index.php?c=CommentController&a=listAllBanComments");
        }
    }
    
//Moderate to 2
    
    public function bannedComment($id) {
        if (isset($_POST['ban'])) {
            $banCom = new CommentManager();
            $ban = $banCom->ban($id);
        }
        if (!empty($ban)) {
           header("Location: index.php?c=CommentController&a=listAllSignalComments");
        }
    }

    public function deleteComment($id) {
        $commentManager = new CommentManager();
        $commentManager->deleteOneComment($id);
        $this->listAllComments();
    }
    
    public function deleteLastComment($id) {
        $commentManager = new CommentManager();
        $commentManager->deleteOneComment($id);
        $this->listLastComments();
    }
    
    public function deleteModeratedComment($id) {
        $commentManager = new CommentManager();
        $commentManager->deleteOneComment($id);
        $this->listAllSignalComments();
    }
    public function deleteBanComment($id) {
        $commentManager = new CommentManager();
        $commentManager->deleteOneComment($id);
        $this->listAllBanComments();
    }
}
