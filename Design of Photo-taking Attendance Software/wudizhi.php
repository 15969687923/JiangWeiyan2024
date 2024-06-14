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
		$q = $_GET["y"];
		// 检测连接
		if ($conn->connect_error) {
    	echo "连接失败！";
		exit(0);
		}
		else{
			$sql = "select name,xiangmuhao,kaishi,jieshu,miaoshu,tushu from xiangmujl where xiangmuhao = '$q'";
			$sql2 = "select tupian1,tupian2,tupian3,tupian4,tupian5 from xiangmucy where xiangmuhao = '$q' and shoujihao = '$_SESSION[dianhuahao]'";
			$sql3 = "select * from xiangmujl where  xiangmuhao = '9939'";
			$x = $conn->query($sql);
			$x2 = $conn->query($sql2);
			$x3 = $conn->query($sql3);
			$row = $x->fetch_assoc();
			$row2 = $x2->fetch_assoc();
			$row3 = $x3->fetch_assoc();
		}
?>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<!--标准mui.css-->
		<link rel="stylesheet" href="css/mui.min.css">
			<script src="js/jquery-3.4.1.min.js"></script>
	<style type="text/css">
		#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
		.zhengti{
					position:relative;
					top:7px;
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
			
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=fnePbyYOZSPzcfXzITDtXIxsaFPGtyIq"></script>
	<title>单击获取点击的经纬度</title>
	<script>
		
		(function tishi(){
			alert("请按目标图片顺序提交图片否则将匹配失败！")
		}());
	</script>
</head>
<body>
	<header class='mui-bar mui-bar-nav mui-bar-transparent biaoti1' >
				<h1 class='mui-title biaoti2'><?php  echo $row['name'];?>   ID:<?php  echo $row['xiangmuhao'];?></h1>
				<a href='yingyong.php'><span class='mui-icon mui-icon-left-nav'></span></a>
   				</header>
	<div>
		<form class="mui-input-group" action="baocun.php" method="post">
			<input type="hidden" value="<?php  echo $q;?>" name="chuan">
				
		    <div class="mui-input-row">
		        <h4 style="margin-left: 30%;float: left;" id="xmname">项目名称:<?php  echo $row['name'];?></h3>
		        <p style="float: left;">&nbsp;&nbsp;&nbsp;&nbsp;</p>
		        <h3 style="margin-top: 15px;float: left;" id="xmid">项目编号:<?php  echo $row['xiangmuhao'];?></h5>
		    </div>
		    
<div class='mui-input-row'>
		        <label>开始时间</label>
		        <input type='datetime-local' readonly value='<?php  echo $row['kaishi'];?>' id='starttime' />
		   </div>
		    <div class='mui-input-row'>
		        <label>截止时间</label>
		        <input type='datetime-local' readonly value='<?php  echo $row['jieshu'];?>' id='endtime'/>
		    </div>
		    <div class='mui-input-row'>
		        <label>项目介绍</label>
		        <input type='text' readonly value='<?php  echo $row['miaoshu'];?>' />
		    </div>
		
		   
		    <!--<div id="tupian">
		    	<div class="mui-input-row" style="height: 30%;">
			    	<label>目标图片
			    	<button type="button" class="mui-btn mui-btn-primary" style="float: left; width: 6em;" onclick="paizhao()">拍照</button>
			    	</label>
			    	
			    	<img src="1.jpg" style="height: 90%;width: height;"/>
			    </div>
			    
		    </div>-->
		    
		    <div class="zhengti">
		    	<div class="mui-card">
				<div class="mui-card-content">
				<div class="mui-card-content-inner canyu">
			参与者
				</div>
				</div>
				</div>
		    	<div id="tupian">
		    	<div class="mui-input-row" style="height: 30%;">
			    	<label>提交图片
			    	<input type="file" id='image1' accept="image/*" capture='camera' onclick="paizhao1()">
			    	</label>
			    	<!--<button type="button" class="mui-btn mui-btn-primary" style="float: left;">蓝色</button>
		    	<!--<img name="mu" src="1.jpg" style="height: 90%;width: height;" id="img1"/>-->
			    <!--</div>-->
			    
		    </div>
		    </div>
		    <div class="mui-button-row" >
		        <button type="submit" class="mui-btn mui-btn-primary" style="width: 40%;" onmousedown="caonima();">保存</button>
		        <button type="button" class="mui-btn mui-btn-danger" style="width: 40%;"  onclick="chongzhi()">重置</button>
		    </div>
		    <div class="mui-button-row">
		        <button type="button" class="mui-btn mui-btn-primary" style="width: 40%;" onclick="">提交</button>
		        <button type="button" class="mui-btn mui-btn-danger" style="width: 40%;"  onclick="window.location.href='tuichuxiangmu.php?x=<?php  echo $_GET['y'];?>'">退出项目</button>
		    </div>
		    </div>
		</form>
	</div>


<script type="text/javascript">
	var i = "<?php  echo $row['tushu'];?>";
	var t1 = "<?php  echo $row2['tupian1'];?>";
	var t2 = "<?php  echo $row2['tupian2'];?>";
	var t3 = "<?php  echo $row2['tupian3'];?>";
	var t4 = "<?php  echo $row2['tupian4'];?>";
	var t5 = "<?php  echo $row2['tupian5'];?>";
	var tj = "<?php  echo $row3['tupian1'];?>";
//	(function aaaaa(){
//		alert(i);
//	}());
	(function tushu(){
//			var i = window.location.search;
//			i = Number(decodeURI(i.substr(1).split('&')[0]))+1;
//			alert(t1);
			i = "<?php  echo $row['tushu'];?>";
			
			i = parseInt(i)+1;
//			alert(i);
			if(i==2){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				        + "<input type=hidden name=\"mu" + k + "\" id=\"mu" + k + "\">"
				        + "</div>";;
				        
				}
				document.getElementById("tupian").innerHTML=x;
				document.getElementById("img1").src = t1;
			}
			if(i==3){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				        + "<input type=hidden name=\"mu" + k + "\" id=\"mu" + k + "\">"
				        + "</div>";;
				        
				}
				document.getElementById("tupian").innerHTML=x;
				document.getElementById("img1").src = t1;
				document.getElementById("img2").src = t2;
			}
			if(i==4){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				       + "<input type=hidden name=\"mu" + k + "\" id=\"mu" + k + "\">"
				        + "</div>";;
				       
				}
				document.getElementById("tupian").innerHTML=x;
				document.getElementById("img1").src = t1;
				document.getElementById("img2").src = t2;
				document.getElementById("img3").src = t3;
			}
			if(i==5){
				var x="";
				for (k=1;k<i;k++) {

					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				          + "<input type=hidden name=\"mu" + k + "\" id=\"mu" + k + "\">"
				        + "</div>";;
				       
				}
				document.getElementById("tupian").innerHTML=x;
				document.getElementById("img1").src = t1;
				document.getElementById("img2").src = t2;
				document.getElementById("img3").src = t3;
				document.getElementById("img4").src = t4;
			}
			if(i==6){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				          + "<input type=hidden name=\"mu" + k + "\" id=\"mu" + k + "\">"
				        + "</div>";;
				        
				}
				document.getElementById("tupian").innerHTML=x;
				document.getElementById("img1").src = t1;
				document.getElementById("img2").src = t2;
				document.getElementById("img3").src = t3;
				document.getElementById("img4").src = t4;
				document.getElementById("img5").src = t5;
			}
			if(i==7){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"1.jpg\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				        + "</div>";;
				}
				document.getElementById("tupian").innerHTML=x;
			}
			if(i==8){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"1.jpg\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				        + "</div>";;
				}
				document.getElementById("tupian").innerHTML=x;
			}
			if(i==9){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"1.jpg\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				        + "</div>";;
				}
				document.getElementById("tupian").innerHTML=x;
			}
			if(i==10){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"1.jpg\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				        + "</div>";;
				}
				document.getElementById("tupian").innerHTML=x;
			}
			if(i==11){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"1.jpg\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				        + "</div>";;
				}
				document.getElementById("tupian").innerHTML=x;
			}
			if(i==12){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"1.jpg\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				        + "</div>";;
				}
				document.getElementById("tupian").innerHTML=x;
			}
			if(i==13){
				var x="";
				for (k=1;k<i;k++) {
					x=x+"<div class=\"mui-input-row\" style=\"height: 30%;\">"
						+ "<label>提交图片" + k
						+ "<button id=\"xupload" + k + "\" type=\"button\" class=\"mui-btn-primary mui-btn-outlined\" style=\"width: 6em;\" onclick=\"paizhao" + k + "()\">拍照</button>"
						+ "<button id=\"upload" + k + "\" type=\"button\" style=\"display:none;\">拍照</button>"
						+ "<input style=\"display: none;\" type=\"file\" id=\'image" + k + "\' accept=\"image/*\" capture=\'camera\'>"
				    	+ "</label>"
				    	+ "<img src=\"1.jpg\" style=\"height: 90%;width: height;\" id=\"img" +k+ "\"/>"
				        + "</div>";;
				}
				document.getElementById("tupian").innerHTML=x;
			}

		}());
		
		function paizhao1(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image1");
			var img = document.getElementById("img1");
				$('#upload1').click();
				var inputBox = document.getElementById("image1");
				var img = document.getElementById("img1");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
		}
		function paizhao2(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image2");
			var img = document.getElementById("img2");
			var imgq = document.getElementById("img1");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload2').click();
				var inputBox = document.getElementById("image2");
				var img = document.getElementById("img2");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
		function paizhao3(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image3");
			var img = document.getElementById("img3");
			var imgq = document.getElementById("img2");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload3').click();
				var inputBox = document.getElementById("image3");
				var img = document.getElementById("img3");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
		function paizhao4(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image4");
			var img = document.getElementById("img4");
			var imgq = document.getElementById("img3");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload4').click();
				var inputBox = document.getElementById("image4");
				var img = document.getElementById("img4");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
		function paizhao5(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image5");
			var img = document.getElementById("img5");
			var imgq = document.getElementById("img4");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload5').click();
				var inputBox = document.getElementById("image5");
				var img = document.getElementById("img5");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
		function paizhao6(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image6");
			var img = document.getElementById("img6");
			var imgq = document.getElementById("img5");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload6').click();
				var inputBox = document.getElementById("image6");
				var img = document.getElementById("img6");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
		function paizhao7(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image7");
			var img = document.getElementById("img7");
			var imgq = document.getElementById("img6");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload7').click();
				var inputBox = document.getElementById("image7");
				var img = document.getElementById("img7");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
		function paizhao8(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image8");
			var img = document.getElementById("img8");
			var imgq = document.getElementById("img7");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload8').click();
				var inputBox = document.getElementById("image8");
				var img = document.getElementById("img8");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
		function paizhao9(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image9");
			var img = document.getElementById("img9");
			var imgq = document.getElementById("img8");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload9').click();
				var inputBox = document.getElementById("image9");
				var img = document.getElementById("img9");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
		function paizhao10(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image10");
			var img = document.getElementById("img10");
			var imgq = document.getElementById("img9");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload10').click();
				var inputBox = document.getElementById("image10");
				var img = document.getElementById("img10");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
		function paizhao11(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image11");
			var img = document.getElementById("img11");
			var imgq = document.getElementById("img10");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload11').click();
				var inputBox = document.getElementById("image11");
				var img = document.getElementById("img11");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
		function paizhao12(){
//			var i=Number(document.getElementById('tushu').value);
			var inputBox = document.getElementById("image12");
			var img = document.getElementById("img12");
			var imgq = document.getElementById("img11");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else{
				$('#upload12').click();
				var inputBox = document.getElementById("image12");
				var img = document.getElementById("img12");
				inputBox.addEventListener("change",function(){
				  var reader = new FileReader();
				  reader.readAsDataURL(inputBox.files[0]);//发起异步请求
				  reader.onload = function(){
				    //读取完成后，将结果赋值给img的src
				    img.src = this.result
				  }
				})
			}
		}
	
	function chongzhi(){
		location.replace(location.href);
	}
	function chongzhimap(){
		location.replace(location.href);
		document.getElementById("mymap").style.height="60%";
	}
	
	function caonima(){
//				var i = window.location.search;
//				i = Number(decodeURI(i.substr(1).split('&')[0]))+1;
				for(k=1;k<i;k++){
				var t = document.getElementById("img"+k).src;		
				document.getElementById("mu"+k).value = String(t);
				
			}
		}
		$(document).ready(function(){
		   $('#upload1').click(function(){ 
		       $('#image1').click()
		   });
		   $('#upload2').click(function(){ 
		       $('#image2').click()
		   });
		   $('#upload3').click(function(){ 
		       $('#image3').click()
		   });
		   $('#upload4').click(function(){ 
		       $('#image4').click()
		   });
		   $('#upload5').click(function(){ 
		       $('#image5').click()
		   });
		   $('#upload6').click(function(){ 
		       $('#image6').click()
		   });
		   $('#upload7').click(function(){ 
		       $('#image7').click()
		   });
		   $('#upload8').click(function(){ 
		       $('#image8').click()
		   });
		   $('#upload9').click(function(){ 
		       $('#image9').click()
		   });
		   $('#upload10').click(function(){ 
		       $('#image10').click()
		   });
		   $('#upload11').click(function(){ 
		       $('#image11').click()
		   });
		   $('#upload12').click(function(){ 
		       $('#image12').click()
		   });
		});
//	var x="<div class=\"mui-input-row\" style=\"height: 30%;\">"
//					+ "<label>目标图片" + "i"
//			    	+ "<button type=\"button\" class=\"mui-btn mui-btn-primary\" style=\"float: left; width: 6em;\" >拍照</button>"
//			    	+ "</label>"
//			    	+ "<img src=\"1.jpg\" style=\"height: 90%;width: height;\"/>"
//			        + "</div>";
//	for (k=2;k<i;k++) {
//		x=x+x;
//	}
//	document.getElementById("tupian").innerHTML=x;
//	function paizhao(){
//		//alert(i);
//		i=i-1;
//		window.open("paiyizu.html?"+i);
//	}
//	
</script>
</body>
</html>
