<?php

namespace dlwatersuk\Sagepay;


interface SagepayPayment
{
    public function addSurcharge();
    public function removeSurcharge();
    public function setCard();
    public function process();
    public function __toString();
}