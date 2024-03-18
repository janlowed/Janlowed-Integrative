<?php

include '../database/db.php';

class User extends Database{

    public function getAll(){

        $this->init();
        $allUser = $this->conn->query("SELECT * FROM users");
        $users = $allUser->fetch_all(MYSQLI_ASSOC);

            return ($users);
    }
    public function insertUser($params) {
        
        $this->init();
        $name = $params['name'];
        $email = $params['email'];
        $password = $params['password'];
        $token = $params['token'];
    
        $this->conn->query("INSERT INTO users (name, email, password, token) VALUES ('$name', '$email', '$password', '$token')");

    }
    public function deleteUser($params) {
        
        $this->init();
        $id = $params['id'];
    
        $this->conn->query("DELETE FROM users WHERE id = $id");

    }
        
}

?>