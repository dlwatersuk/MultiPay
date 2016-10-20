<?php

namespace dlwatersuk\Sagepay\Transaction;


interface Transaction
{
    /**
     * Transaction constructor.
     * @param API $api
     * @param Basket $basket
     * @param Card $card
     * @param Customer $customer
     */
    public function __construct(API $api, Basket $basket, Card $card, Customer $customer);
}