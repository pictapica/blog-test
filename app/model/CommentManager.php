<?php

require_once(MODEL . 'Manager.php');
require_once(MODEL . 'Comments.php');

class CommentManager extends Manager {

    /**
     * 
     * @param type $postId
     * @return type
     * 
     */
    public function getComments($postId) {
        
        $comments = $this->_db->prepare('SELECT id, author, comment, DATE_FORMAT'
                . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr '
                . 'FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment, $moderation) {
        
        $comments = $this->_db->prepare('INSERT INTO comments(post_id, author, comment, '
                . 'comment_date, moderation) VALUES(:postId, :author, :comment, NOW(), 0)');
        $affectedLines = $comments->execute(array(
            'postId'=> $postId, 
            'author'=> $author, 
            'comment' => $comment
        ));

        return $affectedLines;
    }

    public function getAllComments() {
        
        $req = $this->_db->query('SELECT id, author, comment, DATE_FORMAT'
                . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, moderation '
                . 'FROM comments  ORDER BY post_id DESC');
        return $req;
    }

    public function getAllsignalComments() {
        
        $req = $this->_db->query('SELECT id, author, comment, DATE_FORMAT'
                . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, moderation '
                . 'FROM comments WHERE moderation = 1 ORDER BY post_id DESC');
        return $req;
    }
    public function countComments() {

        $req = $this->_db->query('SELECT COUNT(*) AS nbcomments, post_id FROM comments WHERE moderation = 0 GROUP BY post_id');

        $data = $req->fetchAll();
        $req->closecursor();
        return $data;
    }



    //front-office : Ils signalent le commentaire : moderation passe à 1
    public function reportComment($id) {
        $req = $this->_db->prepare('UPDATE comments SET moderation = 1 WHERE id = :id');
        $req->execute(array('id'=> $id));
    }

    //back-office : Jean  decide de l'accepter : moderation repasse à 0
    Public function validate($id) {
        $req = $this->_db->prepare('UPDATE comments SET moderation = 0 WHERE id = :id');
        $req->execute(array('id'=> $id));
    }

    //back-office : Jean decide de le bannir : moderation passe à 2s
    public function ban($id) {
        $req = $this->_db->prepare('UPDATE comments SET moderation = 2 WHERE id = :id');
        $req->execute(array('id'=> $id));
    }

        //Commentaires qui sont signalés
    public function signaledComment($id) {

        $req = $this->_db->prepare('SELECT id FROM comments WHERE id= :id AND moderation > 0');
        $req->execute(array('id' => $id));
        $signal = $req->fetch();

        if (empty($signal)) {
            return false;
        } else {
            return true;
        }
    }
}
