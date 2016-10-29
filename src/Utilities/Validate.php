<?php

namespace dlwatersuk\MultiPay\Utilities;
use dlwatersuk\MultiPay\Log;
use dlwatersuk\MultiPay\MultiPayException;

class Validate
{
    public static function all($object) {
        static::required($object);
        static::rules($object);
    }

    public static function required($object) {
        if (!isset($object->required)) {
            return;
        }

        foreach ($object->required as $field) {
            if (!isset($object->{$field})) {
                $message = 'Attribute '.$field.' must be set in '.__CLASS__.'.';
                Log::error($message);
                throw new MultiPayException($message);
            }
        }
    }

    public static function rules($object) {
        if (!isset($object->rules)) {
            return;
        }

        foreach ($object->rules as $field => $rule) {
            if (!preg_match($rule, $object->{$field})) {
                Log::error("Rule {$rule} validation failed on {$field}");
            }
        }

    }
}