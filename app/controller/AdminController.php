<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');


Class AdminController {

    public function getlogin() {

        include(VIEW . '/frontend/login.php');
    }

    public function getIndex() {

        require(VIEW . '/backend/admin.php');
    }

}