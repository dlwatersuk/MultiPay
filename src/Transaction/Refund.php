<?php

namespace dlwatersuk\Sagepay\Transaction;


interface Refund
{
    public function amount();
    public function process();
}