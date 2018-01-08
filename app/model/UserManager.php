<?php

require_once ("Manager.php"); //Pour se connecter à la base de données
require_once ("User.php");

class UserManager extends Manager {
    
    //Inutile pour le moment
    public function addUser($firstname, $name, $pseudo, $email, $pwdSecure) {
        $req = $this->_db->prepare('INSERT INTO user (firstname, name, pseudo, email, password) VALUES(:firstname,
 :name, :pseudo, :email, :password)');
        $req->execute(array(
            'firstname' => $firstname,
            'name' => $name,
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $pwdSecure));
        $req->execute();
    }

    public function connect($pseudo, $password) {
        $req = $this->_db->prepare('SELECT * FROM user WHERE pseudo = :pseudo AND password = :password');
        $req->execute(array(
            'pseudo' => $pseudo,
            'password' => $password));
        
       $result = $req->fetch();
    }

}
