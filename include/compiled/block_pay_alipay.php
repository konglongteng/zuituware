<form id="order-pay-form" method="post" sid="<?php echo $order_id; ?>" target="_blank">
	<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
	<input type="hidden" name="reqUrl" value="<?php echo $reqUrl; ?>" />
	<input type="hidden" name="action" value="redirect" />
	<img src="/static/css/i/alipay.png" /><br/>
	<input type="submit" class="formbutton" value="前往支付宝付款" />
</form>
