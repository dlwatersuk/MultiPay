<?php

// example of usage
require('../vendor/autoload.php');
// new
$mp = new MultiPay('Sagepay');
$basket = $mp->basket();
$item = $mp->item([

]);
$basket->add($item);
$mp->card();

// OLD
$item = new SagepayItem('T3ST', 'Test Item', 100);
$basket = new SagepayBasket($item);
$basket->add($item);
$card = new SagepayCard('FULLNAME', 'CardNumber', 'Expires', 'CV2');
$payment = new SagepayPayment();
$payment->setCard($card);
$payment->setBasket($basket);
$response = $payment->process();