<?php

namespace dlwatersuk\MultiPay\Card;


class SagepayCard extends AbstractCard
{
    protected $cardCodes = [
        'diners' => 'diners',
        'discover' => 'discover',
        'jcb' => 'jcb',
        'VISA' => 'VISA',
        'MC' => 'MC',
        'UKE' => 'UKE',
        'MAESTRO' => 'MAESTRO',
        'AMEX' => 'AMEX',
    ];
}