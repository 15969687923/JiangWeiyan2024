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
			$sql = "select name,xiangmuhao,kaishi,jieshu,miaoshu,tushu,jing1,jing2,jing3,jing4,jing5,wei1,wei2,wei3,wei4,wei5 from xiangmujl where xiangmuhao = '$q'";
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
			.di{
				position:relative;
					top:38px;
			}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=fnePbyYOZSPzcfXzITDtXIxsaFPGtyIq"></script>
	<title>单击获取点击的经纬度</title>
	<script>
		(function tishi(){
			alert("若您的位置不准确请打开GPS并点击地图左下角定位按钮重试！\n请按定位点相应目标图片顺序提交图片否则将匹配失败！")
		}());
		
	</script>
</head>
<body>
	<header class='mui-bar mui-bar-nav mui-bar-transparent biaoti1' >
				<h1 class='mui-title biaoti2'><?php  echo $row['name'];?>   ID:<?php  echo $row['xiangmuhao'];?></h1>
				<a href='yingyong.php'><span class='mui-icon mui-icon-left-nav'></span></a>
   				</header>
   	<div class="di">
	<div style="height: 60%;" id="mymap"> 
		<div id="allmap"></div>
	</div>
	</div>
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
				图片提交
				</div>
				</div>
				</div>
		    	<div id="tupian">
		    	<div class="mui-input-row" style="height: 30%;">
			    	<label>提交图片
			    	<button id="upload" type="button" class="mui-btn-primary mui-btn-outlined" style="width: 6em;">拍照</button>
			    	<input type="file" id='image1' accept="image/*" capture='camera' onclick="paizhao1()">
			    	</label>
			    	<!--<button type="button" class="mui-btn mui-btn-primary" style="float: left;">蓝色</button>-->
		    	<img name="mu" src="1.jpg" style="height: 90%;width: height;" id="img1"/>
			    </div>
			    
		    </div>
		    </div>
		    <div class="mui-button-row">
		        <button type="submit" class="mui-btn mui-btn-primary" style="width: 40%;" onmousedown="caonima();" >保存</button>
		        <button type="button" class="mui-btn mui-btn-danger" style="width: 40%;"  onclick="chongzhi()">重置</button>
		    </div>
		    <div class="mui-button-row">
		        <button type="button" class="mui-btn mui-btn-primary" style="width: 40%;" onclick="">提交</button>
		        <button type="button" class="mui-btn mui-btn-danger" style="width: 40%;" onclick="window.location.href='tuichuxiangmu.php?x=<?php  echo $_GET['y'];?>'">退出项目</button>
		    </div>
		</form>
	</div>


