<?php 
$today = Utility::GetDate();
$daytime = strtotime(date('Y-m-d'));
if ( abs($INI['system']['givemoney']) || abs($INI['system']['givecredit'])){
$condition = array( 
			'user_id' => $login_user['id'],
            'create_time' => $daytime,
			);
$userdaysign = DB::LimitQuery('daysign', array(
				'condition' => $condition,
				));
}
$count = Table::Count('daysign', array(
		'user_id' => $login_user['id'],)
		);
$income_money = Table::Count('daysign', array(
	    'user_id' => $login_user['id'],
        ), 'money');
$income_credit = Table::Count('daysign', array(
	    'user_id' => $login_user['id'],
        ), 'credit');
; ?>
<?php if(option_yes('daysign')){?>
<div class="sbox">
	<div class="sbox-top"></div>
	<div class="sbox-content">
		<div class="daysign">
			<h2>每日签到</h2>
			<?php if($userdaysign){?>
			<div class="havesign" id="nowsign">
			    <div class="weekday"><?php echo $today['week']; ?></div> 
			</div>
			<div class="signtip" id="showSignTips">今日已签到</div>
			<?php } else { ?>
            <div class="signweek" id="nowsign">
			    <a href="/ajax/daysign.php?action=daily&id=<?php echo $login_user['id']; ?>" class="ajaxlink"><div class="weekday"><?php echo $today['week']; ?></div> </a>
			</div>
			<div class="signtip" id="showSignTips">今日未签到</div>
			<?php }?>
			<div class="clear"> </div>
            <?php if(!$login_user){?>
			<div class="signinfo">
			您还没有<a href="/account/login.php">登陆</a>,要登陆才能签到。
			</div>
			<?php }?>
			<?php if($userdaysign){?>
            <div class="signinfo">
			累计签到<?php echo $count; ?>次.获得<?php if(option_yes('givemoney')){?><?php echo $income_money; ?>元<?php }?><?php if(option_yes('givecredit')){?>&nbsp;<?php echo $income_credit; ?>积分<?php }?>.
			</div>
			<?php }?>
			<?php if(option_yes('givemoney')){?>
			<div class="signinfo">
			每日签到可赚取<?php echo $INI['system']['givemoney']; ?>元
			</div>
			<?php }?>
			<?php if(option_yes('givecredit')){?>
			<div class="signinfo">
			每日签到可赚取<?php echo $INI['system']['givecredit']; ?>积分
			</div>
            <?php }?>
			
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>

<?php }?>
