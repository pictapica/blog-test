<?php

Class Comments {

    protected $_id,
            $_postid,
            $_author,
            $_comment,
            $_commentdate,
            $_moderation;

    const NO_SIGNAL = 0;
    const SIGNAL = 1;
    const BANNED = 2;

    use ConstructHydrate;

    public function getId() {
        return $this->_id;
    }

    public function getPostId() {
        return $this->_postid;
    }

    public function getAuthor() {
        return $this->_author;
    }

    public function getComment() {
        return $this->_comment;
    }

    public function getCommentDate() {
        return $this->_commentdate;
    }

    public function getModeration() {
        return $this->_moderation;
    }

    public function setId($id) {
        if (is_int($id)) {
            if ($id > 0) {
                $this->_id = $id;
            }
        }
    }

    public function setPostId($post_id) {
        if (is_int($post_id)) {
            if ($post_id > 0) {
                $this->_id = $post_id;
            }
        }
    }

    public function setAuthor($author) {
        if (is_string($author)) {
            $this->_title = $author;
        }
    }

    public function setComment($comment) {
        if (is_string($comment)) {
            $this->_content = $comment;
        }
    }

    public function setCommentDate($comment_date) {
        if (is_string($comment_date)) {
            $this->_content = $comment_date;
        }
    }

    public function setModeration($moderation) {
        if (is_int($moderation)) {
            if (in_array($moderation, [self::NO_SIGNAL, self::SIGNAL, self::BANNED])) {
                $this->_moderation = 0;
            }
        }
    }

}
