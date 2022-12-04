<?php

require "./model/entities/Product.php";

class ProductService {
    private Product $product;


    function __construct(Product $product)
    {
        $this->setProduct($product);
    }

	public function getProduct(): Product {
		return $this->product;
	}
	public function setProduct(Product $product): self {
		$this->product = $product;
		return $this;
	}

    function getAllProductsDESC()
    {
        $sql = "SELECT p.*, u.`name` nameUser, u.`imgPath` imgUser FROM `products` p INNER JOIN `users` u
        ON p.`idUser` = u.`id` ORDER BY p.`id` DESC";
        $db = Database::connection();
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProductById(int $value)
    {
        $sql = "SELECT p.*, u.`name` nameUser, u.`imgPath` imgUser FROM `products` p INNER JOIN `users` u
        ON p.`idUser` = u.`id` WHERE p.`id` = $value ORDER BY p.`name` ASC;";
        $db = Database::connection();
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUserProducts(int $value)
    {
        $sql = "SELECT * FROM `products` WHERE `idUser` = $value;";
        $db = Database::connection();
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUserNotProducts(int $value)
    {
        $sql = "SELECT p.*, u.`name` nameUser, u.`imgPath` imgUser FROM `products` p INNER JOIN `users` u
        ON p.`idUser` = u.`id` WHERE p.`idUser` <> $value ORDER BY p.`id` DESC;";
        $db = Database::connection();
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function search($arg)
    {
        $sql = "SELECT * FROM `products` WHERE `name` LIKE '%$arg%'";
        $db = Database::connection();
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function searchProductUser($arg)
    {
        $sql = "SELECT * FROM `products` WHERE `name` LIKE '%$arg%' AND `id` = $_SESSION[user][id]";
        $db = Database::connection();
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function register()
    {
        $product = $this->getProduct();
        $sql = "INSERT INTO `products` (`name`, `imgPath`, `description`, `price`, `idUser`)
        VALUES (:name, :imgPath, :description, :price, :idUser);";
        $db = Database::connection();
        $stmt = $db->prepare($sql);

        $img = $product->getImage();
        $folder = "archives/products/";
        $nameArchive = uniqid();
        $extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
        if ($extension != "jpg" && $extension != "png" && $extension != "jpeg")
            return false;
        if ($img["size"] > 256000)
            return false;
        $path = $folder . $nameArchive . "." . $extension;

        if (move_uploaded_file($img["tmp_name"], $path)){
            $stmt->bindValue(':name', $product->getName());
            $stmt->bindValue(':imgPath', $path);
            $stmt->bindValue(':description', $product->getDescription());
            $stmt->bindValue(':price', $product->getPrice());
            $stmt->bindValue(':idUser', $product->getSellerId());
            return $stmt->execute();
        }
        return false;
    }

    function edit(int $value)
    {
        $product = $this->getProduct();
        $sql = "UPDATE `products` SET
        `name` = :name,
        `imgPath` = :imgPath,
        `description` = :description,
        `price` = :price WHERE `id` = :id AND `idUser` = :idUser;";
        $db = Database::connection();
        $stmt = $db->prepare($sql);

        $img = $product->getImage();
        $folder = "archives/products/";
        $nameArchive = uniqid();
        $extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
        if ($extension != "jpg" && $extension != "png" && $extension != "jpeg")
            return false;
        if ($img["size"] > 256000)
            return false;
        $path = $folder . $nameArchive . "." . $extension;
        // var_dump($path);
        if (move_uploaded_file($img["tmp_name"], $path)){
            $stmt->bindValue(':name', $product->getName());
            $stmt->bindValue(':imgPath', $path);
            $stmt->bindValue(':description', $product->getDescription());
            $stmt->bindValue(':price', $product->getPrice());
            $stmt->bindValue(':id', $value);
            $stmt->bindValue(':idUser', $product->getSellerId());
            // var_dump("a");
            // var_dump($value);
            // var_dump($stmt);die;
            return $stmt->execute();
        }
    }
}