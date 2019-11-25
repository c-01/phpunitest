<?php


namespace App\Models;


class User
{
    private $first_name;
    private $last_name;
    private $_email;

    public function setFirstName($firstName)
    {
        $this->first_name = trim($firstName);
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($lastName)
    {
        $this->last_name = trim($lastName);
    }

    public function getFullName()
    {
        return sprintf('%s %s',$this->first_name, $this->last_name);
    }

    public function setEmail(string $email)
    {
        $this->_email = $email;
    }

    public function getEmail() : string
    {
        return $this->_email;
    }
}