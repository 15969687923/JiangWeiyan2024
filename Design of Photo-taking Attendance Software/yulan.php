
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
			
			.zhengti{
					position:relative;
					top:46px;
				}
			.biaoti1{
				background: #09C5F7;
			}
			.biaoti2{
				color:white;
			}
			.canyu{
				text-align: center;
				background: yellowgreen;
				color:white;
				padding: 8px;
			}
			.an{
				margin: 20px;
				text-align: center;
			}
			.an1{
				width:150px;
				margin: 6px;
			}
		</style>
	</head>
	<body>
		<!--///这里写内容-->
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
		$q = $_GET["x"];
		// 检测连接
		if ($conn->connect_error) {
    	echo "连接失败！";
		exit(0);
		}
		else{
			$sql = "select name,xiangmuhao,kaishi,jieshu from xiangmujl where xiangmuhao = '$q'";
			$sql2 = "select yonghuming,touxiang from user where shoujihao = '$_SESSION[dianhuahao]'";
			$x = $conn->query($sql);
			$q1 = $conn->query($sql2);
			$row = $x->fetch_assoc();
			$row2 = $q1->fetch_assoc();
			echo "<header class='mui-bar mui-bar-nav mui-bar-transparent biaoti1' >
				<h1 class='mui-title biaoti2'>{$row['name']}   ID:{$row['xiangmuhao']}</h1>
				<a href='wode.php'><span class='mui-icon mui-icon-left-nav'></span></a>
   </header>
	<div class='zhengti'>
	<ul class='mui-table-view'>
    <li class='mui-table-view-cell mui-media'>
        <a href='javascript:;'>
            <img class='mui-media-object mui-pull-left' src='{$row2['touxiang']}'>
            <div class='mui-media-body'>
                {$row2['yonghuming']}
                <p class='mui-ellipsis'>发布人</p>
            </div>
        </a>
    </li>
</ul>
<form class='mui-input-group'>
<div class='mui-input-row'>
		        <label>开始时间</label>
		        <input type='datetime-local' readonly value='{$row['kaishi']}' id='starttime' />
		    </div>
		    <div class='mui-input-row'>
		        <label>截止时间</label>
		        <input type='datetime-local' readonly value='{$row['jieshu']}' id='endtime'/>
		    </div>
		</form>";
			}
		
  	?>	
		
	
	
	<ul class="mui-table-view mui-grid-view">
	<?php
			$sql = "select tupian1,tupian2,tupian3,tupian4,tupian5,tupian6,tupian7 from xiangmujl where xiangmuhao = '$q'";
			$x = $conn->query($sql);
			$row = $x->fetch_assoc();
			echo "<li class='mui-table-view-cell mui-media mui-col-xs-6'>
			<img class='mui-media-object' src='{$row['tupian1']}'>
			</li>";
			if($row['tupian2']!=""){
			echo "<li class='mui-table-view-cell mui-media mui-col-xs-6'>
			<img class='mui-media-object' src='{$row['tupian2']}'>
			</li>";}
			if($row['tupian3']!=""){
			echo "<li class='mui-table-view-cell mui-media mui-col-xs-6'>
			<img class='mui-media-object' src='{$row['tupian3']}'>
			</li>";}
			if($row['tupian4']!=""){
			echo "<li class='mui-table-view-cell mui-media mui-col-xs-6'>
			<img class='mui-media-object' src='{$row['tupian4']}'>
			</li>";}
			if($row['tupian5']!=""){
			echo "<li class='mui-table-view-cell mui-media mui-col-xs-6'>
			<img class='mui-media-object' src='{$row['tupian5']}'>
			</li>";}
			if($row['tupian6']!=""){
			echo "<li class='mui-table-view-cell mui-media mui-col-xs-6'>
			<img class='mui-media-object' src='{$row['tupian6']}'>
			</li>";}
			if($row['tupian7']!=""){
			echo "<li class='mui-table-view-cell mui-media mui-col-xs-6'>
			<img class='mui-media-object' src='{$row['tupian7']}'>
			</li>";}
		
			?>	
	

</ul>
<div class="an">
<button type="button" class="mui-btn mui-btn-primary an1" onclick="window.location.href='panduan.php?y=<?php  echo $_GET['x'];?>'">开始提交</button>
</div>
</div>
	</body>
	<script src="js/mui.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		
	</script>
</html>
