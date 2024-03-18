<?php

class Database {

    protected $conn;

    public function init_db() {

        $this->conn = new mysqli('localhost', 'root', '', 'api_db');
    }

    public function createDb() {
        $this->conn = new mysqli('localhost' , 'root', '');
        $this->conn->query("CREATE DATABASE IF NOT EXISTS api_db");
    }
}