<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_credit('goods'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>商品兑换</h2>
					<ul class="filter">
						<li><a href="/manage/credit/ajax.php?action=edit" class="ajaxlink">新建兑换商品</a></li>
                                                <li><a href="/manage/credit/records.php">兑换记录</a></li>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="50">ID</th><th width="350">名称</th><th width="150">兑换积分</th><th width="40" nowrap>限兑</th><th width="40" nowrap>数量</th><th width="40" nowrap>排序</th><th width="40" nowrap>显示</th><th width="140">操作</th></tr>
					<?php if(is_array($goods)){foreach($goods AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?>>
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $one['title']; ?></td>
						<td><?php echo $one['score']; ?></td>
						<td><?php echo $one['per_number']; ?></td>
						<td><?php echo $one['consume']; ?>/<?php echo $one['number']; ?></td>
						<td><?php echo $one['sort_order']; ?></td>
						<td><?php echo $one['display']; ?></td>
						<td class="op"><a href="/manage/credit/ajax.php?action=disable&id=<?php echo $one['id']; ?>" class="ajaxlink"><?php echo $one['enable']=='Y'?'禁用':'启用'; ?></a>｜<a href="/manage/credit/ajax.php?action=edit&id=<?php echo $one['id']; ?>" class="ajaxlink">编辑</a>｜<a href="/manage/credit/ajax.php?action=remove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="确定删除本商品？">删除</a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="8"><?php echo $pagestring; ?></td></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
