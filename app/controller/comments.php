<?php

function addComment($postId, $author, $comment, $moderation) {
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment, $moderation);

    if ($affectedLines === false) {
        
        
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}


function signal() {
    $commentSignal = new CommentManager();

    $signal = $commentSignal->reportComment($id);


    header('Location : index.php?c=comments&a=report&id=' . $postId);
}