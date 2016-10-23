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
        $response = $this->request($requestData);
        return $this->format($response);
    }

    public function refund(Array $data) {
        $response = $this->request($data);
        return $this->format($response);
    }

    public function repeat(Array $data) {
        $response = $this->request($data);
        return $this->format($response);
    }

    public function void(Array $data) {
        $response = $this->request($data);
        return $this->format($response);
    }

    private function request($data) {
        $post = '';
        return parent::request($this->url, $post);
    }

    /**
     * Used to standardise the response format
     * @param $response
     */
    private function format($response) {

    }

    private function basketToXML() {

    }

    private function vendorTxCode() {
        $rand = hash('sha256', mt_rand(time()/2,time()).bin2hex(openssl_random_pseudo_bytes(10)));
        $code = SagepaySettings::VENDORTXCODE_PREFIX;
        $code .= $rand;
        $this->vendorTxCode = substr($code, 0, SagepaySettings::MAX_VENDORTXCODE_LENGTH);
    }
}