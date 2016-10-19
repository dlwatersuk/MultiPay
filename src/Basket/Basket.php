<?php

namespace dlwatersuk\MultiPay\Basket;


interface Basket
{
    public function add(Item $item);
    public function remove(Item $item);
    // empty is reserved < php7.0, use destroy
    public function destroy();
    public function getBasket();
}