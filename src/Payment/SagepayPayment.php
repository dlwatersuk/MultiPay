<?php

/*
 *   Copyright 2016 Daniel Waters
 *
 *   Licensed under the Apache License, Version 2.0 (the "License");
 *   you may not use this file except in compliance with the License.
 *   You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 *   Unless required by applicable law or agreed to in writing, software
 *   distributed under the License is distributed on an "AS IS" BASIS,
 *   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *   See the License for the specific language governing permissions and
 *   limitations under the License.
 */

namespace dlwatersuk\Sagepay;


final class SagepayPayment implements Payment
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