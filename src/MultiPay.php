<?php

namespace dlwatersuk\MultiPay;


use dlwatersuk\Sagepay\Settings\GlobalSettings;

final class MultiPay
{
    private $gateway;
    private $provider;
    private $card;
    private $customer;
    private $basket;
    private $item;
    private $api;

    public function __construct($gateway='Sagepay') {
        $this->gateway = $gateway;
        $this->setDependencies($gateway);
    }

    public function setDependencies($providerName) {
        // set classnames to use later
        $gateway = ucfirst($providerName);
        $this->providerClass = $gateway.'Provider';
        $this->basketClass = $gateway.'Basket';
        $this->itemClass =  $gateway.'Item';
        $this->cardClass = $gateway.'Card';
        $this->customerClass = $gateway.'Customer';
        $this->transactionClass = $gateway.'Transaction';
        $this->apiClass = $gateway.'API';

        // load dependencies
        $this->basket = new $this->$basketClass();
        $this->provider = new $this->$providerClass();
        $this->customer = new $this->$customerClass();
        $this->api = new $this->$apiClass();
    }

    public function basket() {
        return $this->basket;
    }

    public function item(Closure $data) {
        return new $this->$itemClass($data);
    }

    public function customer(Array $data) {
        return new $this->$customerClass($data);
    }

    public function card(Array $data) {
        return new $this->$cardClass($data);
    }

    public function transaction() {
        return new $this->$transactionClass(
            $this->api,
            $this->basket,
            $this->card,
            $this->customer
        );
    }

    public function payment() {
        return $this
            ->transaction()
            ->payment();
    }
}