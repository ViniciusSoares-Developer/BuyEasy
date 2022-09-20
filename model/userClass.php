<?php
@session_start();

class User{
    private $name;
    private $email;
    private $password;

    public function __construct($name, $password, $email){  
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = sha1($password);
    }

    public function searchUser(){
        $sql = "SELECT * FROM `users` WHERE `name` = :l OR `email` = :l";
        $db = Database::conexao();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':l', $this->getName());
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($list){
            return $list[0];
        }
    }

    public function searchUserByEmail($email){
        $sql = "SELECT * FROM `users` WHERE `email` = :e";
        $db = Database::conexao();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':e', $email);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($list);
        if($list){
            return $list[0];
        }
    }

    public function register_db(){
        $sql = "INSERT INTO `users`(`name`,`email`,`password`) values (:n, :e, :p)";
        $db = Database::conexao();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':n', $this->getName());
        $stmt->bindValue(':e', $this->getEmail());
        $stmt->bindValue(':p', $this->getPassword());
        if(!$this->searchUser()){
            return $stmt->execute();
        }
        return false;
    }

    public function verificationLogin(){
        if($this->getName() && $this->getPassword()){
            $userData = $this->searchUser();
            if($userData['password'] == $this->getPassword()){
                return $userData;
            }
        }
    }
}