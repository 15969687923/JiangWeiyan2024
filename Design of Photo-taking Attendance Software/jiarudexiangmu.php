<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Hello MUI</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<!--标准mui.css-->
		<link rel="stylesheet" href="css/mui.min.css">
		<style>
			
			.biao11{
					background:#09C5F7;
				}
				.biao12{
					color:white;
				}
				.zhengti{
					position:relative;
					top:46px;
				}
		</style>
	</head>
	<body>
		<!--///这里写内容-->
		<header class="mui-bar mui-bar-nav mui-bar-transparent biao11">
					<h1 class="mui-title biao12">我加入的项目</h1>
					<a href="yingyong.php"><span class="mui-icon mui-icon-left-nav"></span></a>
		</header>
		<div class="zhengti">
	<ul class="mui-table-view">
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
			$sql2 = "select xiangmuhao from xiangmucy where shoujihao = '$_SESSION[dianhuahao]'";
			$y = $conn->query($sql2);
			while($rows = $y->fetch_assoc()){
				$sql = "select name,xiangmuhao,kaishi,tupian1 from xiangmujl where xiangmuhao = '$rows[xiangmuhao]'";
				$x = $conn->query($sql);
				while($row = $x->fetch_assoc()){
				echo "<li class='mui-table-view-cell mui-media'>
				<a href='yulan.php?x={$row['xiangmuhao']}'>
				<img class='mui-media-object mui-pull-left' src={$row['tupian1']}>
				<div class='mui-media-body'>
				{$row['name']} ID:{$row['xiangmuhao']}
				<p class='mui-ellipsis'>{$row['kaishi']}</p>
				</div></a></li></li>";
				}
			}
		}
  	?>			
		
</div>
	</body>
	<script src="js/mui.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		
	</script>
</html>
<!--该页面生成由SX html5全栈编辑器制作。全中文专业级编辑器、可开发微信、支付宝、百度小程序，安卓、IOS APP、响应式网站、PHP、软件界面UI等！-->