<?php

namespace dlwatersuk\Sagepay\Transaction;


interface Repeat
{
    public function amount();
    public function process();
}