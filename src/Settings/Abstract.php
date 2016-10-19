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

// abastract as php does not allow static classes
abstract class Settings
{
    const ENVIRONMENT = 'simulator'; // simulator/live/test
    const DEFAULT_VAT = 20.00; // use 20.00 for 20%, all internal sums /100 and +1
    const ACCOUNT_TYPE = 'E'; // can be E C or M, check sagepay docs for what these mean, E is usually correct.

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