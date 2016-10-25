<?php

namespace dlwatersuk\MultiPay\Card;


interface Card
{
    public function __construct(Array $card = []);
}