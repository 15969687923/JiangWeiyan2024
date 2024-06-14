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
$_SESSION['dianhuahao'] = $_POST['phone'];
$_SESSION["yonghuming"] = "";
$_SESSION["touxiang"] = "";
$_SESSION['jlname'] = "";
$_SESSION['jljieshao'] = "";
$_SESSION['jlkaishi'] = "";
$_SESSION['jljieshu'] = "";
$_SESSION['jltushu'] = "";
$_SESSION['px1'] = "";
$_SESSION['px2'] = "";
$_SESSION['px3'] = "";
$_SESSION['px4'] = "";
$_SESSION['px5'] = "";
$_SESSION['py1'] = "";
$_SESSION['py2'] = "";
$_SESSION['py3'] = "";
$_SESSION['py4'] = "";
$_SESSION['py5'] = "";
// 检测连接
if ($conn->connect_error) {
    echo "连接失败！";
	exit(0);
}
else{
	 $sql = "select shoujihao,mima from user where shoujihao = '$_POST[phone]' and mima = '$_POST[password]'";
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if ($number) {
			$x = $conn->query("select yonghuming from user where shoujihao = '$_POST[phone]'");
			$x1 = $x->fetch_array(MYSQLI_ASSOC);
			$_SESSION["yonghuming"] = $x1['yonghuming'];
			$y = $conn->query("select touxiang from user where shoujihao = '$_POST[phone]'");
			$y1 = $y->fetch_array(MYSQLI_ASSOC);
			$_SESSION["touxiang"] = $y1['touxiang'];
			if($_SESSION["touxiang"]=="")
				$_SESSION["touxiang"] = "1.jpg";
				
			$_SESSION["panduan"] = 0 ;
			$_SESSION["jiaru"] = 0;
			$conn->close();
			
            echo '<script charset="UTF-8">window.location.href="yingyong.php";</script>';
        } else {
        	$conn->close();
            echo '<script charset="UTF-8">alert("用户名或密码错误！");history.go(-1);</script>';
        }
    }


?>