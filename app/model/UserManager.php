<?php

require_once ("Manager.php"); //Pour se connecter à la base de données
require_once ("user.php");

class UserManager extends Manager {

    public function addUser($firstname, $name, $pseudo, $email, $pwdsecure) {
        $req = $this->_db->prepare('INSERT INTO user (firstname, name, pseudo, email, password) VALUES(:firstname,
 :name, :pseudo, :email, :password)');
        $req->execute(array(
            'firstname' => $firstname,
            'name' => $name,
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $pwdsecure));
        $req->execute();
    }

    public function connect($pseudo, $pwdsecure) {
        $req = $this->_db->prepare('SELECT * FROM user WHERE pseudo = :pseudo AND password = :password');
        $req->execute(array(
            'pseudo' => $pseudo,
            'password' => $pwdsecure));
        return $result = $req->fetch();
    }

}
