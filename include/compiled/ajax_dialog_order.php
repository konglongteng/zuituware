<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">关闭</span></h3>
	<p class="info">请您在新打开的页面上完成付款。</p>
	<p class="notice">付款完成前请不要关闭此窗口。<br>完成付款后请根据您的情况点击下面的按钮：</p>
	<p class="act"><input id="order-pay-dialog-succ" class="formbutton" value="已完成付款" type="submit" onclick="location.href=WEB_ROOT + '/order/pay.php?id=<?php echo $order_id; ?>';" />&nbsp;&nbsp;&nbsp;<input id="order-pay-dialog-fail" class="formbutton" value="付款遇到问题" type="submit" onclick="location.href=WEB_ROOT + '/order/pay.php?id=<?php echo $order_id; ?>';" /></p>
	<p class="retry"><?php if($order_id=='charge'){?><a href="/credit/charge.php"><?php } else { ?><a href="/order/check.php?id=<?php echo $order_id; ?>"><?php }?>&raquo;返回选择其他支付方式</a></p>
</div>
