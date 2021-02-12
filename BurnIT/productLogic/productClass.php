<?php

class Product
{
    protected $emri;
    protected $photo;
    protected $cmimi;
    protected $type;

    function __construct($emri,$photo,$cmimi,$type)
    {
        $this->emri = $emri;
        $this->photo = $photo;
        $this->cmimi = $cmimi;
        $this->type = $type;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function getEmri()
    {
        return $this->emri;
    }
    public function getCmimi()
    {
        return $this->cmimi;
    }
    public function getType()
    {
        return $this->type;
    }
}
