<?php
include 'usermigrations.php';

$usersTable = new UserMigration();
$res = $usersTable->createTable();

echo json_encode($res);