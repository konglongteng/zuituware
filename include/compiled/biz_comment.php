<?php include template("biz_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>用户点评</h2>
					<ul class="filter">
						<li><form action="/biz/comment.php" method="get">项目：<input type="text" class="h-input" name="title" value="<?php echo htmlspecialchars($title); ?>" >&nbsp;<input type="submit" value="筛选" class="formbutton"  style="padding:1px 6px;"/>&nbsp;<select name="grad"><?php echo Utility::Option($option_grad, $grad, '--所有--'); ?></select><input type="submit" value="筛选" class="formbutton"  style="padding:1px 6px;"/><form></li>
					</ul>
				</div>
                <div class="sect">
				    <div class="all_intro" style="text-indent:10px;">共组织<b> <?php echo $team_count; ?> </b>次团购, 购买 <b><?php echo $join_number; ?> </b>人次. <?php if($comments_num>0){?>
								<b> <?php echo $comments_num; ?> </b>次点评,满意度<b> <?php echo number_format(100*$login_partner['comment_good']/$comments_num,2); ?>% </b>
								<?php }?></div>
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="100" nowrap>用户</th><th width="450">项目名称</th><th width="80">满意度</th><th width="60" nowrap>是否愿意再来</th><th width="240" nowrap>评价</th></tr>
					<?php if(is_array($orders)){foreach($orders AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td><?php echo $users[$one['user_id']]['username']; ?></td>
							<td><?php echo $one['team_id']; ?>&nbsp;(<a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a>)</td>
							<td nowrap><?php if($one['comment_grade']=='good'){?>满意<?php } else if($one['comment_grade']=='none') { ?>一般<?php } else { ?>失望<?php }?></td>
							<td><?php if($one['comment_wantmore']=='Y'){?>是<?php } else if($one['comment_wantmore']=='N') { ?>否
							<?php } else { ?>暂未填写<?php }?></td>
							<td><?php echo $one['comment_content']; ?></td>
						</tr>	
					<?php }}?>
						<tr><td colspan="6"><?php echo $pagestring; ?></td></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
