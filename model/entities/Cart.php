<?php

class Cart
{
    private $list = [];
    private $discount;

    public function __construct($discount = null)
    {
        if (isset($_SESSION['cart'])) {
            $this->list = $_SESSION['cart'];
        }
        $this->setDiscount($discount);
    }

    public function updatequantityItem($itemIndex, $itemquantity)
    {
        $item = $this->getList()[$itemIndex];
        $item['quantity'] = $itemquantity;
        $this->setList($item);
        $this->setSession();
    }
    public function addItemToList($item)
    {
        foreach ($this->getList() as $index => $value) {
            if ($value['id'] === $item['id']) {
                $this->updatequantityItem($index, $this->getList()[$index]['quantity'] += 1);
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

    public function setList($item)
    {
        foreach ($this->list as $index => $value) {
            if ($value['id'] === $item['id']) {
                if (intval($item['quantity']) <= 0) {
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
        if (empty($this->list) && intval($item['quantity']) > 0) {
            array_push($this->list, $item);
        }
        $this->setSession();
    }
    public function clearList() {
        $this->list = [];
        $this->setSession();
    }

	/**
	 * @return mixed
	 */
	public function getDiscount() {
		return $this->discount;
	}
	
	/**
	 * @param mixed $discount 
	 * @return self
	 */
	public function setDiscount($discount): self {
		$this->discount = $discount / 100;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getList() {
		return $this->list;
	}
}
