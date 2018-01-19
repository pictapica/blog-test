<?php

require_once(MODEL . 'Manager.php');
require_once(MODEL . 'Comments.php');

class CommentManager extends Manager {

//Retrieve comments
    public function getComments($postId) {
        $comments = $this->_db->prepare('SELECT id, author, comment, '
                . 'DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr '
                . 'FROM comments WHERE post_id = ? '
                . 'ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    /**    public function getComments($postId) {
      $comments = array($postId);
      $req = $this->_db->query('SELECT id, author, comment, DATE_FORMAT'
      . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr '
      . 'FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
      while ($data = $req->fetch(PDO::FETCH_ASSOC)){
      $comments[] = new Comments($data);
      }
      return $comments;
      }* */
    
//Add a comment   
    public function postComment($postId, $author, $comment, $moderation) {
        $comments = $this->_db->prepare('INSERT INTO comments(post_id, author, comment, '
                . 'comment_date, moderation) VALUES(:postId, :author, :comment, NOW(), 0)');
        $affectedLines = $comments->execute(array(
            'postId' => $postId,
            'author' => $author,
            'comment' => $comment
        ));
        return $affectedLines;
    }
    
  
//Retrieve all comments compiled by postid 
    public function getAllComments() {

        $req = $this->_db->query('SELECT id, author, comment, DATE_FORMAT'
                . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, moderation '
                . 'FROM comments  ORDER BY post_id DESC');
        return $req;
    }

//Retrieve comments from the last 10 days.
    public function getLastComments() {
        $req = $this->_db->query('SELECT id, author, comment, DATE_FORMAT'
                . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, moderation '
                . 'FROM comments  WHERE comment_date BETWEEN DATE_SUB( NOW( ) , INTERVAL 10 DAY ) AND NOW( ) ORDER BY comment_date DESC ');
        return $req;
    }

//Retrieves all reported comments.
    
    public function getAllsignalComments() {

        $req = $this->_db->query('SELECT id, author, comment, DATE_FORMAT'
                . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, moderation '
                . 'FROM comments WHERE moderation = 1 ORDER BY post_id DESC');
        return $req;
    }
    
//Retrieves all reported comments.
    
    public function getAllBanComments() {

        $req = $this->_db->query('SELECT id, author, comment, DATE_FORMAT'
                . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, moderation '
                . 'FROM comments WHERE moderation = 2 ORDER BY post_id DESC');
        return $req;
    }
    
//Retrieve all banned comments 
    
    public function allComments() {
        $comments = array();
        $req = $this->_db->query('SELECT * FROM comments WHERE '
                . ' post_id = post.id AND moderation = 2');
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

//Retrieve the number of comments for each post
    
    public function getCountComments() {
        $nbComments = array();
        $req = $this->_db->query('SELECT COUNT(*) AS nbcomments, post_id FROM comments WHERE moderation = 0 GROUP BY post_id');
        while ($comment = $req->fetch(PDO::FETCH_ASSOC)) {
            $nbComments[] = new Comment($comment);
        }
        return $nbComments;
    }

//Front-office: They signal the comment: moderation increases to 1
    public function reportComment($id) {
        $req = $this->_db->prepare('UPDATE comments SET moderation = 1 WHERE id = :id');
        $signal = $req->execute(array(
            'id' => $id));
        return $signal;
    }

//Back-office: Jean signal un commentaire: moderation increases to 1
    public function reportOneComment($id) {
        $req = $this->_db->prepare('UPDATE comments SET moderation = 1 WHERE id = :id');
        $oneSignal = $req->execute(array(
            'id' => $id));
        return $oneSignal;
    }
    
//Back office: Jean decides to accept it: moderation back to 0
    Public function confirm($id) {
        $req = $this->_db->prepare('UPDATE comments SET moderation = 0 WHERE id = :id');
        $confirm = $req->execute(array('id' => $id));
        return $confirm;
    }

    //Back office: Jean decides to accept ban comment: moderation back to 0
    Public function confirmBan($id) {
        $req = $this->_db->prepare('UPDATE comments SET moderation = 0 WHERE id = :id');
        $confirmBan = $req->execute(array('id' => $id));
        return $confirmBan;
    }
    
//back office: Jean decides to banish: moderation increases to 2
    public function ban($id) {
        $req = $this->_db->prepare('UPDATE comments SET moderation = 2 WHERE id = :id');
        $ban = $req->execute(array('id' => $id));
        return $ban;
    }

//Comments reported
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

//Delete a comment
    public function deleteOneComment($id) {
        $req = $this->_db->prepare('DELETE FROM comments WHERE id = :id');
        $req->execute(array('id' => $id));
    }

}
