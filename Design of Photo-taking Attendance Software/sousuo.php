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
$_SESSION["panduan"] = 0;
// 检测连接
if ($conn->connect_error) {
    echo "连接失败！";
	exit(0);
}else{
	$sql="select xiangmuhao,shoujihao,name,tupian1,kaishi,miaoshu from xiangmujl where xiangmuhao = '$_POST[sousuo]'";
	$result = $conn->query($sql);
    $number = mysqli_num_rows($result);
    $x = $result->fetch_array(MYSQLI_ASSOC);
    $sql2="select touxiang from user where shoujihao ='$x[shoujihao]'";
    $y = $conn->query($sql2);
    $y2 = $y->fetch_array(MYSQLI_ASSOC);
    if($number){
    	$_SESSION["jiaru"] = $x['xiangmuhao'];
    	$_SESSION["kaishi"] = $x['kaishi'];
		$_SESSION["name"] = $x['name'];
		$_SESSION["tupian1"] = $x['tupian1'];
		$_SESSION["miaoshu"] = $x['miaoshu'];
		$_SESSION["panduan"] = 1;
		$_SESSION["touxiang2"] = $y2["touxiang"];
		echo '<script>window.location.href="yingyong.php?type=1";</script>';
    }else{
    	$_SESSION["panduan"] = 0;
    	echo '<script charset="UTF-8">alert("请输入正确的项目ID");history.go(-1);</script>';
    }
}
?>