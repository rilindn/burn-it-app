<?php
include_once "../dbConfig/databaseConfig.php";

class UserMapper extends DatabasePDOConfiguration
{

    private $conn;
    private $query;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    
    public function getLogedInUserId($username){

        $this->query = "select * from user where userName=:username LIMIT 1";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":username", $username);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }

    public function getUserByID($userId)
    {
        $this->query = "select * from user where userid=:userid";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":userid", $userId);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUserByUsername($username)
    {
        $this->query = "select * from user where userName=:username";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":username", $username);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getUserNameById($userid)
    {
        $this->query = "select userName from user where userid=:userid";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":userid", $userid);
        $statement->execute();
        $result = $statement->fetchColumn();
        return $result;
    }

    public function getAllUsers()
    {
        $this->query = "select * from user";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllUsersExcept($userId)
    {
        $this->query = "select * from user where userid!=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $userId);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertUser(\SimpleUser $user)
    {
        $this->query = "insert into User (userName, userEmail,userPassword,role) values (:username,:email,:pass,:role)";
        $statement = $this->conn->prepare($this->query);
        $username = $user->getUsername();
        $email = $user->getEmail();
        $pass = password_hash($user->getPassword(), PASSWORD_BCRYPT);
        $role = $user->getRole();
        $statement->bindParam(":username", $username);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":pass", $pass);
        $statement->bindParam(":role", $role);
        $statement->execute();
    }

    public function updateUser($userId,$userName,$userEmail)
    {
        $this->query = "update user set userName=:username,userEmail=:email where userid=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $userId);
        $statement->bindParam(":username",$userName);
        $statement->bindParam(":email", $userEmail);
        $statement->execute();
    }

    public function deleteUser($userId)
    {
        $this->query = "delete from user where userid=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $userId);
        $statement->execute();
    }

    public function makeAdmin($userId)
    {
        $this->query = "update user set role='1' where userid=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $userId);
        $statement->execute();
    }
}
