<?php

require_once ("Manager.php"); 
require_once ("User.php");

class UserManager extends Manager {

    public function connect($pseudo, $password) {

        $req = $this->_db->prepare('SELECT * FROM user WHERE pseudo = :pseudo AND password = :password');
        $req->execute(array(
            'pseudo' => $pseudo,
            'password' => $password));
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
        //print_r($result);
    }
}
