<?php
include 'user.php';

$user = new User();
$data = $user->insertUser($_POST);

?>