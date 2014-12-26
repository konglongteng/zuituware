<?php include template("header");?>
<?php if(is_get()){?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg"><p>此订单尚未完成付款，请重新付款</p><span class="close">关闭</span></div></div>
<?php }?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="order-pay">
    <div id="content">
        <div id="deal-buy" class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>应付总额：<strong class="total-money"><?php echo moneyit($total_money); ?></strong> 元</h2>
                </div>
                <div class="sect">
                    <div style="text-align:left;">
					<?php if($order['service']=='credit'){?>
						<form id="order-pay-credit-form" method="post" sid="<?php echo $order_id; ?>">
							<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
							<input type="hidden" name="service" value="credit" />
							<input type="submit" class="formbutton gotopay" value="使用账户余额支付" />
						</form>
					<?php } else { ?>
						<?php echo $payhtml; ?>
					<?php }?>
						<div class="back-to-check"><a href="/order/check.php?id=<?php echo $order_id; ?>">&raquo; 返回选择其他支付方式</a></div>
					</div>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
