<?php

namespace dlwatersuk\Sagepay\API;


interface API
{
    public function request($url, $data);
    public function logRequest($response);
}