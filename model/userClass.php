<?php

class User
{
    private $name;
    private $email;
    private $password;
    private $type;
    private $phone;
    private $whatsapp;
    private $instagram;
    private $facebook;
    private $image;

    //constructor
    public function __construct(
        $name,
        $password,
        $email,
        $type,
        $phone,
        $whatsapp,
        $instagram,
        $facebook,
        $image)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->settype($type);
        $this->setPhone($phone);
        $this->setWhatsapp($whatsapp);
        $this->setInstagram($instagram);
        $this->setFacebook($facebook);
        $this->setImage($image);
    }

    public function searchUser()
    {
        $sql = "SELECT * FROM `users` WHERE `name` = :l OR `email` = :l";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':l', $this->getName());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    public function getUsersMerchant(){
        $sql = "SELECT * FROM `users` WHERE `type` = 2 ORDER BY `id` DESC LIMIT 5;";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function searchUserByEmail($email)
    {
        $sql = "SELECT * FROM `users` WHERE `email` = :e";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':e', $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function login()
    {
        if ($this->getName() && $this->getPassword()) {
            $userData = $this->searchUser();
            if ($userData != null && $userData['password'] === $this->getPassword()) {
                $_SESSION['user'] = $userData;
                return true;
            }
            return false;
        }
    }
    public function register()
    {
        $sql = "INSERT INTO `users`(`name`, `email`, `password`, `type`, `data_increament`) values (:n, :e, :p, :m, NOW())";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':n', $this->getName());
        $stmt->bindValue(':e', $this->getEmail());
        $stmt->bindValue(':p', $this->getPassword());
        $stmt->bindValue(':m', $this->gettype());
        if (!$this->searchUser()) {
            return $stmt->execute();
        }
        return false;
    }
    public function editImage()
    {
        $sql = "UPDATE `users` SET `image_path` = :img WHERE `id` = :id";
        $db = Database::connection();
        $stmt = $db->prepare($sql);

        if ($_SESSION && isset($_SESSION['user']['id'])) {
        $img = $this->getImage();
        $folder = "../archives/users/";
        $nameArchive = uniqid();
        $extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
        if ($extension != "jpg" && $extension != "png") return false;
        $path = $folder . $nameArchive . "." . $extension;
        }

        if (move_uploaded_file($img['tmp_name'], $path)) {
            $stmt->bindValue(':img', $path);
            $stmt->bindValue(':id', $_SESSION['user']['id']);
            return $stmt->execute();
        }
    }
    public function editInfo()
    {
        if ($_SESSION && isset($_SESSION['user']['id'])) {
            $sql = "UPDATE `users` SET `name` = :n, `phone` = :p, `whatsapp` = :w, `facebook` = :f, `instagram` = :i WHERE `id` = :id";
            $db = Database::connection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':n', $this->getName());
            $stmt->bindValue(':p', $this->getPhone());
            $stmt->bindValue(':w', $this->getWhatsapp());
            $stmt->bindValue(':i', $this->getInstagram());
            $stmt->bindValue(':f', $this->getFacebook());
            $stmt->bindValue(':id', $_SESSION['user']['id']);
            return $stmt->execute();
        }
    }
    public function editEmail()
    {
        if ($_SESSION && isset($_SESSION['user']['id'])) {
            $sql = "UPDATE `users` SET `password` = :p, `email` = :e WHERE `id` = :id";
            $db = Database::connection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':e', $this->getEmail());
            $stmt->bindValue(':id', $_SESSION['user']['id']);
            return $stmt->execute();
        }
    }
    public function editPassword()
    {
        if ($_SESSION && isset($_SESSION['user']['id'])) {
            $sql = "UPDATE `users` SET `password` = :p WHERE `id` = :id";
            $db = Database::connection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':p', $this->getPassword());
            $stmt->bindValue(':id', $_SESSION['user']['id']);
            return $stmt->execute();
        }
        return false;
    }
    public function verifyAcess($passwordV)
    {
        if ($_SESSION) {
            $password = $this->searchUserByEmail($_SESSION['user']['email'])[0]["password"];
            return ($password != null && $password === sha1($passwordV));
        }
    }
    public function getUserById($id)
    {
        $sql = "SELECT * FROM `users` WHERE `id` = $id";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    public function getUsers()
    {
        $sql = "SELECT * FROM `users` ORDER BY `id` DESC";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function levelAcess()
    {
        return isset($_SESSION['user']) ? $_SESSION['user']['type'] : null;
    }

    //Getters and Setters
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = sha1($password);
    }
    public function gettype()
    {
        return $this->type;
    }
    public function settype($type)
    {
        $this->type = $type;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getWhatsapp(){
        return $this->whatsapp;
    }

    public function setWhatsapp($whatsapp){
        $this->whatsapp = $whatsapp;
    }

    public function getInstagram(){
        return $this->instagram;
    }

    public function setInstagram($instagram){
        $this->instagram = $instagram;
    }

    public function getFacebook(){
        return $this->facebook;
    }

    public function setFacebook($facebook){
        $this->facebook = $facebook;
    }
}
