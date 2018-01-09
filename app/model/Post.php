<?php

class Post {

    protected $_id,
            $_title,
            $_user_id,
            $_content,
            $_creation_date,
            $_update_date,
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

    public function getCreationDate() {
        return $this->_creation_date;
        
        /**$creation_date = new DateTime($this->_creation_date);
        echo $creation_date->format('d/m/Y');
**/
    }

    public function getUpdateDate() {
        return $this->_update_date;
    }

    public function getPublished() {
        if ($this->_published == 1) {
            return "Brouillon";
        } else {
            return "Publié";
        }
    }

    Public function getExcerpt($letter= NULL) {
        $content = $this->getContent();
        $excerpt = substr($content, 0, $letter);
        $excerpt = substr($excerpt, 0, strrpos($excerpt, " "));
            $etc = "&nbsp;...";
            $excerpt = $excerpt.$etc;
            return $excerpt;
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

    public function setCreationDate($creation_date) {
        if (is_string($creation_date))
                {
                DateTime::createFromFormat('m/d/Y', $creation_date);
                }
                
                $this->_creation_date = $creation_date; 
    }

    public function setUpdateDate($update_date) {
        $this->_update_date = $update_date;
    }

    public function setPublished($published) {
        $this->_published = (int) $published;
    }

    

}
