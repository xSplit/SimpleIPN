<?php

class SimpleIPN{

    private $req;
    public function __construct($head = 'HTTP/1.1 200 OK'){
        header($head);
        $this->req = 'cmd=_notify-validate';
        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $this->req  .= "&$key=$value";
        }
    }

    public function isVerified()
    {
        $header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($this->req) . "\r\n\r\n";
        $fp = fsockopen('tls://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
        fputs($fp, $header . $this->req);
        while (!feof($fp))
            if (strcmp(fgets($fp, 1024), "VERIFIED") == 0)
                return true;
        return false;
    }

    public function isCompleted($paypal, $amount, $currency='USD'){
        return $_POST['receiver_email'] == $paypal
        && $_POST['payment_status'] == 'Completed' && $_POST['amount'] == $amount
        && $_POST['mc_currency'] == $currency;
    }

    public function getID(){
        return $_POST['txn_id'];
    }

    public static function isIPN(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return isset($_POST['payment_status'],$_POST['txn_id']);
        return false;
    }
}
