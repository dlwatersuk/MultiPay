<?php

namespace dlwatersuk\Sagepay;


class SagepayException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message,$code,$previous);
    }

    public function __toString() {
        return __CLASS__ . ": MultiPay Error ({$this->code}) {$this->message}";
    }
}