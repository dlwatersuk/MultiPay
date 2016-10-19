<?php

namespace dlwatersuk\MultiPay\Card;


interface Card
{
    public function __construct($name, $number, $expires, $cv2, $starts=null);
}