<script type="text/javascript">
	var xj,xw;
	
		// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(116.968749,36.615657);//初始位置
	map.centerAndZoom(point,18);
	var navigationControl = new BMap.NavigationControl({
	    // 靠左上角位置
	    anchor: BMAP_ANCHOR_TOP_LEFT,
	    // LARGE类型
	    type: BMAP_NAVIGATION_CONTROL_ZOOM,
	    // 启用显示定位
	    enableGeolocation: true
	});
	map.addControl(navigationControl);
	
	  // 添加定位控件
	var geolocationControl = new BMap.GeolocationControl();
	geolocationControl.addEventListener("locationSuccess", function(e){
	    // 定位成功事件	    
	    var mk = new BMap.Marker(e.point);
		map.addOverlay(mk);
		map.panTo(e.point);
		alert('您的位置：'+e.point.lng+','+e.point.lat);	
//		var obj1 = document.getElementById("pj");
//		obj1.innerText= e.point.lng.toPrecision(10);//保留十位有效数字
		xj=e.point.lng.toPrecision(10);
		//alert(xj);
//		var obj2 = document.getElementById("pw");
//		obj2.innerText= e.point.lat.toPrecision(10);
		xw=e.point.lat.toPrecision(10);
		
	});
	geolocationControl.addEventListener("locationError",function(e){
	   	// 定位失败事件
	    alert(e.message);
	});
	map.addControl(geolocationControl);
	
	var geolocation = new BMap.Geolocation();
	geolocation.getCurrentPosition(function(r){
		if(this.getStatus() == BMAP_STATUS_SUCCESS){
			var mk = new BMap.Marker(r.point);
			map.addOverlay(mk);
			map.panTo(r.point);
			//alert('您的位置：'+r.point.lng+','+r.point.lat);
			
//			var obj1 = document.getElementById("pj");
//			obj1.innerText= r.point.lng.toPrecision(10);
			xj=r.point.lng.toPrecision(10);
			//alert(xj);
//			var obj2 = document.getElementById("pw");
//			obj2.innerText= r.point.lat.toPrecision(10);
			xw=r.point.lat.toPrecision(10);
		}
		else {
			alert('failed'+this.getStatus());
		}        
	},{enableHighAccuracy: true})
	
	var i = "<?php  echo $row['tushu'];?>";
	var t1 = "<?php  echo $row2['tupian1'];?>";
	var t2 = "<?php  echo $row2['tupian2'];?>";
	var t3 = "<?php  echo $row2['tupian3'];?>";
	var t4 = "<?php  echo $row2['tupian4'];?>";
	var t5 = "<?php  echo $row2['tupian5'];?>";
	var tj = "<?php  echo $row3['tupian1'];?>";
	var mkpoint=[15];
	for (i=1;i<=15;i++) {
		mkpoint[i]= new BMap.Point();
	}
	var jing=[15];
	var wei=[15];
	jing[1] = "<?php  echo $row['jing1'];?>";
	jing[2] = "<?php  echo $row['jing2'];?>";
	jing[3] = "<?php  echo $row['jing3'];?>";
	jing[4] = "<?php  echo $row['jing4'];?>";
	jing[5] = "<?php  echo $row['jing5'];?>";
	wei[1] = "<?php  echo $row['wei1'];?>";
	wei[2] = "<?php  echo $row['wei2'];?>";
	wei[3] = "<?php  echo $row['wei3'];?>";
	wei[4] = "<?php  echo $row['wei4'];?>";
	wei[5] = "<?php  echo $row['wei5'];?>";
