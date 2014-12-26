<?php
header("Content-Type: text/html; charset=utf-8") ;

function _get($str){
    $val = !empty($_GET[$str]) ? $_GET[$str] : null;
    return $val;
}
session_start();
$Action = isset($_GET["action"]) ? $_GET["action"] : null;
/*mobi版本 */
$username = htmlspecialchars($_POST["username"]);
$password=$_POST["password"];

/*web版本*/
//$username = htmlspecialchars(_get("username"));
//$password=_get("password");

//包含数据库连接文件
include('conn.php');
mysql_query("set names utf8");
//检测用户名及密码是否正确
$sql = "select user_id ,username from auction_user 
 where username='$username' and userpass='$password' limit 1";
$check_query = mysql_query($sql);
//echo $sql;
$arr=array();//空的数组
if($result = mysql_fetch_array($check_query)){
    //登录成功
    $_SESSION['username'] = $result['username'];
	//echo $result['username'];
    $_SESSION['userid'] = $result['user_id'];
    $sessionid=session_id();    
    $_SESSION['$sessionid'] = $sessionid;
    
    $arr = array(  

    'flag'=>'success',
    
    'name'=>$result['username'],  

    'userid'=>$result['user_id'],  

    'sessionid'=>$sessionid  

 ); 
    
    echo json_encode($arr); 
    
} else {
	
	 $arr = array(  

    'flag'=>'error',
    
    'name'=>'',  

    'userid'=>'',  

    'sessionid'=>$sessionid  

 ); 
    echo json_encode($arr);  
}
?>
