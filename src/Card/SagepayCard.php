<?php

namespace dlwatersuk\MultiPay\Card;


class SagepayCard extends AbstractCard
{
    protected $cardCodes = [
        'diners' => 'diners',
        'discover' => 'discover',
        'jcb' => 'jcb',
        'visa' => 'VISA',
        'mastercard' => 'MC',
        'ukelectron' => 'UKE',
        'maestro' => 'MAESTRO',
        'amex' => 'AMEX',
    ];
}