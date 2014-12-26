<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_user('manager'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>管理员列表</h2>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="50">ID</th><th width="200">Email</th><th width="100" nowrap>用户名</th><th width="100" nowrap>姓名</th><th width="200">注册时间</th></th><th width="100">手机号码</th><th width="80">操作</th></tr>
					<?php if(is_array($users)){foreach($users AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $one['email']; ?></td>
						<td><?php echo $one['username']; ?></td>
						<td><?php echo $one['realname']; ?></td>
						<td><?php echo date('Y-m-d H:i', $one['create_time']); ?></td>
						<td><?php echo $one['mobile']; ?></td>
						<td class="op" nowrap><a href="/manage/user/edit.php?id=<?php echo $one['id']; ?>">编辑</a><?php if(is_manager(true)){?>｜<a href="/ajax/system.php?action=authorization&id=<?php echo $one['id']; ?>" class="ajaxlink">授权</a><?php }?></td>
					</tr>
					<?php }}?>
					<tr><td colspan="7"><?php echo $pagestring; ?></tr>
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
