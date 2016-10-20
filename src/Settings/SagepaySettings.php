<?php

namespace dlwatersuk\Sagepay\Settings;


class SagepaySettings extends AbstractSettings
{
    const ENVIRONMENT = 'simulator'; // simulator/live/test
    const ACCOUNT_TYPE = 'E'; // can be E C or M, check sagepay docs for what these mean, E is usually correct.
    const INTEGRATION = 'direct'; // only direct supported currently

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