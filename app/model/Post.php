<?php

class Post {

    protected $_id,
            $_title,
            $_user_id,
            $_content,
            $_date,
            $_updatedate,
            $_nbcomment,
            $_excerpt,
            $_published;

    use ConstructHydrate;

    //getters
    public function getId() {
        return $this->_id;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getUserId() {
        return $this->_user_id;
    }

    public function getContent() {
        return $this->_content;
    }

    public function getDate() {
        return $this->_date;
    }

    public function getUpdateDate() {
        return $this->_updatedate;
    }

    public function getPublished() {
        return $this->_published;
    }

    public function getExcerpt($letter = NULL) {
        
        
        $content = $this->getContent();
            $excerpt = substr($content, 0, $letter);
            $excerpt = substr($excerpt, 0, strrpos($excerpt, " "));
            $etc = "&nbsp...";
            $excerpt = $excerpt.$etc;
            return $excerpt;
    }

    public function getNbcomments() {
        return $this->_nbcomment;
    }

    //setters
    public function setId($id) {
        $this->_id = (int) $id;
    }

    public function setTitle($title) {
        if (is_string($title) || empty($title)) {
            $this->_title = $title;
        }
    }

    public function setUserId($user_id) {
        $this->_user_id = (int) $user_id;
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setDate($date) {
        if (is_string($date)) {
            DateTime::createFromFormat('m/d/Y', $date);
        }

        $this->_date = $date;
    }

    public function setUpdatedate($updatedate) {
        $this->_updatedate = $updatedate;
    }

    public function setPublished($published) {
        $this->_published = (int) $published;
    }

    public function setNbcomment($nb_comment) {
        $this->_nbcomment = $nb_comment;
    }

    public function setExcerpt($excerpt) {
        $this->_excerpt = $excerpt;
    }

}
