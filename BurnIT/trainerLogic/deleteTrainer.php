<?php
include_once 'trainerMapper.php';
include_once '../dbConfig/databaseConfig.php';

if (isset($_GET['id'])) {
    $trainerId = $_GET['id'];
    $mapper = new TrainerMapper();
    $mapper->deleteTrainer($trainerId);
    header("Location:../views/dashboard.php");
}