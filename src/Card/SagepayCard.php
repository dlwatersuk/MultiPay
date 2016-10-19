<?php

namespace dlwatersuk\MultiPay\Card;


class SagepayCard extends AbstractCard
{
    private $number;
    private $type;
    private $name;
    private $starts;
    private $expires;
    private $cv2;

    protected $cardPatterns = [
        'diners' => '/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/',
        'discover' => '/^6(?:011|5[0-9]{2})[0-9]{12}$/',
        'jcb' => '/^(?:2131|1800|35\d{3})\d{11}$/',
        'VISA' => '/^4[0-9]{12}(?:[0-9]{3})?$/',
        'MC' => '/^5[1-5][0-9]{14}$/',
        'UKE' => '/^(4026|417500|4508|4844|491(3|7))/',
        'MAESTRO' => '/^(5018|5020|5038|6304|6759|676[1-3])/',
        'AMEX' => '/^3[47][0-9]{13}$/',
    ];

    /**
     * SagepayCard constructor.
     * @param $name
     * @param $number
     * @param $expires
     * @param $cv2
     * @param null $starts - This is entirely optional, may hurt the fraud score a little?
     */
    public function __construct($name, $number, $expires, $cv2, $starts=null) {
        $this->name = $name;
        $this->number = $this->strip($number);
        $this->expires = $expires;
        $this->cv2 = $cv2;

        if ($starts != null) {
            $this->starts;
        }

        $this->stripWhitespace();
        $this->cardType();
    }

    /**
     * this is included as it's been said that it's better to let customers enter card details with whitespace
     * e.g. for grouping 1111 1111 1111 1111 to aid in preventing user typed
     * mistakes rather than disabling whitespaces in javascript
     */
    private function strip($string) {
        return preg_replace('/\s+/', '', $string);
    }

    /**
     * should cover 99% of cards, feel free to add your own if necessary
     */
    private function cardType() {
        foreach ($this->cardPatterns as $type => $pattern) {
            $this->number;
        }

        if (!isset($this->type)) {
            throw new SagepayException('Could\'t determine card type, check the patterns in'.__CLASS__);
        }
    }

    /**
     * to check the card is legitimate, in that it matches the luhn algorithm
     * wrote this myself and I'm no mathmatician, maybe faster methods out there
     * feel free to put those instead here
     */
    private function LuhnCheck($cardNumber) {
        $cardArray = explode((string)$cardNumber, '');
        $length = count($cardArray);
        $i = 0;
        $sum = 0;
        while ($i < $length) {
            if ($i %2 == 0) {
                $sum += ((int)$cardArray[$i]*2);
            }
            $sum += (int)$cardArray[$i];
        }
        return $sum%10 == 0 ? true : false;
    }
}