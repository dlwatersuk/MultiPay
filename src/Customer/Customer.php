<?php

namespace dlwatersuk\MultiPay\Customer;


interface Customer
{
    //throw a keyval customer array instead of setting all manually if you want
    public function __construct(Array $customer);

    // dumps whole customer as a formatted json string;
    public function __toString();

    // far too many customer fields for me to list as seperate functions, use getter and setters instead
    public function __get($name, $val);
    public function __set($name, $val);
}