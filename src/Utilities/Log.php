<?php

namespace dlwatersuk\MultiPay\Settings;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use dlwatersuk\MultiPay\MultiPayException;

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

    public static function error($message) {
        $log = new self();
        $log->errorLog->error($message);
        throw new MultiPayException($message);
    }

    public static function warning($message) {
        $log = new self();
        $log->debugLog->debug($message);
    }
}