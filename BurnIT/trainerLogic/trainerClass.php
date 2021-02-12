<?php

class Trainer {

    protected $name;
    protected $photo;
    protected $age;
    protected $qualification;

    public function __construct($name,$photo,$age,$qualification){

        $this->name=$name;
        $this->photo=$photo;
        $this->age=$age;
        $this->qualification=$qualification;
    }
    public function getName(){
        return $this->name;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function getAge(){
        return $this->age;
    }
    public function getQualification(){
        return $this->qualification;
    }
}