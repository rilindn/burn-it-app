<?php

include_once 'productMapper.php';
include_once '../dbConfig/databaseConfig.php';

if (isset($_GET['id'])&&isset($_GET['edit-name'])
   &&isset($_GET['edit-photo'])&&isset($_GET['edit-price'])
   &&isset($_GET['edit-type'])) {
    $prodId = $_GET['id'];
    $prodName = $_GET['edit-name'];
    $prodPhoto = $_GET['edit-photo'];
    $prodPrice = $_GET['edit-price'];
    $prodType = $_GET['edit-type'];
    $mapper = new ProdMapper();
    $mapper->updateProd($prodId,$prodName,$prodPrice,$prodType);
    if($prodPhoto!=null){
        $mapper->updateProdPhoto($prodId,$prodPhoto);
    }
    header("Location:../views/dashboard.php");
}
