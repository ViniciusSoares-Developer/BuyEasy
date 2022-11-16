<?php

class Account {
    private $name;
    private $emailLogin;
    private $password;

    private User $user;

    public function __construct($name, $emailLogin, $password, User $user){
        $this->setName($name);
        $this->setEmailLogin($emailLogin);
        $this->setPassword($password);
        $this->setUser($user);
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getEmailLogin(){
        return $this->emailLogin;
    }

    public function setEmailLogin($emailLogin){
        $this->emailLogin = $emailLogin;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        if ($password) {
            $this->password = sha1($password);
        }
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
    }

    public static function logout(){
        unset($_SESSION['user']);
    }
}