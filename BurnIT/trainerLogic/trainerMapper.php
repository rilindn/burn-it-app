<?php

include_once "../dbConfig/databaseConfig.php";

class TrainerMapper extends DatabasePDOConfiguration{

    private $conn;
    private $query;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getAllTrainers(){
        $this->query = "select * from trainer";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function insertTrainer($trainer){
        $this->query = "insert into trainer (name,photo,age,qualification) values (:name,:photo,:age,:qualification)";
        $statement = $this->conn->prepare($this->query);
        $name = $trainer->getName();
        $photo = $trainer->getPhoto();
        $age = $trainer->getAge();
        $qualification = $trainer->getQualification();
        $statement->bindParam(":name",$name);
        $statement->bindParam(":photo",$photo);
        $statement->bindParam(":age",$age);
        $statement->bindParam(":qualification",$qualification);
        $statement->execute();
    }
    public function deleteTrainer($trainerId)
    {
        $this->query = "delete from trainer where trainerid=:trainerid";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":trainerid", $trainerId);
        $statement->execute();
    }
}