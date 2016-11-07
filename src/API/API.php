<?php

namespace dlwatersuk\MultiPay\API;


interface API
{
    public function __construct();
    public function payment(Basket $basket, Card $card, Customer $customer);
    public function refund();
}