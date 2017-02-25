<?php

class User{
    
    private $id;
    private $name;
    private $password;
    private $email;
    private $power;
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return the $email
     */
    public function getemail()
    {
        return $this->email;
    }

    /**
     * @return the $power
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param field_type $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param field_type $email
     */
    public function setemail($email)
    {
        $this->email = $email;
    }

    /**
     * @param field_type $power
     */
    public function setPower($power)
    {
        $this->power = $power;
    }

    
}