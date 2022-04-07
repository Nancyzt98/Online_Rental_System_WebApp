<?php

namespace App;

class User{

    public $full_name;

    public $email;

    public function setFullName($fullName){

        $this->full_name = $fullName;
        
    }

    public function getFullName(){

        return $this->full_name;
        
    }

    public function setEmail($email){
        
        $this->email = $email;
    }

    public function getEmail(){

        return $this->email;
        
    }
}