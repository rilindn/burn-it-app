<?php

class Product
{
    protected $userid;
    protected $prodid;
    protected $emri;
    protected $photo;
    protected $cmimi;
    protected $type;

    function __construct($userid,$prodid,$emri,$photo,$cmimi,$type)
    {
        $this->userid = $userid;
        $this->prodid = $prodid;
        $this->emri = $emri;
        $this->photo = $photo;
        $this->cmimi = $cmimi;
        $this->type = $type;
    }
    public function getUserId()
    {
        return $this->userid;
    }
    public function getProdId()
    {
        return $this->prodid;
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
