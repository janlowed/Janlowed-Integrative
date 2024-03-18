<?php
include '../database/database.php';

class User extends Database {

    public function all() {
        $this->init_db();

            $users = $this->conn->query("SELECT * FROM user");

            if ($users->num_rows > 0) {
                $data = array();

                for($i = 0; $i < $users->num_rows; $i++) {
                    $data[$i] = $users->fetch_assoc();
                }

                return $data;
            }

            else {

                return [
                    'status' => 404,
                    'message' => 'No data found'
                ];
            }   
    }
    public function search($params) {
        $no = count($params);
        if ($no > 1) {
            return [
                'status' => 500,
                'message' => 'Only one parameter is Allowed'
            ];
        } else {
            $this->init_db();

            foreach($params as $key => $value) {

                $user = $this->conn->query("SELECT * FROM user WHERE $key = '$value'");
            }

            if ($user) {
                $res = $user->fetch_assoc();

                if ($res == null){ 
                    return [
                        'status' => 404,
                        'message' => 'Not Found'
                    ];
                }
                return $res;
            } else {
                return [
                    'status' => 500,
                    'message' => 'Something Went Wrong'
                ];
            }
        }

    }

    public function insert($params) {
        $this->init_db();

        $name = $params['name'];
        $email = $params['email'];
        $password = $params['password'];
        $address = $params['address'];

        $res = $this->conn->query("INSERT INTO user (name, email, password, address) VALUES (
            '$name', '$email', '$password', '$address'
            )");    

        if ($res) {
            return [
                'status' => 200,
                'message' => 'User Inserted Successfully'
            ];
        }

        return [
            'status' => 500,
            'message' => 'User Cannot Be Inserted'
        ];

        return $res;
    }

}
  