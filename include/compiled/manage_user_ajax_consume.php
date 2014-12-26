<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:680px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">关闭</span>用户消费记录</h3>
	<div style="height:500px; overflow-y:scroll;overflow-x:hidden;">
	<table width="94%" class="coupons-table">
		<tr><th>时间</th><th>项目ID</th><th>支付ID</th><th>份数</th><th>余付</th><th>支付</th></tr>
	<?php if(is_array($corders)){foreach($corders AS $index=>$one) { ?>
		<tr <?php echo $index%2?'':'class="alt"'; ?>><td><?php if($one['team_id']){?><?php echo date('Y-m-d', $one['pay_time']); ?><br/><?php echo date('H:i:s',$one['pay_time']); ?><?php } else { ?>充值：<?php echo date('Y-m-d', $one['create_time']); ?><br/><?php echo date('H:i:s',$one['create_time']); ?><?php }?></td><td valign="middle"><a title="<?php echo $teams[$one['team_id']]['title']; ?>" target="_blank" href="/team.php?id=<?php echo $one['team_id']; ?>" style="cursor:pointer;" alt="<?php echo $teams[$one['team_id']]['title']; ?>"><?php echo $one['team_id']; ?></a></td><td><?php echo $one['pay_id']; ?><br/><?php echo $one['buy_id']; ?></td><td valign="middle"><?php echo $one['quantity']; ?></td><td valign="middle"><?php echo $one['credit']; ?></td><td valign="middle"><?php echo $one['money']; ?></td></tr>
	<?php }}?>
	</table>
	</div>
</div>
