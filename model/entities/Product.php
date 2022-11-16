<?php

class Product {
    private $name;
    private $image;
    private $price;
    private $description;
    private $sellerId;

    function __construct($name, $image, $price, $description, $sellerId)
    {
        $this->setName($name);
        $this->setImage($image);
        $this->setPrice($price);
        $this->setDescription($description);
        $this->setSellerId($sellerId);
    }

	public function getName() {
		return $this->name;
	}
	public function setName($name): self {
		$this->name = $name;
		return $this;
	}
	public function getPrice() {
		return $this->price;
	}
	public function setPrice($price): self {
		$this->price = $price;
		return $this;
	}
	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description): self {
		$this->description = $description;
		return $this;
	}
	public function getSellerId() {
		return $this->sellerId;
	}
	public function setSellerId($sellerId): self {
		$this->sellerId = $sellerId;
		return $this;
	}
	public function getImage() {
		return $this->image;
	}
	public function setImage($image): self {
		$this->image = $image;
		return $this;
	}
}