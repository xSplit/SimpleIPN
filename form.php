Redirecting...
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="checkout_form">
    <input type="hidden" name="business" value="business@gmail.com">
    <input type="hidden" name="amount" value="10.00">
    <input type="hidden" name="currency" value="USD">
    <input type="hidden" name="item_name" value="Item name">
    <input type="hidden" name="item_number" value="3636">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="address_override" value="1">
    <input type="hidden" name="return" value="http://website.com/success.php">
    <input type="hidden" name="cancel_return" value="http://website.com">
    <input type="hidden" name="notify_url" value="http://website.com/ipn.php">
    <input type="hidden" name="custom" value="<?php echo $userid;?>">
</form>
<script>document.getElementById('checkout_form').submit();</script>
