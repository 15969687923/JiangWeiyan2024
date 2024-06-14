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
		$q = $_GET['y'];
		if ($conn->connect_error) {
    	echo "连接失败！";
		exit(0);
		}
		else{
			$sql = "select jing1 from xiangmujl where xiangmuhao = '$q'";
			$x = $conn->query($sql);
			$row = $x->fetch_assoc();
			if($row['jing1']=='')
				echo "<script charset='UTF-8'>window.location.href='wudizhi.php?y={$q}';</script>";
			else
				echo "<script charset='UTF-8'>window.location.href='youdizhi.php?y={$q}';</script>";
			}
?>