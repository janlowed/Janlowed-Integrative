<?php
include 'user.php';

$user = new User();
$data = $user->getAll();

echo json_encode($data);
?>  