<?php

class User{
    private $name;
    private $email;
    private $password;
    private $merchant;
    private $phone;
    private $image;

    //constructor
    public function __construct($name, $password, $email, $merchant, $phone, $image){  
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setMerchant($merchant);
        $this->setPhone($phone);
        $this->setImage($image);
    }

    public function searchUser(){
        $sql = "SELECT * FROM `users` WHERE `name` = :l OR `email` = :l";
        $db = Database::connection();
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
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':e', $email);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return !empty($list)? $list[0] : null;
    }
    public function login(){
        if($this->getName() && $this->getPassword()){
            $userData = $this->searchUser();
            if($userData != null && $userData['password'] === $this->getPassword()){
                $_SESSION['user'] = $userData;
                return true;
            }
            return false;
        }
    }
    public function register(){
        $sql = "INSERT INTO `users`(`name`, `email`, `password`, `merchant`, `data_increament`) values (:n, :e, :p, :m, NOW())";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':n', $this->getName());
        $stmt->bindValue(':e', $this->getEmail());
        $stmt->bindValue(':p', $this->getPassword());
        $stmt->bindValue(':m', $this->getMerchant());
        if(!$this->searchUser()){
            return $stmt->execute();
        }
        return false;
    }
    public function editInfo(){
        if ($_SESSION && isset($_SESSION['user']['id'])) {
            $sql = "UPDATE `users` SET `image_path` = :img, `name` = :n, `phone` = :p WHERE `id` = :id";
            $db = Database::connection();
            $stmt = $db->prepare($sql);
            
            $img = $this->getImage();
            $folder = "../archives/users/";
            $nameArchive = uniqid();
            $extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
            if ($extension != "jpg" && $extension != "png") return false;
            $path = $folder . $nameArchive . "." . $extension;
            
            if (move_uploaded_file($img['tmp_name'], $path)) {
                $stmt->bindValue(':img', $path);
                $stmt->bindValue(':n', $this->getName());
                $stmt->bindValue(':p', $this->getPhone());
                $stmt->bindValue(':id', $_SESSION['user']['id']);
                return $stmt->execute();
            }
        }
    }
    public function editEmail() {
        if ($_SESSION && isset($_SESSION['user']['id'])) {
            $sql = "UPDATE `users` SET `password` = :p, `email` = :e WHERE `id` = :id";
            $db = Database::connection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':e', $this->getEmail());
            $stmt->bindValue(':id', $_SESSION['user']['id']);
            return $stmt->execute();
        }
    }
    public function editPassword() {
        if ($_SESSION && isset($_SESSION['user']['id'])) {
            $sql = "UPDATE `users` SET `password` = :p, `email` = :e WHERE `id` = :id";
            $db = Database::connection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':e', $this->getPassword());
            $stmt->bindValue(':id', $_SESSION['user']['id']);
            return $stmt->execute();
        }
        return false;
    }
    public function verifyAcess($passwordV){
        if ($_SESSION) {
            $password = $this->searchUserByEmail($_SESSION['user']['email']);
            return ($password != null && $password === sha1($passwordV)); 
        }
    }
    public function getUserById($id) {
        $sql = "SELECT * FROM `users` WHERE `id` = $id";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return !empty($list)?$list[0]:null;
    }

    //Getters and Setters
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
    public function getMerchant(){
        return $this->merchant;
    }
    public function setMerchant($merchant){
        $this->merchant = $merchant;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }
}