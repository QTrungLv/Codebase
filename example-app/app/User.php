<?php

class User
{
    protected $user, $name, $address, $education;

    public function __construct()
    {
        $this->user = require_once 'data.php';
        $this->name = $this->user['name'];
        $this->address = $this->user['address'];
        $this->education = $this->user['education'];
    }

    public function getFullname()
    {
        return $this->name['fullname'];
    }

    public function getUsername()
    {
        return $this->name['username'];
    }

    public function getNumberHouse()
    {
        return $this->address['number_house'];
    }

    public function getStreet()
    {
        return $this->address['street'];
    }

    public function getCity()
    {
        return $this->address['city'];
    }

    public function getPrimarySchool()
    {
        return $this->education['primary_school'];
    }

    public function getJuniorHighSchool()
    {
        return $this->education['junior_high_school'];
    }

    public function getHighSchool()
    {
        return $this->education['high_school'];
    }

    public function getUniversity()
    {
        return $this->education['university'];
    }
}