//	alert(wei[1]);
	(function xianlu(){	
		mkpoint[1].lng=parseFloat(jing[1]);
		mkpoint[2].lng=parseFloat(jing[2]);
		mkpoint[3].lng=parseFloat(jing[3]);
		mkpoint[4].lng=parseFloat(jing[4]);
		mkpoint[5].lng=parseFloat(jing[5]);
		mkpoint[6].lng=parseFloat(jing[6]);
		mkpoint[7].lng=parseFloat(jing[7]);
		mkpoint[8].lng=parseFloat(jing[8]);
		mkpoint[9].lng=parseFloat(jing[9]);
		mkpoint[10].lng=parseFloat(jing[10]);
		mkpoint[11].lng=parseFloat(jing[11]);
		mkpoint[12].lng=parseFloat(jing[12]);
		
//		alert(wei[1]);
		mkpoint[1].lat=parseFloat(wei[1]);
		mkpoint[2].lat=parseFloat(wei[2]);
		mkpoint[3].lat=parseFloat(wei[3]);
		mkpoint[4].lat=parseFloat(wei[4]);
		mkpoint[5].lat=parseFloat(wei[5]);
		mkpoint[6].lat=parseFloat(wei[6]);
		mkpoint[7].lat=parseFloat(wei[7]);
		mkpoint[8].lat=parseFloat(wei[8]);
		mkpoint[9].lat=parseFloat(wei[9]);
		mkpoint[10].lat=parseFloat(wei[10]);
		mkpoint[11].lat=parseFloat(wei[11]);
		mkpoint[12].lat=parseFloat(wei[12]);
//		alert(mkpoint[1].lng);
		var p1 = new BMap.Point(mkpoint[1].lng,mkpoint[1].lat);
		var p2 = new BMap.Point(mkpoint[2].lng,mkpoint[2].lat);
		var p3 = new BMap.Point(mkpoint[3].lng,mkpoint[3].lat);
		var p4 = new BMap.Point(mkpoint[4].lng,mkpoint[4].lat);
		var p5 = new BMap.Point(mkpoint[5].lng,mkpoint[5].lat);
		var p6 = new BMap.Point(mkpoint[6].lng,mkpoint[6].lat);
		var p7 = new BMap.Point(mkpoint[7].lng,mkpoint[7].lat);
		var p8 = new BMap.Point(mkpoint[8].lng,mkpoint[8].lat);
		var p9 = new BMap.Point(mkpoint[9].lng,mkpoint[9].lat);
		var p10 = new BMap.Point(mkpoint[10].lng,mkpoint[10].lat);
		var p11 = new BMap.Point(mkpoint[11].lng,mkpoint[11].lat);
		var p12 = new BMap.Point(mkpoint[12].lng,mkpoint[12].lat);
		
		i = "<?php  echo $row['tushu'];?>";
		i = parseInt(i)+1;
		if(i==2){
			var mk = new BMap.Marker(mkpoint[1]);
			map.addOverlay(mk);
			map.panTo(mkpoint[1]);
			
		}
		if(i==3){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, panel: "r-result", autoViewport: true}});
			driving.search(p1, p2);//waypoints表示途经点
			
		}
		if(i==4){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, panel: "r-result", autoViewport: true}});
			driving.search(p1, p3,{waypoints:[p2]});//waypoints表示途经点
			
		}
		if(i==5){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, panel: "r-result", autoViewport: true}});
			driving.search(p1, p4,{waypoints:[p2,p3]});//waypoints表示途经点
			
		}
		if(i==6){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, panel: "r-result", autoViewport: true}});
			driving.search(p1, p5,{waypoints:[p2,p3,p4]});//waypoints表示途经点
			
		}
		if(i==7){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});
			driving.search(p1, p6,{waypoints:[p2,p3,p4,p5]});//waypoints表示途经点
			
		}
		if(i==8){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});
			driving.search(p1, p7,{waypoints:[p2,p3,p4,p5,p6]});//waypoints表示途经点
			
		}
		if(i==9){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});
			driving.search(p1, p8,{waypoints:[p2,p3,p4,p5,p6,p7]});//waypoints表示途经点
			
		}
		if(i==10){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});
			driving.search(p1, p9,{waypoints:[p2,p3,p4,p5,p6,p7,p8]});//waypoints表示途经点
			
		}
		if(i==11){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});
			driving.search(p1, p10,{waypoints:[p2,p3,p4,p5,p6,p7,p8,p9]});//waypoints表示途经点
			
		}
		if(i==12){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});
			driving.search(p1, p11,{waypoints:[p2,p3,p4,p5,p6,p7,p8,p9,p10]});//waypoints表示途经点
			
		}
		if(i==13){
			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});
			driving.search(p1, p12,{waypoints:[p2,p3,p4,p5,p6,p7,p8,p9,p10,p11]});//waypoints表示途经点
			
		}
	}());
	
	(function tushu(){
			i = "<?php  echo $row['tushu'];?>";
			i = parseInt(i)+1;
			//alert(i);
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
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[1].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[1].lat)-parseFloat(xw));//0.001
			if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao2(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[2].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[2].lat)-parseFloat(xw));//0.001
			var imgq = document.getElementById("img1");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao3(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[3].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[3].lat)-parseFloat(xw));//0.001
			var imgq = document.getElementById("img2");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao4(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[4].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[4].lat)-parseFloat(xw));//0.001
			var imgq = document.getElementById("img3");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao5(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[5].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[5].lat)-parseFloat(xw));//0.001\
			var imgq = document.getElementById("img4");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao6(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[6].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[6].lat)-parseFloat(xw));//0.001
			var imgq = document.getElementById("img5");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao7(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[7].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[7].lat)-parseFloat(xw));//0.001
			var imgq = document.getElementById("img6");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao8(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[8].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[8].lat)-parseFloat(xw));//0.001
			var imgq = document.getElementById("img7");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao9(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[9].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[9].lat)-parseFloat(xw));//0.001
			var imgq = document.getElementById("img8");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao10(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[10].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[10].lat)-parseFloat(xw));//0.001
			var imgq = document.getElementById("img9");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao11(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[11].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[11].lat)-parseFloat(xw));//0.001
			var imgq = document.getElementById("img10");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
			}
		}
		function paizhao12(){
			var jc,wc; 
			jc=Math.abs(parseFloat(mkpoint[12].lng)-parseFloat(xj));//0.001	
			wc=Math.abs(parseFloat(mkpoint[12].lat)-parseFloat(xw));//0.001
			var imgq = document.getElementById("img11");
			if (imgq.src==tj) {
				alert("您还没有上传上一张照片，请按顺序拍照！")
			}
			else if(parseFloat(jc)<0.001 && parseFloat(wc)<0.001){
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
			else{
				alert("您距离目标点过远，请靠近目标点或重新定位后重试！")
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