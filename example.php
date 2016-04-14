<?php
include 'simpleipn.php';

if(SimpleIPN::isIPN()){
    $ipn = new SimpleIPN();
    $paypal = 'mymarket@email.com';
    $amount = 10;
    if($ipn->isVerified() && $ipn->receivedAt($paypal) && $ipn->isCompleted($amount)){
        $id = $ipn->getID();
        //STORE TRANSACTION
        //DO STUFF $ipn->getCustom()
    }
}

include 'coinipn.php';

if(CoinIPN::isIPN()){
    $ipn = new CoinIPN();
    $merchant_id = 'kj098as6bfbcvsd87sdnh75d9sgd789';
    $ipn_secret = 'secretpass1337';
    $amount = 10;
    if($ipn->isVerified($merchant_id,$ipn_secret) && $ipn->isCompleted($amount)){
        $id = $ipn->getID();
        //STORE TRANSACTION
        //DO STUFF $ipn->getCustom()
    }
}
