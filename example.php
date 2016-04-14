<?php
include 'simpleipn.php';

if(SimpleIPN::isIPN()){
    $ipn = new SimpleIPN();
    $paypal = 'mymarket@email.com';
    $amount = 10;
    if($ipn->isVerified() && $ipn->isCompleted($paypal,$amount)){
        $id = $ipn->getID();
        //STORE TRANSACTION
        //DO STUFF $_POST['custom']
    }
}
