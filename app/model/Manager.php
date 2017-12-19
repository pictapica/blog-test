<?php

class Manager {

    protected $_db;
    protected $_hostname = 'localhost';
    protected $_login = 'root';
    protected $_pwd = '';
    protected $_dbname = 'blog_writer';

    public function __construct() {
        $db = new PDO('mysql:hostname=' . $this->_hostname . ';dbname=' . $this->_dbname . ';charset=utf8', $this->_login, $this->_pwd);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_db = $db;
    }

    /** class Manager {

      protected function dbConnect() {
      $db = new \PDO('mysql:host=localhost;dbname=blog_writer;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      return $db;
      }

      }
      //('mysql:host=db714791558.db.1and1.com;dbname=db714791558;charset=utf8', 'dbo714791558', 'Projet_3/Blog', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      
     
     **/
}   