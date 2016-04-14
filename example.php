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
