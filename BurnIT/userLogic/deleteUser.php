<?php
include_once 'userMapper.php';
include_once 'databaseConfig.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $mapper = new UserMapper();
    $mapper->deleteUser($userId);
    header("Location:../index.php");
}
