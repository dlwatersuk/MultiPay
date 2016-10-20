# MultiPay
Multiple payment gateways in one easy to use PHP class

The goal on starting this was to build a class that would be easily extensible and easily maintainable, while also being incredibly easy for the end developer to use.


## Example Usage
```php
$mp = new MultiPay('Sagepay');
$mp->basket->add($mp->item([
    'FAKESKU',
    'FAKENAME',
    9001
]));
$mp->card->set([
'CARDHOLDER',
'LONGNO',
'EXPIRES',
'CV2'
]);
$response = $mp
    ->transaction
    ->payment
    ->process();
```
And your payment via the Sagepay Direct API is done
