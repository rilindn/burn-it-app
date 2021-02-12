<?php
include_once 'adminClass.php';
include_once 'simpleUserClass.php';
require_once 'userMapper.php';
session_start();

if (isset($_POST['login-btn'])) {
    $login = new LoginLogic($_POST);
    $login->verifyData();
} 
else if (isset($_POST['register-btn'])) {
    $register = new RegisterLogic($_POST);
    $register->insertData();
} 
else {
    header("Location:../index.php");
}

class LoginLogic
{
    private $username = "";
    private $password = "";

    public function __construct($formData)
    {
        $this->username = $formData['username'];
        $this->password = $formData['password'];
    }

    public function verifyData()
    {
        if ($this->variablesNotDefinedWell($this->username, $this->password)) {
            header("Location:../login.php");
        } 
        else if ($this->dataCorrect($this->username, $this->password)) {
            $_SESSION['userName'] =$this->username;
            header('Location:../index.php');
        } 
        else {
            header("Location:../login.php");
        }
    }

    private function variablesNotDefinedWell($username, $password)
    {
        if (empty($username) || empty($password)) {
            return true;
        }
        return false;
    }

    private function dataCorrect($username, $password)
    {
        $mapper = new UserMapper();
        $user = $mapper->getUserByUsername($username);
        if ($user == null || count($user) == 0) return false;
        else if (password_verify($password, $user['userPassword'])) {
            if ($user['role'] == 1) {
                $obj = new Admin($user['userName'],$user['userEmail'], $user['userPassword'], $user['role']);
                $obj->setSession();
            } else {
                $obj = new SimpleUser($user['userName'],$user['userEmail'], $user['userPassword'], $user['role']);
                $obj->setSession();
            }
            return true;
        } else return false;
    }
}

class RegisterLogic
{
    private $username = "";
    private $email = "";
    private $password = "";
    private $password2 = "";
    private $usernameRegex = "/^[a-zA-Z0-9]+$/";
    private $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    private $emailRegex = "/^\S+@\S+\.\S+$/";

    public function __construct($formData)
    {
        $this->username = $formData['register-username'];
        $this->email = $formData['register-email'];
        $this->password = $formData['register-password'];
        $this->password2 = $formData['register-password2'];
    }

    public function insertData()
    {
        $user = new SimpleUser($this->username,$this->email,$this->password,0);

        if($this->variablesNotDefinedWell($this->username,$this->email,$this->password,$this->password2)&&
            $this->dataCorrect($this->username,$this->email,$this->password,$this->password2)){
            $mapper = new UserMapper();
            $mapper->insertUser($user);
            if($this->usernameAndPasswordCorrect($this->username,$this->password)){
                header('Location:../index.php');
                alert("You have been registered succesfully!");
            }
        }
    }

    private function variablesNotDefinedWell($username,$email,$password,$password2)
    {
        if (empty($username) || empty($email) ||empty($password) || empty($password2)) {
            return false;
        }
        return true;
    }

    private function dataCorrect($username,$email,$password,$password2){

        if(!preg_match($this->usernameRegex,$username)){
            return false;
        }
        else if(!preg_match($this->emailRegex,$email)){
            return false;
        }
        else if(!preg_match($this->passwordRegex,$password)){
            return false;
        }
        else if($password!=$password2){
            return false;
        }
        else{
            return true;
        }
    }

    private function usernameAndPasswordCorrect($username, $password)
    {
        $mapper = new UserMapper();
        $user = $mapper->getUserByUsername($username);
        if ($user == null || count($user) == 0) return false;
        else if (password_verify($password, $user['userPassword'])) {
            if ($user['role'] == 1) {
                $obj = new Admin($user['id'], $user['username'], $user['password'], $user['role']);
                $obj->setSession();
            } 
            else {
                $obj = new SimpleUser($user['id'], $user['username'], $user['password'], $user['role']);
                $obj->setSession();
            }
            return true;
        } else return false;
    }
}
