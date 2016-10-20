<?php

namespace dlwatersuk\Sagepay\Transaction;


abstract class AbstractTransaction implements Transaction
{
    protected $api;
    protected $basket;
    protected $customer;
    protected $card;
    protected $charge;

    public function __construct(API $api, Basket $basket, Card $card, Customer $customer) {
        $this->api = $api;
        $this->basket = $basket;
        $this->card = $card;
        $this->customer = $customer;
    }

    public function payment() {
        $this
            ->api
            ->payment($this->basket, $this->card, $this->customer);
    }
}