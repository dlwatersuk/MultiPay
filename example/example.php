<?php

// example of usage
require('../vendor/autoload.php');
$item = new SagepayItem('T3ST', 'Test Item', 100);
$basket = new SagepayBasket($item);
$basket->add($item);
$card = new SagepayCard('FULLNAME', 'CardNumber', 'Expires', 'CV2');
$payment = new SagepayPayment();
$payment->setCard($card);
$payment->setBasket($basket);
$response = $payment->process();