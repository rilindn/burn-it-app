<?php
include_once 'productClass.php';
require_once 'productMapper.php';


if (isset($_POST['register-prod'])) {
    $register = new RegisterProd($_POST);
    $register->insertProd();
} 
else {
    header("Location:../dashboard.php");
}

class RegisterProd
{
    private $photo = "";
    private $emri = "";
    private $cmimi = "";
    private $type = "";

    public function __construct($formData)
    {   
        $this->emri = $formData['emri'];
        $this->photo = $formData['image'];
        $this->cmimi = $formData['cmimi'];
        $this->type = $formData['type'];
    }

    public function insertProd()
    {   
        if($this->dataFilled($this->emri,$this->photo,$this->cmimi))
        {   
            $mapper = new ProdMapper();
            $prod = new Product($this->emri,$this->photo,$this->cmimi,$this->type);
            $mapper->insertProduct($prod);
            header('Location:../dashboard.php');
        }
    }
    

    private function dataFilled($emri, $photo,$cmimi)
    {
        if (empty($emri) || empty($photo) || empty($cmimi)) {
            return false;
        }
        return true;
    }
}

