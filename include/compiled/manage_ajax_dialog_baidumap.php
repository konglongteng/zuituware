<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:620px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">关闭</span>百度地图坐标定位</h3>
	<div id="map_container" style="width:620px; height:420px"></div> 
</div>
<script>
function GShowMap() {
		var map = new BMap.Map("map_container");
		map.enableScrollWheelZoom();
		var opts = {type: BMAP_NAVIGATION_CONTROL_SMALL}  
		map.addControl(new BMap.NavigationControl(opts)); 
		var point = new BMap.Point(<?php echo $lati; ?>, <?php echo $longi; ?>);
		map.centerAndZoom(point, 12);
		var marker = new BMap.Marker(point); 
		map.addOverlay(marker); 
		marker.enableDragging();
		marker.addEventListener("dragend",function(e){
			map.panTo(new BMap.Point(e.point.lng, e.point.lat));
			X.misc.setbaidumappoint(e);
		});	
		map.addEventListener("click",function(e){
			X.misc.setbaidumapclick(e);
		});
}

setTimeout(GShowMap,100);
</script>
