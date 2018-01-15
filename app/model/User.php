<?php

class User {

    protected $_user_id;
    protected $_firstname;
    protected $_name;
    protected $_pseudo;
    protected $_email;
    protected $_password;

    use ConstructHydrate;

    //GETTERS

    public function getUserID() {
        return $this->_user_id;
    }

    public function getFisrtNAme() {
        return $this->_firstname;
    }

    public function getName() {
        return $this->_name;
    }

    public function getPseudo() {
        return $this->_pseudo;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getPassword() {
        return $this->_password;
    }

    //SETTERS

    public function setUserID($userId) {
        $this->_user_id = $userId;
    }

    public function setFirstName($firstname) {
        $this->_firstname = $firstname;
    }

    public function setName($name) {
        $this->_name = $name;
    }

    public function setPseudo($pseudo) {
        $this->_pseudo = $pseudo;
    }

    public function setEmail($email) {
        $this->_email = $email;
    }

    public function setPassword($password) {
        $this->_password = $password;
    }

}
