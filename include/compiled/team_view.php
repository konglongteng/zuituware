<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<?php if(is_newbie()){?><div id="sysmsg-guide"><div class="link"><a href="/help/tour.php"></a></div><a id="sysmsg-guide-close" href="javascript:void(0);" class="close">关闭</a></div><?php }?>

<?php if($team['close_time']){?>
<div id="sysmsg-tip" class="sysmsg-tip-deal-close"><div class="sysmsg-tip-top"></div><div class="sysmsg-tip-content"><div class="deal-close"><div class="focus">抱歉，您来晚了，<br />团购已经结束啦。</div><div id="tip-deal-subscribe-body" class="body"><form id="tip-deal-subscribe-form" method="post" action="/subscribe.php" class="validator"><table><tr><td>不想错过明天的团购？立刻订阅每日最新团购信息：&nbsp;</td><td><input type="text" name="email" class="f-text" value="" require="true" datatype="email" /></td><td>&nbsp;<input class="commit" type="submit" value="订阅" /></td></tr></table></form></div></div><span id="sysmsg-tip-close" class="sysmsg-tip-close">关闭</span></div><div class="sysmsg-tip-bottom"></div></div>
<?php }?>

<?php if($order){?>
<div id="sysmsg-tip" ><div class="sysmsg-tip-top"></div><div class="sysmsg-tip-content">您已经下过订单，但还没有付款。<a href="/order/check.php?id=<?php echo $order['id']; ?>">查看订单并付款</a><span id="sysmsg-tip-close" class="sysmsg-tip-close">关闭</span></div><div class="sysmsg-tip-bottom"></div></div><div id="deal-default"> 
<?php }?>

	<div id="deal-default">
		<?php include template("block_team_share");?>
		<div id="content">
			<div id="deal-intro" class="cf">
                <h1><?php if($team['close_time']==0){?><a class="deal-today-link" href="/team.php?id=<?php echo $team['id']; ?>">今日团购：</a><?php }?><?php echo $team['title']; ?></h1>
                <div class="main">
                    <div class="deal-buy">
                        <div class="deal-price-tag"></div>
					<?php if(($team['state']=='soldout')){?>
                        <p class="deal-price"><strong <?php if($team['team_price'] > 9999){?>class="digits5"<?php }?>><?php echo $currency; ?><?php echo moneyit($team['team_price']); ?></strong><span class="deal-price-soldout"></span></p>
					<?php } else if($team['close_time']) { ?>
                        <p class="deal-price"><strong <?php if($team['team_price'] > 9999){?>class="digits5"<?php }?>><?php echo $currency; ?><?php echo moneyit($team['team_price']); ?></strong><span class="deal-price-expire"></span></p>
					<?php } else { ?>
                        <p class="deal-price"><strong <?php if($team['team_price'] > 9999){?>class="digits5"<?php }?>><?php echo $currency; ?><?php echo moneyit($team['team_price']); ?></strong><span><a <?php echo $team['begin_time']<time()?'href="/team/buy.php?id='.$team['id'].'"':''; ?>><img src="/static/css/i/button-deal-buy.gif" /></a></span></p>
					<?php }?>
                    </div>
                    <table class="deal-discount">
                        <tr>
                            <th>原价</th>
                            <th>折扣</th>
                            <th>节省</th>
                        </tr>
                        <tr>
                            <td><?php echo $currency; ?><?php echo moneyit($team['market_price']); ?></td>
							<td><?php echo team_discount($team); ?></td>
                            <td><?php echo $currency; ?><?php echo $discount_price; ?></td>
                        </tr>
                    </table>
					<?php if($team['close_time']){?>
                    <div class="deal-box deal-timeleft deal-off" id="deal-timeleft" curtime="<?php echo $now; ?>000" diff="<?php echo $diff_time; ?>000">
						<h3>本团购结束于</h3>
						<div class="limitdate"><p class="deal-buy-ended"><?php echo date('Y-m-d', $team['close_time']); ?><br><?php echo date('H:i:s', $team['close_time']); ?></p></div>
					</div>
					<?php } else { ?>
                    <div class="deal-box deal-timeleft deal-on" id="deal-timeleft" curtime="<?php echo $now; ?>000" diff="<?php echo $diff_time; ?>000">
						<h3>剩余时间</h3>
						<div class="limitdate"><ul id="counter">
						<?php if($left_day>0){?>
							<li><span><?php echo $left_day; ?></span>天</li><li><span><?php echo $left_hour; ?></span>小时</li><li><span><?php echo $left_minute; ?></span>分钟</li>
						<?php } else { ?>
							<li><span><?php echo $left_hour; ?></span>小时</li><li><span><?php echo $left_minute; ?></span>分钟</li><li><span><?php echo $left_time; ?></span>秒</li>
						<?php }?>
						</ul></div>
					</div>
					<?php }?>

				<?php if($team['close_time']==0){?>
					<?php if($team['state']=='none'){?>
					<div class="deal-box deal-status" id="deal-status">
						<p class="deal-buy-tip-top"><strong><?php echo $team['now_number']; ?></strong> 人已购买</p>
						<div class="progress-pointer" style="padding-left:<?php echo $bar_size-$bar_offset; ?>px;"><span></span></div>
						<div class="progress-bar"><div class="progress-left" style="width:<?php echo $bar_size-$bar_offset; ?>px;"></div><div class="progress-right "></div></div>
						<div class="cf"><div class="min">0</div><div class="max"><?php echo $team['min_number']; ?></div></div>
						<p class="deal-buy-tip-btm">还差 <strong><?php echo $team['min_number']-$team['now_number']; ?></strong> 人到达最低团购人数</p>
					</div>
					<?php } else { ?>
					<div class="deal-box deal-status deal-status-open" id="deal-status">
						<p class="deal-buy-tip-top"><strong><?php echo $team['now_number']; ?></strong> 人已购买</p>
					<?php if($team['max_number']&&$team['max_number']>$team['now_number']){?>
						<p class="deal-buy-tip-btm">本单仅剩：<strong><?php echo $team['max_number']-$team['now_number']; ?></strong>份，欲购从速</p>
					<?php }?>
						<p class="deal-buy-on" style="line-height:200%;"><img src="/static/css/i/deal-buy-succ.gif"/> 团购成功！ <?php if($team['max_number']>$team['now_number']||$team['max_number']==0){?><br/>还可以继续购买<?php }?></p>
					<?php if($team['reach_time']){?>
						<p class="deal-buy-tip-btm"><?php echo date('G点i分', $team['reach_time']); ?>达到最低团购人数：<strong><?php echo $team['min_number']; ?></strong>人</p>
					<?php }?>
					</div>
					<?php }?>
				<?php } else { ?>
					<div class="deal-box deal-status deal-status-<?php echo $team['state']; ?>" id="deal-status"><div class="deal-buy-<?php echo $team['state']; ?>"></div><p class="deal-buy-tip-total">共有 <strong><?php echo $team['now_number']; ?></strong> 人购买</p></div> 
				<?php }?>
				</div>
                <div class="side">
                    <div class="deal-buy-cover-img" id="team_images">
					<?php if($team['image1']||$team['image2']){?>
						<div class="mid">
							<ul>
								<li class="first"><img src="<?php echo team_image($team['image']); ?>"/></li>
							<?php if($team['image1']){?>
								<li><img src="<?php echo team_image($team['image1']); ?>"/></li>
							<?php }?>
							<?php if($team['image2']){?>
								<li><img src="<?php echo team_image($team['image2']); ?>"/></li>
							<?php }?>
							</ul>
							<div id="img_list">
								<a ref="1" class="active">1</a>
							<?php $imageindex=1;; ?>
							<?php if($team['image1']){?>
								<a ref="<?php echo ++$imageindex; ?>" ><?php echo $imageindex; ?></a>
							<?php }?>
							<?php if($team['image2']){?>
								<a ref="<?php echo ++$imageindex; ?>" ><?php echo $imageindex; ?></a>
							<?php }?>
							</div> 
						</div>
						<?php } else { ?>
							<img src="<?php echo team_image($team['image']); ?>" width="440" height="280" />
						<?php }?>
					</div>
				<?php if(strip_tags($team['summary'])!=$team['summary']){?><?php echo $team['summary']; ?><?php } else { ?><div class="digest"><br /><?php echo nl2br(strip_tags($team['summary'])); ?></div><?php }?>
                </div>
            </div>
            <div id="deal-stuff" class="cf">
                <div class="clear box <?php echo ($partner&&!option_yes('teamwhole'))?'box-split':''; ?>">
                    <div class="box-top"></div>
                    <div class="box-content cf">
                        <div class="main" id="team_main_side">
						<?php if(trim($team['detail'])){?>
                            <h2 id="detail">本单详情</h2>
							<div class="blk detail"><?php echo $team['detail']; ?></div>
						<?php }?>
						<?php if(trim($team['notice'])){?>
							<h2 id="detailit">特别提示</h2>
							<div class="blk cf"><?php echo $team['notice']; ?></div>
						<?php }?>
						<?php if(trim(strip_tags($team['userreview']))){?>
							<h2 id="userreview">他们说</h2>
							<div class="blk review"><?php echo userreview($team['userreview']); ?></div>
						<?php }?>
						<?php if(trim(strip_tags($team['systemreview']))){?>
							<h2 id="systemreview"><?php echo $INI['system']['abbreviation']; ?>说</h2>
							<div class="blk review"><?php echo $team['systemreview']; ?></div>
						<?php }?>
						</div>

                        <div class="side" id="team_partner_side_<?php echo (!option_yes('teamwhole')&&abs(intval($partner['id'])))?1:0; ?>">
                            <div id="side-business">
								<h2><?php echo $partner['title']; ?></h2>
								<div style="margin-top:10px;"><?php echo $partner['location']; ?></div>
								<div style="margin-top:10px;"><a href="<?php echo $partner['homepage']; ?>" target="_blank"><?php echo domainit($partner['homepage']); ?></a></div>
								<?php include template("block_block_partnermap");?>
							</div>
						</div>

                        <div class="clear"></div>
                    </div>
					<?php if(($team['state']!='soldout') && !$team['close_time'] ){?>					<div class="deal-buy-bottom" style=" background-color: #DDF1F5;clear: both;padding: 30px 268px;border-left:2px solid #89B4D5;border-right:2px solid #89B4D5;border-bottom:2px solid #89B4D5;">
						<a class="pngfix" href="/team/buy.php?id=<?php echo $team['id']; ?>" rel="nofollow" >抢购</a>
					</div>
					<?php } else { ?>
					<div class="box-bottom"></div>
					<?php }?>
                </div>
            </div>
    </div>
    <div id="sidebar">
        <?php include template("block_side_daysign");?>
		<?php include template("block_side_invite");?>
		<?php include template("block_side_bulletin");?>
		<?php include template("block_side_flv");?>
		<?php include template("block_side_others_seconds");?>
		<?php include template("block_side_ask");?>
		<?php include template("block_side_others");?>
		<?php include template("block_side_mobile");?>
		<?php include template("block_side_vote");?>
		<?php include template("block_side_business");?>
		<?php include template("block_side_subscribe");?>
	</div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
