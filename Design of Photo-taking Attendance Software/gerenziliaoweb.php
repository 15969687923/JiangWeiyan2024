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
			
			.lan1{
				background:#09C5F7;
			}
			.biao1{
				color:white;
			}
			.zhengti{
				position: relative;
				top:45px;
			}
			#dan{
				background-color:white;
			}
			.xian{
				margin:0px;
				padding:0px;
			}
			.gai1:focus{
				background:#09C5F7;
			}
			.kuang{
				text-align:center;
				position:relative;
				top:50px;
			}
			.an1{
				width:300px;
			}
			.xian{
				margin:0px;
				padding:0px;
			}
			.kuang2{
				text-align:center;
				position:relative;
				top:30px;
			}
		</style>
		<?php
			session_start();
			?>
	</head>
	<body>
		<!--///这里写内容-->
		<header class="mui-bar mui-bar-nav mui-bar-transparent lan1" data-top='0' data-offset='150' data-duration='16' data-scrollby=".mui-scroll-wrapper">
		<h1 class="mui-title biao1">个人资料</h1>
			<a href="yingyong.php"><span class="mui-icon mui-icon-left-nav"></span></a>
</header>
<div class="zhengti">

	<div class="mui-input-row" id="dan" >
    <label>手机号：</label>
    <input type="text" readonly value="<?php  echo $_SESSION['dianhuahao'];?>">
	</div>
	<form action="ziliaoxiugai.php" method="post" onsubmit=" return fun()">
	<hr class="xian">
	<div class="mui-input-row " id="dan" >
	<label>用户名：</label>
	<input type="text" name="yonghuming" class="mui-input-clear " id="1" placeholder="<?php  echo $_SESSION['yonghuming'];?>">
</div>
	<div class="mui-input-row"  id="dan" >
	<label>性别：</label>
	<input type="text" name="xingbie" class="mui-input-clear" id="2" placeholder="">
</div>
	<div class="mui-input-row" id="dan">
	<label>年龄：</label>
	<input type="number" name="nianling" class="mui-input-clear" placeholder="" oninput="if(value>120)value=120">
	
</div>

	<div class="kuang2">
		<button type="submit" class="mui-btn mui-btn-primary an1" ">确认修改</button>
	</div>
	</form>
<div class="kuang">
<a href="yingyong.php"><button type="button" class="mui-btn mui-btn-danger an1">返回</button></a>
</div>
</div>
	</body>
	<script src="js/mui.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		function fun(){
			var x =document.getElementById("1").value.length;
			if(x<2||x>8){
				alert("用户名修改格式错误(请输入2-8个字符)!");
				return false;
			}
			var pa=document.getElementById("2").value;
			if(pa!="男"&&pa!="女"&&pa!="未知"){
				alert("请输入“男”，“女”或“未知”");
				return false;
			}
			window.location.href="yingyong.php";
			
			return true;
		}
	</script>
</html>
