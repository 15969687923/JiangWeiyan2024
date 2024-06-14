<!DOCTYPE html>
<html>
	<head>
<meta charset="utf-8">
		<title>Hello MUI</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<script src="html5plus://ready"></script>
		

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
			.niu{
				position:relative;
				top:36px;
				text-align: center;
			}
		</style>
	</head>
	<body style="height: 100%;">
		<!--///这里写内容-->
		<header class="mui-bar mui-bar-nav mui-bar-transparent biaoti1">
	<h1 class="mui-title biaoti2">重置时间</h1>
	<a href='xiangxixiangmu.php?x=<?php  echo $_GET['x'];?>'><span class='mui-icon mui-icon-left-nav'></span></a>
    </header>
	<div class="zhengti">
		<form class="mui-input-group" action="chongzhishijian.php" method="post" >
	<div class="mui-input-row">
		        <label>开始时间</label>
		        <input type="datetime-local"  value="2019-08-01T08:00:00" id="starttime" name='kaishi'/>
		    </div>
		    <div class="mui-input-row">
		        <label>截止时间</label>
		        <input type="datetime-local"  value="2019-08-01T08:00:00" id="endtime" name='jieshu'/>
		        <input type="hidden" value=<?php  echo $_GET['x'];?> name='chuan'>
		    </div>
		    <div class='niu'>
		    <button type="submit" class="mui-btn mui-btn-warning an1">重新发布</button>
		    </div>
			</form>
		</div>	
	</body>
</html>