<?php
include_once 'cartMapper.php';
include_once '../dbConfig/databaseConfig.php';


if (isset($_GET['cartid'])&& isset($_GET['pageurl'])) {
    $prodId = $_GET['cartid'];
    $page = $_GET['pageurl'];
    $mapper = new CartMapper();
    $mapper->deleteFromCart($prodId);
    header("Location:../views/shop.php");
}