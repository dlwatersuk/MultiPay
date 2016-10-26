<?php

namespace dlwatersuk\MultiPay\Basket;


abstract class AbstractBasket implements Basket
{
    protected $netTotal;
    protected $grossTotal;
    protected $items = [];

    public function __construct($item, $quantity=1) {
        $this->add($item, $quantity);
    }

    public function add(Item $item, $quantity=1) {
        $this->netTotal += $item->price;
        $this->grossTotal += $item->price -
            ($item->price/(($item->vat/100)+1));
        $items[$item->sku] = $item;
    }

    public function remove(Item $item, $quantity=1) {
        $this->netTotal -= $item->price;
        $this->grossTotal -= $item->price -
            ($item->price/(($item->vat/100)+1));
        unset($this->items['sku']);
    }

    public function destroy() {
        unset($this->items);
    }
}