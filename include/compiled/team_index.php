<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="recent-deals">
<?php if(option_yes('cateteam')){?>
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_teamcategory($group_id); ?></ul>
	</div>
<?php }?>
    <div id="content">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2><?php echo $category['name']; ?><?php echo $pagetitle; ?></h2></div>
			        <form method="get">
                                   <div id="jqtgss">
                                        <div id="jqtgssa">
                	                   <ul>
                	                      <li>
                	                 	<span id="gjc">关键字:</span><input type="text" value="<?php echo $searchName; ?>" class="hw-input" name="searchName">&nbsp;&nbsp;&nbsp;
                		时间范围：<input type="text" value="<?php echo $start_time; ?>" id="start_time" class="Wdate" name="start_time" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/>&nbsp;至&nbsp;
                		<input type="text" value="<?php echo $search_end_time; ?>" class="Wdate" id="end_time" name="end_time" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/>
					      </li>
                	                   </ul>
					 </div> 
                                   <div id="jqtgssb"><input type="submit"
  class="formbutton" value="筛选"></div>
                                        </div>
                                       </form> 
                        	<div class="sect">
					<ul class="deals-list">
					<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
						<li class="<?php echo $index++%2?'alt':''; ?> <?php echo $index<=2?'first':''; ?>">
							<p class="time"><?php echo date('Y年n月j日', $one['begin_time']); ?></p>
							<h4><a href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><?php echo mb_strimwidth($one['title'],0,86,'...'); ?></a></h4>
							<div class="pic">
								<div class="<?php echo $one['picclass']; ?>"></div>
								<a href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><img alt="<?php echo $one['title']; ?>" src="<?php echo team_image($one['image'], true); ?>" width="200" height="121"></a>
							</div>
							<div class="info">
								<p class="total"><strong class="count"><?php echo $one['now_number']; ?></strong>人购买</p>
								<p class="price">原价：<strong class="old"><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['market_price']); ?></strong><br />折扣：<strong class="discount"><?php echo team_discount($one); ?>折</strong><br />现价：<strong><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['team_price']); ?></strong><br />节省：<strong><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['market_price']-$one['team_price']); ?></strong><br /></p>
							</div>
							<?php if(option_yes('moneysave')){?><div id="info_a">共为用户节省:<strong class="count"><?php echo $currency; ?><?php echo moneyit($one['now_number']*($one['market_price']-$one['team_price'])); ?></strong></div><?php }?>
						</li>
					<?php }}?>
					</ul>
					<div class="clear"></div>
					<div><?php echo $pagestring; ?></div>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
	<div id="sidebar">
		<?php include template("block_side_mobile");?>
        <?php include template("block_side_news");?>
		<?php include template("block_side_subscribe");?>
	</div>
</div>
    </div> <!-- bd end -->
</div> <!-- bdw end -->
<script type="text/javascript" src="/static/js/datepicker/WdatePicker.js"></script>
<?php include template("footer");?>
