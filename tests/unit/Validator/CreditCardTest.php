<?php
require_once __DIR__.'/../../../vendor/autoload.php';

class CreditCardTest extends PHPUnit\Framework\TestCase{
    private $cards_data = [
        '4276 7212 9109 5537'=>77,
        '4154 8120 0860 4153'=>59,
        '4377 7237 4268 3091'=>71
    ];
    /** 
     * @group validators */
    function testCodes() {
        $validator = new \Validator\CreditCard();
        foreach ($this->cards_data as $cardNumber=>$bank_code){
            $response = $validator->getBank($cardNumber);
            $this->assertEquals($response->bankcode,$bank_code);
        }
    }
    

    
}
