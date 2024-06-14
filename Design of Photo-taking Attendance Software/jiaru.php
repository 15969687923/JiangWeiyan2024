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
	$b = $_SESSION['dianhuahao'];
	$a = $_SESSION['jiaru'];
	
	$sql = "select * from xiangmucy where shoujihao = '$_SESSION[dianhuahao]' AND xiangmuhao = '$_SESSION[jiaru]'";
	$sql2 = "select * from xiangmujl where  xiangmuhao = '9939'";
        $result = $conn->query($sql);
        $x = $conn->query($sql2);
        $row = $x->fetch_assoc();
        $c = $row['tupian1'];
        $number = mysqli_num_rows($result);
        if($number!=0){
        	$conn->close();
        	echo '<script charset="UTF-8">alert("已经加入过此项目了！");history.go(-1);</script>';
        }
        else{
        	$sql2 = "INSERT INTO xiangmucy(xiangmuhao,shoujihao,shibiezhuangtai,tupian1,tupian2,tupian3,tupian4,tupian5) VALUES(".$a.",'".$b."','未完成','".$c."','".$c."','".$c."','".$c."','".$c."')";
        	
			if($conn->query($sql2) === TRUE){
			$conn->close();
			echo '<script charset="UTF-8">alert("加入成功");history.go(-1);</script>';
        	}
        }
}
?>