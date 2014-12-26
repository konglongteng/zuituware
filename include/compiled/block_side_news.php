<?php 
$others_news = DB::LimitQuery('news', array(
				'order' => 'ORDER BY `begin_time` DESC, `id` DESC',
				'size' => '5',
				));
; ?>
<?php if($others_news){?>
<style type="text/css">
#demo {overflow:hidden;height: 120px;}
#demo1 ul li{border-bottom:1px dashed #333;}
#demo1 ul li a{text-decoration:none}
</style>
<div class="sbox side-business">
	<div class="sbox-top"></div>
	<div class="sbox-content">
		<div class="tip others">
		<h2><?php echo $INI['system']['sitename']; ?>新闻</h2>
<div id="demo">
	<div id="demo1">
		<ul>
		<?php if(is_array($others_news)){foreach($others_news AS $one) { ?>
			<li><a href="/news.php?id=<?php echo $one['id']; ?>" target="_blank"><?php echo mb_strimwidth($one['title'],0,30,'...'); ?></a></li>
		<?php }}?>
        </ul>	
 	</div>
	<div id="demo2"></div>
</div>
		
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>

<?php }?>