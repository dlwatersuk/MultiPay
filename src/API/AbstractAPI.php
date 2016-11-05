<?php

namespace dlwatersuk\MultiPay\API;


abstract class AbstractAPI implements API
{
    protected $response;

    protected function request($url, $post) {

        if (!isset($url) || !isset($post)) {
            throw new MultiPayException('URL or POST data not passed to curl');
        }

        if (is_array($post)) {
            $post = http_build_query($post);
        }

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, GlobalSettings::CURL_TTL);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

        // maybe add peer verirfication later
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);


        $response = curl_exec($curl);
        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
            $output['Status'] = "FAIL";
            $output['StatusDetails'] = "Server Response: " . curl_getinfo($curlSession, CURLINFO_HTTP_CODE);
            $output['Response'] = $response;
            return $output;
        }

        if (curl_error($curl)) {
            $output['Status'] = "FAIL";
            $output['StatusDetail'] = curl_error($curl);
            $output['Response'] = $response;
            return $output;
        }

        curl_close($curl);
        return array_merge($output, $response);
    }

    protected function sanitise(){

    }

    protected function logRequest() {

    }
}