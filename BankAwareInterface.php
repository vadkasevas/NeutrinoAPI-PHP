<?php

/**
 * Validator/CreditCard may implement this interface if it is capable to query BIN.
 */
interface BankAwareInterface{
    const banks = [
        59 => '/alfa/i',
        77 => '/sber/i',
        71 => '/Tinkoff/i'
    ];
    
    /**
     * Method query use NeutrinoAPI and return parsed response content.
     * If bank name match a regex in $banks, add 'bankcode' field with $banks key to response.
     * 
     * @param string $cardNumber
     * @throws ApiError If API query end up with error. $message is API error message.
     * @return array
     */
    public function getBank($cardNumber);
}