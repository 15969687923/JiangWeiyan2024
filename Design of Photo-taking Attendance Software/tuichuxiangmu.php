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
			$sql2 = "DELETE FROM xiangmucy where xiangmuhao = '$_GET[x]' and shoujihao = '$_SESSION[dianhuahao]'";
			$y = $conn->query($sql2);
			if($y)
			echo '<script charset="UTF-8">alert("退出成功");window.location.href="yingyong.php";</script>';
			else
			echo '<script charset="UTF-8">alert("退出失败");</script>';
		}
?>