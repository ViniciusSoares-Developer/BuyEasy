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

    public function getProductsWithLimit($id) {
        $sql = "SELECT * FROM `products` WHERE `id` = $id ORDER BY  `id` DESC LIMIT 4";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByUserWithLimit($idP, $idU) {
        $sql = "SELECT * FROM `products` WHERE `id` <> $idP AND `id_merchant` = $idU ORDER BY `id` DESC LIMIT 4";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByUser($idU) {
        $sql = "SELECT * FROM `products` WHERE `id_merchant` = :id";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id", $idU);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductByIdAndUser($idP, $idU) {
        $sql = "SELECT * FROM `products` WHERE `id_merchant` = $idU AND `id` = $idP";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    public function getProducts() {
        $sql = "SELECT * FROM `products` ORDER BY `id` DESC LIMIT 4";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProduct($idP) {
        $sql = "SELECT products.*, users.id id_user, users.image_path image_user, users.name name_user
        FROM `products`
        INNER JOIN `users` ON products.id_merchant = users.id
        WHERE products.id = $idP";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    public function getProductsByName($name) {
        $sql = "SELECT * FROM `products` WHERE `name` LIKE '%$name%' AND `id`";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function add() {
        $sql = "INSERT INTO `products`(`image_path`, `name`, `price`, `description`, `id_merchant`, `date_increament`)
        VALUES (:img, :n, :p, :d, :id, NOW())";
        $db = Database::connection();
        $stmt = $db->prepare($sql);

        $img = $this->getImage();
        $folder = "archives/products/";
        $nameArchive = uniqid();
        $extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
        if ($extension != "jpg" && $extension != "png" && $extension != "jpge") return false;
        if ($img["size"] > 256000) return false;
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
        `image_path` = :img,
        `name` = :n,
        `price` = :p,
        `description` = :d
        WHERE `id` = $id and `id_merchant` = :id";
        $db = Database::connection();
        $stmt = $db->prepare($sql);

        $img = $this->getImage();
        $folder = "archives/products/";
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
        $sql = "DELETE FROM `products`
        WHERE `products`.`id` = :id and `products`.`id_merchant` = :idU";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":idU", $_SESSION['user']['id']);
        return $stmt->execute();
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