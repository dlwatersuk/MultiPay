<?php

// example of usage
require('../vendor/autoload.php');

// new
use dlwatersuk\MultiPay\MultiPay;
$mp = new MultiPay('Sagepay');

$basket = $mp->basket();

$mp->customer([

]);

$item = $mp->item([

]);

$basket->add($item);

$mp->card([

]);

$response = $mp
    ->transaction()
    ->payment();

// or as a shortcut
$response = $mp->payment();