<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/26/2019
 * Time: 2:43 PM
 */

class Customer
{
    public $firstName;
    public $lastName;
    public $phone;
    public $email;
    public $city;
    public $state;
    public $address;
    public $id;

    public function __construct($firstName, $lastName, $phone, $email, $city, $state, $address, $id = null)
    {
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->phone=$phone;
        $this->email=$email;
        $this->city=$city;
        $this->state=$state;
        $this->address=$address;
        $this->id = $id;
    }
}