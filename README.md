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
$mp = new MultiPay('Sagepay');

$item = $mp->item([
            'sku' => 'fakesku',
            'name' => 'fakename',
            'price' => 1
        ]);
        
$mp->basket->add($item);

$mp->card->set([
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