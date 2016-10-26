<?php

namespace dlwatersuk\Sagepay\Item;


interface Item
{
    public function __construct(Array $item=[]);
    public function __get($var);
}