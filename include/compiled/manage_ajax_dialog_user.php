<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">关闭</span>用户信息及充值</h3>
	<div style="overflow-x:hidden;padding:10px;">
	<table width="96%" class="coupons-table">
		<tr><td width="80"><b>Email：</b></td><td><?php echo $user['email']; ?></td></tr>
		<tr><td><b>用户名：</b></td><td><?php echo $user['username']; ?></td></tr>
		<tr><td><b>真实姓名：</b></td><td><?php echo $user['realname']; ?></td></tr>
		<tr><td><b>手机号码：</b></td><td><?php echo $user['mobile']; ?></td></tr>
		<tr><td><b>邮政编码：</b></td><td><?php echo $user['zipcode']; ?></td></tr>
		<tr><td><b>派送地址：</b></td><td><?php echo $user['address']; ?></td></tr>
		<tr><td><b>注册IP：</b></td><td><?php echo $user['ip']; ?></td></tr>
		<tr><td colspan="2"><hr /></td></tr>
		<tr><td><b>账户余额：</b></td><td><b><?php echo moneyit($user['money']); ?></b> 元</td></tr>
		<tr><td><b>积分余额：</b></td><td><b><?php echo moneyit($user['score']); ?></b> 分</td></tr>
		<tr><td><b>消费统计：</b></td><td>共消费 <b><?php echo moneyit($user['costcount']); ?></b> 次，累计 <b><?php echo moneyit($user['cost']); ?></b> 元</td></tr>
		<tr><td colspan="2"><hr /></td></tr>
		<tr><td><b>账户充值：</b></td><td><input type="text" name="in" id="user-dialog-input-id" value="0" size="6" maxLength="6" require="true" datatype="number" class="number" uid="<?php echo $user['id']; ?>" ask="确定给该用户充值吗？" />&nbsp;&nbsp;<input type="submit" value="确定" onclick="return X.manage.usermoney();"/></td></tr>
	</table>
	</div>
</div>
