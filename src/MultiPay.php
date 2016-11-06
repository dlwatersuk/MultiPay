<?php

namespace dlwatersuk\MultiPay;
use dlwatersuk\MultiPay\Utilities\Log;
/**
 * Class MultiPay
 * @package dlwatersuk\MultiPay
 */
final class MultiPay
{
    private $gateway;
    private $provider;
    private $card;
    private $customer;
    private $basket;
    private $item;
    private $api;

    /**
     * MultiPay constructor.
     * @param string $gateway
     */
    public function __construct($gateway='Sagepay') {
        $this->gateway = $gateway;
        $this->setDependencies($gateway);
    }

    /**
     * @param $providerName
     */
    public function setDependencies($providerName) {
        // set dependency class names
        $gateway = ucfirst($providerName);

        $this->basketClass = class_exists($gateway.'Basket')
            ? $gateway.'Basket' : 'GenericBasket';
        $this->itemClass =  class_exists($gateway.'Item')
            ? $gateway.'Item' : 'GenericItem';
        $this->cardClass = class_exists($gateway.'Card')
            ? $gateway.'Card' : 'GenericCard';
        $this->customerClass = class_exists($gateway.'Customer')
            ? $gateway.'Customer' : 'GenericCustomer';
        $this->transactionClass = class_exists($gateway.'Transaction')
            ? $gateway.'Transaction' : 'GenericTransaction';

        if (!class_exists($gateway.'API')) {
            Log::error("Class {$gateway}API not found.");
        }
        $this->apiClass = $gateway.'API';

        if (!class_exists($gateway.'Provider')) {
            Log::error("Class {$gateway}Provider not found.");
        }
        $this->providerClass = $gateway.'Provider';

        // load dependencies
        $this->basket = new $this->$basketClass();
        $this->provider = new $this->$providerClass();
        $this->customer = new $this->$customerClass();
        $this->api = new $this->$apiClass();
    }

    /**
     * @return mixed
     */
    public function basket() {
        return $this->basket;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function item(Array $data) {
        return new $this->$itemClass($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function customer(Array $data) {
        return new $this->$customerClass($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function card($data) {
        if (!is_array($data)) {
            Log::error('expecting data passed to card class to be an array');
        }
        $name = $data['name'];
        $number = $data['number'];
        $expires = $data['expires'];
        $cv2 = $data['cv2'];
        $starts = isset($data['starts']) ? $data['starts'] : null;
        return new $this->$cardClass($name, $number, $expires, $cv2, $starts);
    }

    /**
     * @return mixed
     */
    public function transaction() {
        return new $this->$transactionClass(
            $this->api,
            $this->basket,
            $this->card,
            $this->customer
        );
    }

    /**
     * Shortcut for Transaction -> Payment
     * @return mixed
     */
    public function payment() {
        return $this
            ->transaction()
            ->payment();
    }
}