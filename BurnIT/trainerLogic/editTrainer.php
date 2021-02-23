<?php

include_once 'trainerMapper.php';
include_once '../dbConfig/databaseConfig.php';

if (isset($_GET['id'])&&isset($_GET['edit-name'])
   &&isset($_GET['edit-photo'])&&isset($_GET['edit-age'])
   &&isset($_GET['edit-qualification'])) {
    $trainerId = $_GET['id'];
    $trainerName = $_GET['edit-name'];
    $trainerPhoto = $_GET['edit-photo'];
    $trainerAge = $_GET['edit-age'];
    $trainerQualification = $_GET['edit-qualification'];
    $mapper = new TrainerMapper();
    $mapper->updateTrainer($trainerId,$trainerName,$trainerAge,$trainerQualification);
    if($trainerPhoto!=null){
        $mapper->updateTrainerPhoto($trainerId,$trainerPhoto);
    }
    header("Location:../views/dashboard.php");
}
