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
			$sql = "DELETE FROM xiangmucy where xiangmuhao = '$_POST[chuan]'";
			$sql2 = "update xiangmujl set kaishi = '$_POST[kaishi]' where xiangmuhao = '$_POST[chuan]'";
			$sql3 = "update xiangmujl set jieshu = '$_POST[jieshu]' where xiangmuhao = '$_POST[chuan]'";
			$x = $conn->query($sql);
			$y = $conn->query($sql2);
			$z = $conn->query($sql3);
			if($x&&$y&&$z)
			echo '<script charset="UTF-8">alert("重置成功");window.location.href="yingyong.php";</script>';
			else
			echo '<script charset="UTF-8">alert("重置失败");</script>';
		}
?>