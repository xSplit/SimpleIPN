<?php
class CoinIPN{
	
    private $req;
    public function __construct(){
        $this->req = file_get_contents('php://input');
    }
    public function isVerified($merchant_id,$ipn_secret){
        return $this->req !== false && !empty($this->req) &&
            isset($_POST['merchant']) && $_POST['merchant'] == trim($merchant_id)
            && hash_hmac("sha512", $this->req, trim($ipn_secret)) == $_SERVER['HTTP_HMAC'];
    }
    public function isCompleted($amount,$currency='USD'){
        return $amount >= floatval($_POST['amount1']) && $_POST['currency1'] == $currency
            && ($_POST['status'] >= 100 || $_POST['status'] == 2);
    }
    
    public function getID(){
        return $_POST['txn_id'];
    }
    
    public function getCustom(){
        return $_POST['custom'];
    }
	
    public function getItem($key){
        return $_POST['item_'.$key];
    }
	
    public static function isIPN(){
        return isset($_POST['ipn_mode']) && $_POST['ipn_mode'] == 'hmac' && !empty($_SERVER['HTTP_HMAC']);
    }
}
