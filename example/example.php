<?php

// example of usage
require('../vendor/autoload.php');
// new
$mp = new MultiPay('Sagepay');
$basket = $mp->basket();

$mp->customer([

]);

$item = $mp->item([

]);
$basket->add($item);


$mp->card([

]);
// or
$mp->card->set([

]);

$response = $mp->transaction()
    ->payment();
// or as a shortcut
$response = $mp->payment();

// sagepay specific
$mp = new MultiPay('Sagepay');
$response = $mp->transaction()
    ->refund([
        'VendorTxCode' => '',
        'Amount' => 11.10,
    ]);
$response = $mp->transaction()
    ->void([

    ]);
$response = $mp->transaction()
    ->repeat([

    ]);
