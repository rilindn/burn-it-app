<?php
require_once 'personClass.php';


class Admin extends Person
{
    public function __construct($username,$email,$password,$role)
    {
        parent::__construct($username,$email,$password,$role); //equivalent to super in java
    }


    public function setSession()
    {
        $_SESSION["role"] = 1;
    }

    public function setCookie()
    {
        setcookie("username", $this->getUsername(), time() + 2 * 24 * 60 * 60);
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getRole()
    {
        return $this->role;
    }
}
