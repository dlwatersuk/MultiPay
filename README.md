# MultiPay
Multiple payment gateways in one easy to use PHP class

The goal on starting this was to build a class that would be easily extensible and easily maintainable, while also 
being incredibly easy for the end developer to use.

I've tried to follow a Front Controller style pattern, so that the only class you need to instantiate 
is the MultiPay class, rather than a separate class for each payment provider integration. This uses a kind of internal
dependency injection to achieve this.

Feel free to comment on or fork and improve this code.

## Example Usage for Sagepay
```php

// instantiate a new MultiPay Object
$mp = new MultiPay('Sagepay');

// create a new MultiPay Item Object
$item = $mp->item([
            'sku' => 'fakesku',
            'name' => 'fakename',
            'price' => 1
        ]);

// add this new item object to the multipay basket object
// no need to instantiate a basket, it'll do that itself
$mp->basket->add($item);

// set the MultiPay customer object, again it will instantiate this itself
$mp->customer([
    'title' => '',
    'firstname' => '',
    'surname' => '',
    'mobile' => '',
    'phone' => '',
    'address1' => '',
    'address2' => '',
    'address3' => '',
    'postcode' => '',
    'country' => '',
    'county' => '',
    'state' => '',
]);

// Create a new card object within MultiPay
$mp->card([
    'name' => '',
    'number' => '',
    'expires' => '',
    'cv2' => ''
]);

// post payment with the above card, customer and basket and get response
$response = $mp
    ->transaction
    ->payment
    ->process();
    
```

## Example Quick Sagepay Usage
```php
$mp = new MultiPay('Sagepay')
    ->basket->add($mp->item([
        'sku' => 'fakesku',
        'name' => 'fakename',
        'price' => 1
    ]))
    ->card->set([
        'name' => '',
        'number' => '',
        'expires' => '',
        'cv2' => ''
    ]);
$response = $mp
    ->transaction
    ->payment
    ->process();
```