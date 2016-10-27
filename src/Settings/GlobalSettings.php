<?php

namespace dlwatersuk\MultiPay\Settings;


class GlobalSettings
{
    const DEFAULT_VAT = 20.00; // use 20.00 for 20%, all internal sums /100 and +1
    const CURRENCY = 'GBP';
    const CURRENCY_ROUND_MODE = PHP_ROUND_HALF_UP;
    const PAYMENT_SHORTCUT = true;

    // logging
    const ENABLE_DEBUG_LOG = true;
    const ENABLE_ERROR_LOG = true;

    // CURL stuff
    const CURL_TTL = 60;
}