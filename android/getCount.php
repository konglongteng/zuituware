<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$city = array();
$daytime = strtotime(date('Y-m-d'));
$condition = array( 
	"begin_time <= {$daytime}", 
	"end_time > {$daytime}",
);

/* city filter */
$ename = strval($_GET['ename']);
if ($ename && $ename!='none') {
	$city = DB::LimitQuery('category', array(
		'condition' =>

array(
			'zone' => 'city',
			'ename' => $ename,
		),
		'one' => true,
	));
}
if ($ename||$city) {
	$city_id = abs(intval($city['id']));
	$condition[] = "((city_ids like '%@{$city_id}@%' or city_ids like '%@0@%') or city_id in(0,{$city_id}))";
}


/* end city filter */

$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY sort_order DESC, id DESC',
	'select' => 'count(*) as id ',                //get count   
));



$oa = array();
$si = array(
		'site_name' => $INI['system']['sitename'],
		'site_title' => $INI['system']['sitetitle'],
		'site_url' => $INI['system']['wwwprefix'],
		);

foreach($teams AS $one) {
	echo $one['id'];
	
}



//if ('json'===strtolower(strval($_GET['s'])))
//Output::Json($o);


//header('Content-Type: application/xml; charset=UTF-8');
//Output::Xml($o); 