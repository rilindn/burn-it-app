<?php
include_once 'userMapper.php';
include_once 'databaseConfig.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $mapper = new UserMapper();
    $mapper->makeAdmin($userId);
    header("Location:../dashboard.php");
}