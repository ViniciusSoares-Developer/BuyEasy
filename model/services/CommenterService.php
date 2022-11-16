<?php
require "./model/entities/Commenter.php";

class CommenterService
{
    private Commenter $commenter;

    function __construct(Commenter $commenter)
    {
        $this->setCommenter($commenter);
    }
    

	/**
	 * @return Commenter
	 */
	public function getCommenter(): Commenter {
		return $this->commenter;
	}
	
	/**
	 * @param Commenter $commenter 
	 * @return self
	 */
	public function setCommenter(Commenter $commenter): self {
		$this->commenter = $commenter;
		return $this;
	}

    public function commenter()
    {
        $sql = "INSERT INTO `commenters`(`text`, `star`, `idUser`, `idProduct`)
        VALUES (:text, :star, :idu, :idi);";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':text', $this->getCommenter()->getText());
        $stmt->bindValue(':star', $this->getCommenter()->getStar_quantity());
        $stmt->bindValue(':idu', $_SESSION['user']['id']);
        $stmt->bindValue(':idi', $this->getCommenter()->getItem_id());
        $stmt->execute();
    }
    public function getCommenterByProduct($id)
    {
        $sql = "SELECT commenters.*, `users`.`name` FROM `commenters`
        INNER JOIN `users` ON `commenters`.`idUser` = `users`.`id`
        WHERE `idProduct` = $id ORDER BY `id` DESC;";
        $db = Database::connection();
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}