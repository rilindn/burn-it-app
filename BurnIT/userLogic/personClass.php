<?php

abstract class Person
{
    protected $username;
    protected $password;
    protected $email;
    protected $role;

    function __construct($username,$email,$password,$role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    abstract protected function setSession();
    abstract protected function setCookie();
}
