<?php
header("Content-type: text/html; charset=utf-8");
$servername = "localhost:3306";
$username = "root";
$password = "861576789n";
$dbname = "tuqiandb";
 
// 创建连接
$conn = new mysqli($servername, $username, $password,$dbname);
$conn->set_charset("utf-8");
session_start();
// 检测连接
if ($conn->connect_error) {
    echo "连接失败！";
	exit(0);
}
else{
	mysqli_query($conn,"UPDATE user SET yonghuming = '$_POST[yonghuming]'
	WHERE shoujihao = '$_SESSION[dianhuahao]'");
	mysqli_query($conn,"UPDATE user SET xingbie = '$_POST[xingbie]'
	WHERE shoujihao = '$_SESSION[dianhuahao]'");
	mysqli_query($conn,"UPDATE user SET nianling = '$_POST[nianling]'
	WHERE shoujihao = '$_SESSION[dianhuahao]'");
	//echo $_SESSION["dianhuahao"];
	$x = $conn->query("select yonghuming,xingbie,nianling from user where shoujihao = '$_SESSION[dianhuahao]'");
	$x1 = $x->fetch_array(MYSQLI_ASSOC);
	$_SESSION["yonghuming"] = $x1['yonghuming'];
	$_SESSION["xingbie"] = $x1['xingbie'];
	$_SESSION["nianling"] = $x1['nianling'];
	echo '<script charset="UTF-8">alert("修改成功！");window.history.back();</script>';
}
?>