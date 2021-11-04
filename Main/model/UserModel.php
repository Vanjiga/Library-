<?php

namespace app\model;
use app\DatabaseConnection;

class UserModel {
    public $id;
    public $username;
    public $password;
    public $rank;

    public function getData($data) {
        $this->username = $data['username'];
        $this->password = $data['password'];
    }

    public function loadUser() {
        $db = DatabaseConnection::$database;
        $db->createUser($this); 
    }
}