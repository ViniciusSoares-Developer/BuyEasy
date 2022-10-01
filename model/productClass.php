<?php

class Product {
    private $image;
    private $name;
    private $price;
    private $description;

    public function __construct ($image, $name, $price, $description) {
        $this->setImage($image);
        $this->setName($name);
        $this->setPrice($price);
        $this->setDescription($description);
    }

    public function getProducts() {
        $sql = "SELECT * FROM `products`";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return !empty($list)?$list:null;
    }
    public function getProductsByUser($idU) {
        $sql = "SELECT * FROM `products` WHERE `id_merchant` = $idU";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return !empty($list)?$list:null;
    }
    public function getProduct($idP) {
        $sql = "SELECT products.*, users.id id_user, users.image_path image_user, users.name name_user
        FROM `products`
        INNER JOIN `users` ON products.id_merchant = users.id
        WHERE products.id = $idP";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return !empty($list)?$list[0]:null;
    }
    public function getProductsByName($name) {
        $sql = "SELECT * FROM `products` WHERE `name` LIKE '$name%' AND `id` BETWEEN 1 AND 10";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return !empty($list)?$list:null;
    }
    public function add() {
        $sql = "INSERT INTO `products`(`image_path`, `name`, `price`, `description`, `id_merchant`, `date_increament`)
        VALUES (:img, :n, :p, :d, :id, NOW())";
        $db = Database::connection();
        $stmt = $db->prepare($sql);

        $img = $this->getImage();
        $folder = "../archives/products/";
        $nameArchive = uniqid();
        $extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
        if ($extension != "jpg" && $extension != "png") return false;
        $path = $folder . $nameArchive . "." . $extension;

        if (move_uploaded_file($img["tmp_name"], $path)) {
            $stmt->bindValue(':img', $path);
            $stmt->bindValue(':n', $this->getName());
            $stmt->bindValue(':p', $this->getPrice());
            $stmt->bindValue(':d', $this->getDescription());
            $stmt->bindValue(':id', $_SESSION['user']['id']);
            return $stmt->execute();
        }
    }
    public function edit($id) {
        $sql = "UPDATE `products` SET
        `img_path` = :img,
        `name` = :n,
        `price` = :p,
        `description` = :d
        WHERE `id` = $id";
        $db = Database::connection();
        $stmt = $db->prepare($sql);

        $img = $this->getImage();
        $folder = "../archives/products/";
        $nameArchive = uniqid();
        $extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
        if ($extension != "jpg" && $extension != "png") return false;
        $path = $folder . $nameArchive . "." . $extension;

        if (move_uploaded_file($img["tmp_name"], $path)) {
            $stmt->bindValue(':img', $path);
            $stmt->bindValue(':n', $this->getName());
            $stmt->bindValue(':p', $this->getPrice());
            $stmt->bindValue(':d', $this->getDescription());
            $stmt->bindValue(':id', $_SESSION['user']['id']);
            return $stmt->execute();
        }
    }
    public function remove($id) {
        $sql = "DELETE FROM `products` WHERE `id` = $id";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }

    //Getters and setters
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
}