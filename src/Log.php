<?php

namespace dlwatersuk\MultiPay;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    private $errorLog = null;
    private $debugLog = null;

    public function __construct() {
        $stream = new StreamHandler(__DIR__.'/MultiPay.log', Logger::DEBUG);
        if (GlobalSettings::ENABLE_DEBUG_LOG) {
            $this->debugLog = new Logger('DebugLog');
            $this->debugLog->pushHandler($stream);
        }
        if (GlobalSettings::ENABLE_ERROR_LOG) {
            $this->errorLog = new Logger('ErrorLog');
            $this->errorLog->pushHandler($stream);
        }
    }

    public function error($message) {

    }

    public function warning($message) {

    }
}