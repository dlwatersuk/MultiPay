<?php

namespace dlwatersuk\Sagepay\API;


interface API
{
    public function __construct();
    public function payment(Basket $basket, Card $card, Customer $customer);
    public function request($url, $data);
    public function logRequest($response);
}