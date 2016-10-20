<?php

namespace dlwatersuk\Sagepay\Transaction;


abstract class AbstractTransaction implements Transaction
{
    private $api;
    private $basket;
    private $customer;
    private $card;
    protected $charge;

    public function __construct(API $api, Basket $basket, Card $card, Customer $customer) {
        $this->api = $api;
        $this->basket = $basket;
        $this->card = $card;
        $this->customer = $customer;
    }

    public function payment() {

    }

    public function refund() {

    }

    public function repeat() {

    }
}