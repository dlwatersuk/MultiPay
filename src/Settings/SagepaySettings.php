<?php

namespace dlwatersuk\MultiPay\Settings;


class SagepaySettings extends AbstractSettings
{
    const VENDOR = ''; // your sagepay vendorname
    const ENVIRONMENT = 'simulator'; // simulator/live/test
    const ACCOUNT_TYPE = 'E'; // can be E C or M, check sagepay docs for what these mean, E is usually correct.
    const INTEGRATION = 'direct'; // only direct supported currently
    const ENCRYPTION_KEY = '123456789-';
    const MAX_VENDORTXCODE_LENGTH = 40; // this is the max set by sagepay
    const VENDORTXCODE_PREFIX = 'MultiPay-';

    /**
     * Below are settings you're unlikely to ever need to change, but are included in case you ever do!
     */

    // DIRECT URLS
    const DIRECT_SERVER_LIVE
        = 'https://live.sagepay.com/gateway/service/vspdirect-register.vsp';
    const DIRECT_SERVER_3D_SECURE_CALLBACK_LIVE
        = 'https://live.sagepay.com/gateway/service/direct3dcallback.vsp';

    // TEST URLS
    const DIRECT_SERVER_TEST
        = 'https://test.sagepay.com/gateway/service/vspdirect-register.vsp';
    const DIRECT_SERVER_3D_SECURE_CALLBACK_TEST
        = 'https://test.sagepay.com/gateway/service/direct3dcallback.vsp';

    // SIMULATOR URLS
    const SIMULATOR_URL
        = 'https://test.sagepay.com/Simulator/VSPDirectGateway.asp';
}