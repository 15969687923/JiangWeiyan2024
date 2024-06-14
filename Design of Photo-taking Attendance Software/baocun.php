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
		@$t1 = $_POST["mu1"];
		@$t2 = $_POST["mu2"];
		@$t3 = $_POST["mu3"];
		@$t4 = $_POST["mu4"];
		@$t5 = $_POST["mu5"];
		if ($conn->connect_error) {
    	echo "连接失败！";
		exit(0);
		}
		else{
			$sql = "UPDATE xiangmucy SET tupian1 = '$_POST[mu1]' WHERE xiangmuhao = '$_POST[chuan]' and shoujihao = '$_SESSION[dianhuahao]'";
			@$sql2 = "UPDATE xiangmucy SET tupian2 = '$_POST[mu2]' WHERE xiangmuhao = '$_POST[chuan]' and shoujihao = '$_SESSION[dianhuahao]'";
			@$sql3 = "UPDATE xiangmucy SET tupian3 = '$_POST[mu3]' WHERE xiangmuhao = '$_POST[chuan]' and shoujihao = '$_SESSION[dianhuahao]'";
			@$sql4 = "UPDATE xiangmucy SET tupian4 = '$_POST[mu4]' WHERE xiangmuhao = '$_POST[chuan]' and shoujihao = '$_SESSION[dianhuahao]'";
			@$sql5 = "UPDATE xiangmucy SET tupian5 = '$_POST[mu5]' WHERE xiangmuhao = '$_POST[chuan]' and shoujihao = '$_SESSION[dianhuahao]'";
			$x = $conn->query($sql);
			$x2 = $conn->query($sql2);
			$x3 = $conn->query($sql3);
			$x4 = $conn->query($sql4);
			$x5 = $conn->query($sql5);
			
			if($x&&$x2&&$x3&&$x4&&$x5)
				echo '<script charset="UTF-8">alert("保存成功！");history.go(-1);</script>';
			else	
				echo '<script charset="UTF-8">alert("保存失败！");history.go(-1);</script>';
			
		}
?>