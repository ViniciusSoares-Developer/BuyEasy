<?php
@session_start();
require "./model/entities/Cart.php";

class CartService {
    private Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->setCart($cart);
    }
    
	function getCart(): Cart {
		return $this->cart;
	}
	
	function setCart(Cart $cart): self {
		$this->cart = $cart;
		return $this;
	}

    public function getBuys() {
        if (isset($_SESSION['user'])) {
            $sql = "SELECT DISTINCT id, idUser, discount, finalPrice, pdfPath, dateIncrement
            FROM carts INNER JOIN cart_product
            ON carts.id = cart_product.idCart WHERE carts.idUser = :user ORDER BY `id` DESC";
            $db = Database::connection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":user", $_SESSION['user']['id']);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    public function confirmBuy()
    {
        $cart = $this->getCart();
        if (isset($_SESSION['user'])) {
            if (!empty($cart->getList())) {
                $sql = "INSERT INTO `carts`(`idUser`, `pdfPath`, `finalPrice`, `discount`, `dateIncrement`)
                VALUES (:idUser, null, :finalPrice, :discount, NOW())";
                $db = Database::connection();
                $stmt = $db->prepare($sql);
                
                $total_price = 0;
                foreach ($cart->getList() as $item)
                {
                    $total_price += $item['price'] * $item['quantity'];
                }
                
                $stmt->bindValue(':idUser', $_SESSION['user']['id']);
                $stmt->bindValue(':finalPrice', $total_price);
                $stmt->bindValue(':discount', $cart->getDiscount());
                $stmt->execute();
                
                $sql = "SELECT MAX(id) FROM `carts`";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['MAX(id)'];
    
                foreach ($cart->getList() as $item) {
                    $sql = "INSERT INTO `cart_product`(`idCart`, `idProduct`, `quantity`)
                    VALUES ($id, :idp, :pq)";
                    $db = Database::connection();
                    $stmt = $db->prepare($sql);
                    $stmt->bindValue(':idp', $item['id']);
                    $stmt->bindValue(':pq', $item['quantity']);
                    $stmt->execute();
                }
                $cart->clearList();
            }
        }
    }
}