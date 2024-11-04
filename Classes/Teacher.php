<?php

class Teacher
{
    public $firstname;
    public $lastname;
    public $email;
    private $password;
    
    public function insert($value, $art)
    {
        //Vorname
        if($art == "firstname")
        {
            $this->firstname = $value;
            return $this->firstname;
        }
        
        //Nachname
        if ($art == "lastname")
        {
            $this->lastname = $value;
            return $this->lastname;
        }

        //EMail
        if ($art == "email")
        {
            $this->email = $value;
            return $this->email;
        }

        //Passwort
        if ($art == "password")
        {
            $this->password = $value;
            return $this->password;
        }
    }

}
?>