<?php

namespace dlwatersuk\Sagepay\Provider;


final class SagepayProvider extends AbstractProvider
{
    private $surcharge = 0;
    private $basket;

    public function __construct() {

    }

    public function setBasket(Basket $basket) {
        $this->basket = $basket;
    }

    public function setCard(Card $card) {
        $this->card = $card;
    }

    public function process() {
        switch (Settings::ENVIRONMENT) {
            case 'mode':
                $process = new DirectAPI($this);
                break;
        }
    }

    /**
     * Fake process and dump string of what would have been sent to sagepay
     */
    public function dummyProcess() {

    }

    public function addSurcharge() {

    }

    public function removeSurcharge() {
        unset($this->surcharge);
    }

    public function __toString() {
        return (string) $this->dummyProcess();
    }
}