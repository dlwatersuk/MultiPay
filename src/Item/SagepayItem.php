<?php

namespace dlwatersuk\Sagepay\Item;


class SagepayItem implements Item
{
    private $sku;
    private $name;
    private $price;
    private $vat;

    public function __construct($sku, $name, $price, $vat = Settings::DEFAULT_VAT) {
        if (!isset($sku) || !isset($name) || !isset($price)) {
            throw new SagepayException('Cannot create item without SKU, Name and Price');
        } else if (!is_numeric($price)) {
            throw new SagepayException('Item price must be numeric');
        }
        $this->set('sku', $sku);
        $this->set('name', $name);
        $this->set('price', $price);
        $this->set('vat', $vat);
    }

    public function __get($var) {
        return $this->{$var};
    }

    private function set($var, $val) {
        $this->{$var} = $val;
    }
}