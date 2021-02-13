<?php
include_once 'userMapper.php';
include_once '../dbConfig/databaseConfig.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $mapper = new UserMapper();
    $mapper->deleteUser($userId);
    header("Location:../views/dashboard.php");
}
