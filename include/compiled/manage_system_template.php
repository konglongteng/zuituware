<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('template'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>模板编辑</h2></div>
                <div class="sect">
                    <form method="post">
						<div class="wholetip clear"><h3>include/template/目录下可写的模板文件方可编辑</h3></div>
						<div class="field">
							<label>模板选择</label>
							<select name="template_id" id="manage_system_template_id" class="f-input" onchange="X.manage.loadtemplate(this.options[this.selectedIndex].value);"><?php echo Utility::Option($may, $template_id, '-'); ?></select>
						</div>
					<?php if($content||$template_id){?>
						<div class="field">
							<label>内容编辑</label>
							<div style="float:left;"><textarea cols="90" rows="25" name="content"><?php echo htmlspecialchars($content); ?></textarea></div>
						</div>
					<?php }?>
                        <div class="act">
                            <input type="submit" value="保存" name="commit" class="formbutton"/>
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
