<?php

class Cart
{
    private $list = [];

    public function __construct()
    {
        if (isset($_SESSION['cart'])) {
            $this->list = $_SESSION['cart'];
        }
    }

    public function getBuys() {
        if (isset($_SESSION['user'])) {
            $sql = "SELECT * FROM cart INNER JOIN cart_product ON cart.id = cart_product.id_cart WHERE cart.id_user = :user";
            $db = Database::connection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":user", $_SESSION['user']['id']);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    public function confirmBuy($discount)
    {
        if (isset($_SESSION['user'])) {
            if (!empty($this->getList())) {
                $sql = "INSERT INTO `cart`(`id_user`, `pdf_path`, `total_price`, `discount`, `date_increment`) VALUES (:id_user, null, :tp, $discount, NOW())";
                $db = Database::connection();
                $stmt = $db->prepare($sql);
                
                $total_price = 0;
                foreach ($this->getList() as $item)
                {
                    $total_price += $item['price'] * $item['quant'];
                }
                
                $stmt->bindValue(':id_user', $_SESSION['user']['id']);
                $stmt->bindValue(':tp', $total_price);
                $stmt->execute();
                
                $sql = "SELECT MAX(id) FROM `cart`";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['MAX(id)'];
    
                foreach ($this->getList() as $item) {
                    $sql = "INSERT INTO `cart_product`(`id_cart`, `id_product`, `product_quantity`)
                    VALUES ($id, :idp, :pq)";
                    $db = Database::connection();
                    $stmt = $db->prepare($sql);
                    $stmt->bindValue(':idp', $item['id']);
                    $stmt->bindValue(':pq', $item['quant']);
                    // var_dump($stmt);die;
                    $stmt->execute();
                }
                $this->clearList();
            }
        }
    }
    public function updateQuantityItem($itemIndex, $itemQuantity)
    {
        $item = $this->getList()[$itemIndex];
        $item['quant'] = $itemQuantity;
        $this->setList($item);
        $this->setSession();
    }
    public function addItemToList($item)
    {
        foreach ($this->getList() as $index => $value) {
            if ($value['id'] === $item['id']) {
                $this->updateQuantityItem($index, $this->getList()[$index]['quant'] += 1);
                break;
            }
            if (count($this->getList()) - 1 === $index) {
                $this->setList($item);
            }
        }
        if (empty($this->list)) {
            $this->setList($item);
        }
        $this->setSession();
    }
    public function setSession()
    {
        $_SESSION['cart'] = $this->getList();
    }
    public function getSession()
    {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [] ;
    }

    public function getList()
    {
        return $this->list;
    }
    public function setList($item)
    {
        foreach ($this->list as $index => $value) {
            if ($value['id'] === $item['id']) {
                if (intval($item['quant']) <= 0) {
                    array_splice($this->list, $index, 1);
                    break;
                }
                $this->list[$index] = $item;
                break;
            }
            if (count($this->getList()) - 1 === $index) {
                array_push($this->list, $item);
            }
        }
        if (empty($this->list) && intval($item['quant']) > 0) {
            array_push($this->list, $item);
        }
        $this->setSession();
    }
    public function clearList() {
        $this->list = [];
        $this->setSession();
    }
}
