<?php

class Post {

    protected $_id;
    protected $_title;
    protected $_user_id;
    protected $_content;
    protected $_creation_date;
    protected $_update_date;
    protected $_published;

     public function __construct($data) {
        if (!empty($data)) {
            return $this->hydrate($data);
        }
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

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
    }

    public function getUpdateDate() {
        return $this->_update_date;
    }
    public function getPublished() {
        if($this->_published == 1){
            return "Brouillon";
        }else{
            return "Publié";
        }
    }

    //setters
    public function setId($id) {
        $this->_id = (int) $id;
    }

    public function setTitle($title) {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setUseId($user_id) {
        $this->_user_id = (int) $user_id;
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setCreationDate($creation_date) {
        if (is_string($creation_date)) {
            DateTime::createFromFormat('m/d/Y', $creation_date);
        }

        $this->_creation_date = $creation_date;
    }

    public function setUpdateDate($update_date) {
        $this->_update_date = $update_date;
    }

    public function setPublished($published) {
        $this->_published = (int)$published;
    }
}
