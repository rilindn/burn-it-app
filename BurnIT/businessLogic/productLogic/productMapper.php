<?php
require_once "databaseConfig.php";

class ProdMapper extends DatabasePDOConfiguration
{

    private $conn;
    private $query;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getProdByID($prodId)
    {
        $this->query = "select * from product where prodid=:prodid";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":prodid", $prodId);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getProdByName($name)
    {
        $this->query = "select * from product where prodEmri=:emri";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":emri", $name);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getUserNameById($userid)
    {
        $this->query = "select userid from product where userid=:userid";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":userid", $userid);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllProducts()
    {
        $this->query = "select * from product";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function insertProduct($prod)
    {
        $this->query = "insert into product (prodEmri, prodPhoto,prodCmimi,prodType) values(:emri,:photo,:cmimi,:type)";
        $statement = $this->conn->prepare($this->query);
        $emri = $prod->getEmri();
        $photo = $prod->getPhoto();
        $cmimi = $prod->getCmimi();
        $type = $prod->getType();
        $statement->bindParam(":emri", $emri);
        $statement->bindParam(":photo", $photo);
        $statement->bindParam(":cmimi", $cmimi); 
        $statement->bindParam(":type", $type); 
        $statement->execute();
    }
    public function deleteProd($prodId)
    {
        $this->query = "delete from product where prodid=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $prodId);
        $statement->execute();
    }
}
