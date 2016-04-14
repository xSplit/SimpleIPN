Redirecting...
<form action="https://www.coinpayments.net/index.php" method="post" id="checkout_form">
		<input type="hidden" name="cmd" value="_pay_simple">
		<input type="hidden" name="reset" value="1">
		<input type="hidden" name="merchant" value="id">
		<input type="hidden" name="item_name" value="Item name">
		<input type="hidden" name="currency" value="USD">
		<input type="hidden" name="amountf" value="30.00000000">
		<input type="hidden" name="want_shipping" value="0">
		<input type="hidden" name="success_url" value="http://website.com/success.php">
		<input type="hidden" name="cancel_url" value="http://website.com">
		<input type="hidden" name="ipn_url" value="http://website.com/ipn.php">
		<input type="hidden" name="custom" value="<?php echo $userid;?>">
		<input type='submit' value='Buy with BTC' class='button new_reply_button'>
	</form>
	<script>document.getElementById('checkout_form').submit();</script>
