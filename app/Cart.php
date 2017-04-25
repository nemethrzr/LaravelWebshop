<?php
namespace App;
/**
* 
*/
class Cart 
{
	public $items      = null;
	public $totalQty   = 0;
	public $totalPrice = 0;
	public $shipping   = 1500;
	public $currency   = ' Ft';
	public $shipping_method_id  	= 0;
	public $payment_type_id			= 0;
	public $billing_address_id  	= 0;
	public $shipping_address_id  	= 0;

	public function __construct($oldCart)
	{
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice; 
		}
	}
	public function add($item,$id)
	{
		$storedItem = ['qty'=>0,'price'=>$item->price,'item'=>$item];
		if ($this->items) {
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}
		
		$storedItem['qty']   ++;	
		$storedItem['price'] = $item->price*$storedItem['qty'];
		$this->items[$id] =   $storedItem;
		$this->totalQty   ++;
		$this->totalPrice +=  $storedItem['price'];

		
	}

	public function update($item,$id,$qty)
	{
		$storedItem = ['qty'=>0,'price'=>$item->price,'item'=>$item];
		if ($this->items) {
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
				$this->totalQty   -= $this->items[$id]['qty'];
				$this->totalPrice -= $this->items[$id]['price'];
			}
		}
		
		$storedItem['qty']   = $qty;	
		$storedItem['price'] = $item->price*$storedItem['qty'];
		$this->items[$id] =  $storedItem;
		$this->totalQty   +=  $storedItem['qty'];
		$this->totalPrice += $storedItem['price'];

		
	}

	public function remove($id){
		foreach ($this->items as $key => $value) {
			if($key==$id){
				$this->totalPrice -= $this->items[$key]['price'];
				$this->totalQty   -= $this->items[$key]['qty'];
				unset($this->items[$key]);
			}
		}
	}
	//public function getPrice
}