<?php
include_once 'adminClass.php';
include_once 'simpleUserClass.php';
require_once 'userMapper.php';
session_start();

if (isset($_POST['login-btn'])) {
    $login = new LoginLogic($_POST);
    $login->verifyData();
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
