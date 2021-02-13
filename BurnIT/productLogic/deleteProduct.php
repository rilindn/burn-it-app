<?php
include_once 'productMapper.php';

if (isset($_GET['id'])) {
    $prodId = $_GET['id'];
    $mapper = new ProdMapper();
    $mapper->deleteProd($prodId);
    header("Location:../views/dashboard.php");
}
