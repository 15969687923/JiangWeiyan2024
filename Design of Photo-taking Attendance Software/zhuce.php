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
	$a = $_POST["dianhuahao"];
	$b = $_POST["yonghuming"];
	$c = $_POST["mima"];
	$sql = "select shoujihao from user where shoujihao = '$_POST[dianhuahao]'";
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if($number){
        	$conn->close();
        	echo '<script charset="UTF-8">alert("手机号已被注册！");history.go(-1);</script>';
        }
        else{
        	$sql2 = "INSERT INTO user(shoujihao,yonghuming,mima) VALUES(".$a.",'".$b."','".$c."')";
        	
			if($conn->query($sql2) === TRUE){
			$conn->close();
			echo '<script charset="UTF-8">alert("注册成功");window.location.href="denglu.php";</script>';
        	}
        }
}
?>