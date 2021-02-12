<?php
include_once 'cartMapper.php';
include_once '../dbConfig/databaseConfig.php';

if (isset($_GET['userid']) && isset($_GET['prodid'])
&& isset($_GET['prodEmri'])&& isset($_GET['prodPhoto'])
&& isset($_GET['prodCmimi'])&& isset($_GET['prodType'])) {
    $userId = $_GET['userid'];
    $prodId = $_GET['prodid'];
    $prodEmri = $_GET['prodEmri'];
    $prodPhoto = $_GET['prodPhoto'];
    $prodCmimi = $_GET['prodCmimi'];
    $prodType = $_GET['prodType'];
    $mapper = new CartMapper();
    $mapper->insertProductToCart($userId,$prodId,$prodEmri,$prodPhoto,$prodCmimi,$prodType);
    header('Location:../views/shop.php');
}
