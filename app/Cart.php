<?php

namespace App;

class Cart{

	public $items = [];
	public $totalQ = 0;
	public $totalP = 0;

	public function __construct($currentCart){
		if($currentCart){
			$this->items = $currentCart->items;
			$this->totalQ = $currentCart->totalQ;
			$this->totalP = $currentCart->totalP;
		}
	}

	public function add($id, $item){
		$storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}

		$storedItem['quantity']++;
		$storedItem['price'] = $storedItem['quantity'] * $item->price;
		$this->items[$id] = $storedItem;
		$this->totalQ++;
		$this->totalP += $item->price;		
	}
}