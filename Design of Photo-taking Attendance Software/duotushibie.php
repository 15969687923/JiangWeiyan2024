<?php
header("Content-type: text/html; charset=utf-8");
if(empty($_SERVER['DOCUMENT_ROOT']) && !empty($_SERVER['SCRIPT_FILENAME'])) {
    $_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr($_SERVER['SCRIPT_FILENAME'], 0, 0 - strlen($_SERVER['PHP_SELF'])));
}
if(empty($_SERVER['DOCUMENT_ROOT']) && !empty($_SERVER['PATH_TRANSLATED'])) {
    $_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr(str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']), 0, 0 - strlen($_SERVER['PHP_SELF'])));
}
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
if(@$_POST['name'])
	$_SESSION['jlname'] = $_POST['name'];
if(@$_POST['jieshao'])
	$_SESSION['jljieshao'] = $_POST['jieshao'];
if(@$_POST['kaishi'])
	$_SESSION['jlkaishi'] = $_POST['kaishi'];
if(@$_POST['jieshu'])
	$_SESSION['jljieshu'] = $_POST['jieshu'];
if(@$_POST['tushu'])
	$_SESSION['jltushu'] = $_POST['tushu'];
$a = $_SESSION['jlname'];
$b = $_SESSION['jljieshao'];
$c = $_SESSION['jlkaishi'];
$d = $_SESSION['jljieshu'];
$e = $_SESSION['jltushu'];
	if(@$_POST['px1'])
	$_SESSION['px1'] = $_POST['px1'];
	if(@$_POST['px2'])
	$_SESSION['px2'] = $_POST['px2'];
	if(@$_POST['px3'])
	$_SESSION['px3'] = $_POST['px3'];
	if(@$_POST['px4'])
	$_SESSION['px4'] = $_POST['px4'];
	if(@$_POST['px5'])
	$_SESSION['px5'] = $_POST['px5'];
	if(@$_POST['py1'])
	$_SESSION['py1'] = $_POST['py1'];
	if(@$_POST['py2'])
	$_SESSION['py2'] = $_POST['py2'];
	if(@$_POST['py3'])
	$_SESSION['py3'] = $_POST['py3'];
	if(@$_POST['py4'])
	$_SESSION['py4'] = $_POST['py4'];
	if(@$_POST['py5'])
	$_SESSION['py5'] = $_POST['py5'];
$px1 = $_SESSION['px1'];
$px2 = $_SESSION['px2'];
$px3 = $_SESSION['px3'];
$px4 = $_SESSION['px4'];
$px5 = $_SESSION['px5'];
$py1 = $_SESSION['py1'];
$py2 = $_SESSION['py2'];
$py3 = $_SESSION['py3'];
$py4 = $_SESSION['py4'];
$py5 = $_SESSION['py5'];
$t1 = "";
$t2 = "";
$t3 = "";
$t4 = "";
$t5 = "";
@$t1 = $_POST["mu1"];
@$t2 = $_POST["mu2"];
@$t3 = $_POST["mu3"];
@$t4 = $_POST["mu4"];
@$t5 = $_POST["mu5"];
@$s = rand(0,9999);
$n = $_SESSION['dianhuahao'];

while(true){
		$sql = "select xiangmuhao from xiangmujl where xiangmuhao = '$s'";
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if($number!=1)
        	break;
        $s = rand(0,9999);
	}
	if(@$_POST["mu1"]){
	$sql2 = "INSERT INTO xiangmujl(xiangmuhao,shoujihao,kaishi,jieshu,name,miaoshu,tupian1,tupian2,tupian3,tupian4,tupian5,tushu,jing1,jing2,jing3,jing4,jing5,wei1,wei2,wei3,wei4,wei5) VALUES('".$s."','".$n."','".$c."','".$d."','".$a."','".$b."','".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$e."','".$px1."','".$px2."','".$px3."','".$px4."','".$px5."','".$py1."','".$py2."','".$py3."','".$py4."','".$py5."')";
			if($conn->query($sql2) === TRUE){
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
			$conn->close();
			echo '<script charset="UTF-8">alert("创建成功");window.close();</script>';
   }else{
   	echo "shibaile";
   	
   }
  }
}
?>