<?php
include 'db.php';

class User_migration extends Database{

    public function CrtTbl(){
        $this->init();
        $show = $this->conn->query("CREATE TABLE IF NOT EXISTS users(
            id int auto_increment primary key,
            name varchar (255) not null,
            email varchar (255) not null,
            password varchar (255) not null,
            token varchar (255) not null
        )");
    }
}


?>