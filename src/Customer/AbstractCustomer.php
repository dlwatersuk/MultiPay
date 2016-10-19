<?php

namespace dlwatersuk\MultiPay\Customer;


abstract class AbstractCustomer implements Customer
{
    private $title;
    private $firstname;
    private $surname;
    private $mobile;
    private $phone;
    private $address1;
    private $address2;
    private $address3;
    private $postcode;
    private $country; // ISO, if you need these I've added a helper function in HelpMe.php
    private $county;
    private $state;

    public function __construct(Array $customer) {
        foreach ($customer as $key => $val) {
            $this->__set($key,$val);
        }
    }

    public function __set($name, $val) {
        if (!property_exists($this, $name)) {
            throw new SagepayException('Trying to set non existant customer property '.$key);
        }
        $this->{$key} = $val;
    }

    public function __get($name, $val) {
        if (!property_exists($this, $name)) {
            throw new SagepayException('Trying to get non existant customer property '.$key);
        }
        return $this->{$key};
    }

    public function __toString() {
        return json_encode([
            'title' => $this->title,
            'firstname' => $this->firstname,
            'surname' => $this->surname,
            'mobile' => $this->mobile,
            'phone' => $this->phone,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'address3' => $this->address3,
            'postcode' => $this->postcode,
            'country' => $this->country,
            'county' => $this->county,
            'state' => $this->state
        ]);
    }
}