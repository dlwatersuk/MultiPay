<?php

namespace dlwatersuk\Sagepay\Provider;


interface Provider
{
    public function addSurcharge();
    public function removeSurcharge();
    public function setCard();
    public function process();
    public function __toString();
}