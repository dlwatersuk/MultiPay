<?php

namespace dlwatersuk\Sagepay\Item;


interface Item
{
    public function __construct(Array $item=[], $quantity=1);
    public function __get($var);
}