<?php
include_once 'productMapper.php';
include_once '../businessLogic/databaseConfig.php';

if (isset($_GET['id'])) {
    $prodId = $_GET['id'];
    $mapper = new ProdMapper();
    $mapper->deleteProd($prodId);
    header("Location:../dashboard.php");
}
