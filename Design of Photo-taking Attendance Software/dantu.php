<?php
header("Content-Type:text/html;charset=utf-8");
$servername = "localhost:3306";
$username = "root";
$password = "861576789n";
$dbname = "tuqiandb";
 
// 创建连接
$conn = new mysqli($servername, $username, $password,$dbname);
$conn->set_charset("utf-8");
session_start();
$_SESSION["x"] = 0;
$_SESSION["y"] = 0;
$_SESSION["xiangmuming"] = 0;
$_SESSION["jieshao"] = 0;
$_SESSION["kai"] = 0;
$_SESSION["jie"] = 0;
$_SESSION["tutu"] = 0;
// 检测连接
if ($conn->connect_error) {
    echo "连接失败！";
	exit(0);
}
else{
	$a = $_POST["xx"];
	$b = $_POST["yy"];
	$c = $_POST["xiangmuming"];
	$d = $_POST["jieshao"];
	$e = $_POST["kai"];
	$f = $_POST["jie"];
	$s = rand(0,9999);
	$n = $_SESSION["dianhuahao"];
	$t = $_POST["tu1"];;
	while(true){
		$sql = "select xiangmuhao from xiangmujl where xiangmuhao = '$s'";
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if($number!=1)
        	break;
        $s = rand(0,9999);
	}
    		$sql2 = "INSERT INTO xiangmujl(xiangmuhao,shoujihao,kaishi,jieshu,name,miaoshu,tupian1,jing1,wei1,tushu) VALUES('".$s."','".$n."','".$e."','".$f."','".$c."','".$d."','".$t."','".$a."','".$b."','1')";
			if($conn->query($sql2) === TRUE){
			$conn->close();
			echo '<script charset="UTF-8">alert("创建成功");window.location.href="yingyong.php";</script>';
   }
        }


?>