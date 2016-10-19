<?php

namespace dlwatersuk\MultiPay\Basket;


class SagepayBasket extends AbstractBasket
{
    public function getBasket() {
        return $this->items;
    }

    public function getTotal() {

    }

    private function getBasketXml() {
        $xml = '<basket>';
        foreach ($this->items as $sku => $item) {
            $item->name;
            $item->price;
            $item->sku;
        }
        $xml .= '</basket>';
    }
}