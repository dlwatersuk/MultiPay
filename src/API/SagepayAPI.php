<?php

namespace dlwatersuk\Sagepay\API;


use dlwatersuk\Sagepay\Settings\SagepaySettings;

class SagepayAPI extends AbstractAPI
{
    private $env = SagepaySettings::ENVIRONMENT;
    private $url;
    private $data;
    private $DDDSecureUrl;

    public function __construct() {
        parent::__construct();
        switch (strtolower($this->env)) {
            case 'live':
                $this->url = SagepaySettings::DIRECT_SERVER_LIVE;
                break;
            case 'test':
                $this->url = SagepaySettings::DIRECT_SERVER_TEST;
                break;
            case 'simulator':
                $this->url = SagepaySettings::SIMULATOR_URL;
                break;
        }


        //$apiType = 'Sagepay'.ucfirst(SagepaySettings::INTEGRATION);
        //new $apiType();
        return $this->request();
    }

    public function payment(Basket $basket, Card $card, Customer $customer) {

    }

    public function refund(Array $data) {

    }

    public function repeat(Array $data) {

    }

    public function void(Array $data) {

    }

    private function basketToXML() {

    }

    private function vendorTxCode() {
        $rand = mt_rand(time()/2,time());

        $this->vendorTxCode = substr($code, 0, SagepaySettings::MAX_VENDORTXCODE_LENGTH);
    }
}