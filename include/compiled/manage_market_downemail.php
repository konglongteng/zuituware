<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('down'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>邮件地址</h2>
					<ul class="filter"><?php echo mcurrent_market_down('downemail'); ?></ul>
				</div>
                <div class="sect">
                    <form method="post" target="_blank">
                        <div class="field">
                            <label>城市范围</label>
							<div style="padding-top:8px;"><?php if(is_array($allcities)){foreach($allcities AS $one) { ?><input type="checkbox" name="city_id[]" value="<?php echo $one['id']; ?>" checked />&nbsp;<?php echo $one['name']; ?>&nbsp;&nbsp;<?php }}?><input type="checkbox" name="city_id[]" value="0" checked>&nbsp;其他</div>
						</div>

                        <div class="field">
                            <label>邮件来源</label>
							<div style="padding-top:8px;"><input type="checkbox" name="source[]" value="user" checked />&nbsp;注册用户&nbsp;&nbsp;<input type="checkbox" name="source[]" value="subscribe" checked>&nbsp;邮件订阅</div>
						</div>

                        <div class="act">
                            <input type="submit" value="下载" name="commit" class="formbutton"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
