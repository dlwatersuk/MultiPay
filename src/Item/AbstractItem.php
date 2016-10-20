<?php

namespace dlwatersuk\Sagepay\Item;


class AbstractItem implements Item
{
    private $sku;
    private $name;
    private $price;
    private $vat;

    public function __construct(Array $item=[], $quantity=1) {
        if (!empty($item)) {
            foreach ($item as $key => $val) {
                $this->__set($key, $val);
            }
        }

    }

    public function __get($var) {
        return $this->{$var};
    }

    public function __set($var, $val) {
        $this->set($var, $val);
    }

    public function set($var, $val) {
        if ($var == 'price' && !is_numeric($val)) {
            throw new MultiPayException('Price cannot be non-numeric');
        }
        $this->{$var} = round($val, 2, GlobalSettings::CURRENCY_ROUND_MODE);
    }
}