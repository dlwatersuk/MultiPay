<?php

namespace dlwatersuk\Sagepay\API;


class DirectAPI
{
    private $payment;

    public function __construct(SagepayPayment $payment) {
        $this->sagepay = $payment;
    }
}