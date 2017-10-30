<?php
namespace Validator;

class CreditCard implements \BankAwareInterface{
    public function getBank($cardNumber) {
        $cardNumber = preg_replace('#[^\d]#s', '', $cardNumber);
        if(preg_match('#^(\d{6})#', $cardNumber,$matches)){
            $cardNumber = $matches[1];
        }else
            return null;
        
        $neutroClient = new \NeutrinoAPILib\NeutrinoAPIClient();
        $response = $neutroClient->getECommerce()->bINLookup($cardNumber);
        foreach( \BankAwareInterface::banks as $bank_index=>$pattern ){
            if( preg_match($pattern, $response->issuer))
                    $response->bankcode = $bank_index;
        }
        return $response;
    }

}
