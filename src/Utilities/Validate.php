<?php

namespace dlwatersuk\MultiPay\Utilities;

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
                throw new Exception('Attribute '.$field.' must be set in '.__CLASS__.'.');
            }
        }
    }

    public static function rules($object) {
        if (!isset($object->rules)) {
            return;
        }
    }
}