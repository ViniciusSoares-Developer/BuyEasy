<?php

class Commenter
{
    private $item_id;
    private $text;
    private $star_quantity;

    function __construct($item_id, $text, $stars)
    {
        $this->setItem_id($item_id);
        $this->setText($text);
        $this->setStar_quantity($stars);
    }

	/**
	 * @return mixed
	 */
	public function getItem_id() {
		return $this->item_id;
	}

	/**
	 * @param mixed $item_id 
	 * @return self
	 */
	public function setItem_id($item_id): self {
		$this->item_id = $item_id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getText() {
		return $this->text;
	}
	
	/**
	 * @param mixed $text 
	 * @return self
	 */
	public function setText($text): self {
		$this->text = $text;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStar_quantity() {
		return $this->star_quantity;
	}
	
	/**
	 * @param mixed $star_quantity 
	 * @return self
	 */
	public function setStar_quantity($star_quantity): self {
		$this->star_quantity = $star_quantity;
		return $this;
	}
}