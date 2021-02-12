<?php
include_once 'trainerClass.php';
require_once 'trainerMapper.php';


if (isset($_POST['register-trainer'])) {
    $register = new RegisterTrainer($_POST);
    $register->addNewTrainer();
} 
else {
    header("Location:../views/dashboard.php");
}

class RegisterTrainer
{
    private $photo = "";
    private $name = "";
    private $age = "";
    private $qualification = "";

    public function __construct($formData)
    {   
        $this->name = $formData['name'];
        $this->photo = $formData['image'];
        $this->age = $formData['age'];
        $this->qualification = $formData['qualification'];
    }

    public function addNewTrainer()
    {   
        if($this->dataFilled($this->name,$this->photo,$this->age))
        {   
            $mapper = new TrainerMapper();
            $trainer = new Trainer($this->name,$this->photo,$this->age,$this->qualification);
            $mapper->insertTrainer($trainer);
            header('Location:../views/dashboard.php');
        }
    }
    

    private function dataFilled($name,$photo,$age)
    {
        if (empty($name) || empty($photo) || empty($age)) {
            return false;
        }
        return true;
    }
}

