<?php

namespace dlwatersuk\MultiPay\Basket;


abstract class AbstractBasket implements Basket
{
    private $netTotal;
    private $grossTotal;
    protected $items = [];

    public function __construct(Array $items = []) {
        if (!empty($items)) {
            while (!empty($items)) {
                $item = $items[0];
                $this->add($item);
                array_shift($items);
            }
        }
    }

    public function add(Item $item) {
        $this->netTotal += $item->price;
        $this->grossTotal += $item->price -
            ($item->price/(($item->vat/100)+1));
        $items[$item->sku] = $item;
    }

    public function remove(Item $item) {
        $this->netTotal -= $item->price;
        $this->grossTotal -= $item->price -
            ($item->price/(($item->vat/100)+1));
        unset($this->items['sku']);
    }

    public function destroy() {
        unset($this->items);
    }
}