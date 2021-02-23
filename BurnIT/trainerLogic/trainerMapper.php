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

    public function updateTrainer($trainerId,$trainerName,$trainerAge,$trainerQualification)
    {
        $this->query = "update trainer set name=:name,age=:age,qualification=:qualification where trainerid=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $trainerId);
        $statement->bindParam(":name",$trainerName);
        $statement->bindParam(":age",$trainerAge);
        $statement->bindParam(":qualification",$trainerQualification);
        $statement->execute();
    }
    public function updateTrainerPhoto($trainerId,$trainerPhoto)
    {
         $this->query = "update trainer set photo=:photo where trainerid=:id";
         $statement = $this->conn->prepare($this->query);
         $statement->bindParam(":id", $trainerId);
         $statement->bindParam(":photo",$trainerPhoto);
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