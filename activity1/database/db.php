<?php

class Database{

    public $conn;

    function init(){

        $this->conn = new mysqli('localhost', 'root', '', 'api_db');
    }

}