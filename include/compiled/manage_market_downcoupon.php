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
					<h2><?php echo $INI['system']['couponname']; ?>下载</h2>
					<ul class="filter"><?php echo mcurrent_market_down('downcoupon'); ?></ul>
				</div>
                <div class="sect">
                    <form method="post" target="_blank" class="validator">
                        <div class="field">
                            <label>项目名称</label>
							<input type="text" name="team_id" require="true" datatype="number" class="number" /><span class="inputtip">请输入项目的ID</span>
						</div>

                        <div class="field">
                            <label>消费状态</label>
							<div style="padding-top:8px;"><input type="checkbox" name="consume[]" value="Y" checked />&nbsp;已消费&nbsp;&nbsp;<input type="checkbox" name="consume[]" value="N" checked>&nbsp;未消费</div>
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
