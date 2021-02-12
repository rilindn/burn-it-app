<?php
include_once "../dbConfig/databaseConfig.php";
require_once '../productLogic/productClass.php';
require_once '../productLogic/productMapper.php';

class CartMapper extends DatabasePDOConfiguration
{

    private $conn;
    private $query;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getProdUserByID($userId)
    {
        $this->query = "select * from cart where userid=:userid";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":userid", $userId);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllProducts()
    {
        $this->query = "select * from cart";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
    
    public function insertProductToCart($userId,$prodId,$prodEmri,$prodPhoto,$prodCmimi,$prodType)
    {
        $this->query = "insert into cart (userid,prodid,prodEmri,prodPhoto,prodCmimi,prodType) values(:userid,:prodid,:emri,:photo,:cmimi,:type)";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":userid", $userId);
        $statement->bindParam(":prodid", $prodId);
        $statement->bindParam(":emri", $prodEmri);
        $statement->bindParam(":photo", $prodPhoto);
        $statement->bindParam(":cmimi", $prodCmimi); 
        $statement->bindParam(":type", $prodType); 
        $statement->execute();
    }
    public function deleteFromCart($cartId)
    {
        $this->query = "delete from cart where cartid=:cartid";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":cartid", $cartId);
        $statement->execute();
    }
}
