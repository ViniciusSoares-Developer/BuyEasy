<?php

class Commenter
{
    private $item_id;
    private $text;
    private $star_quantity;

    public function __construct($text, $item_id, $star_quantity)
    {
        $this->setItem_id($item_id);
        $this->setText($text);
        $this->setStar_quantity($star_quantity);
    }

    public function commenter()
    {
        $sql = "INSERT INTO `commenter`(`commenter`, `star`, `id_user_commenter`, `id_product`)
        VALUES (:t, :s, :idu, :idi) ";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':t', $this->getText());
        $stmt->bindValue(':s', $this->getStar_quantity());
        $stmt->bindValue(':idu', $_SESSION['user']['id']);
        $stmt->bindValue(':idi', $this->getItem_id());
        $stmt->execute();
    }
    public function getCommenterByProduct($id)
    {
        $sql = "SELECT commenter.*, `users`.`name` FROM `commenter`
        INNER JOIN `users` ON `commenter`.`id_user_commenter` = `users`.`id`
        WHERE `id_product` = $id ORDER BY id DESC";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return !empty($list) ? $list : null;
    }
    public function getCommenterBySite() {
        $sql = "SELECT commenter.*, `users`.`name` FROM `commenter`
        INNER JOIN `users` ON `commenter`.`id_user_commenter` = `users`.`id`
        WHERE `id_product` IS NULL ORDER BY id DESC";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return !empty($list) ? $list : null;
    }

    public function getText()
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
    }
    public function getItem_id()
    {
        return $this->item_id;
    }
    public function setItem_id($item_id)
    {
        $this->item_id = $item_id;
    }
    public function getStar_quantity()
    {
        return $this->star_quantity;
    }
    public function setStar_quantity($star_quantity)
    {
        $this->star_quantity = $star_quantity;
    }
}
