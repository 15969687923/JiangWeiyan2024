<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>SX</title>
		    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		    <script src="js/mui.min.js"></script>
		    <script src="js/mui.js"></script>
		    <script src="js/jquery-3.4.1.min.js"></script>
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
            
            if($_SESSION["panduan"] == 0){
            $_SESSION["kaishi"] = "2019-07-31 14:00:00";
			$_SESSION["name"] = "标准";
			$_SESSION["tupian1"] = "3.jpg";
			$_SESSION["touxiang2"] = "2.jpg";
			$_SESSION["miaoshu"] = "标准";
			$_SESSION["jiaru"] = "9999";
			}
			?>
		    <link href="css/mui.min.css" rel="stylesheet"/>
		    <script type="text/javascript" charset="utf-8">
		      	mui.init({  
                	swipeBack:true //启用右滑关闭功能  
            	});  
            	
				var gallery = mui('.mui-slider');
				gallery.slider({
				  interval:1000//自动轮播周期，若为0则不自动播放，默认为0；
				}); 
				 </script>
				

	
		   
		    <style>
		    	body{
		    		height: 100%;
		    		width: 100%;
		    	}
		    	.juzhong{
					text-align: center;
				}
				button{
					height: 70px;
					width: 40%;
					margin-left: 5%;
					margin-right: 5%;
					margin-top: 20px;
					font-size: 20px;
					float: left;
				}
				.zhengti1{
					position:relative;
					top:46px;
				}
				.biao11{
					background:#09C5F7;
				}
				.biao12{
					color:white;
				}
				.ye{
					color:white;
				}
				.zhengti3{
					position:relative;
					top:45px;
				}
				.biao31{
					background:#09C5F7;

					margin:0px;
					padding:0px;
				}
				.zhengti2{
					position:relative;
					top:55px;
					
				}
				.biao21{
					background:#09C5F7;
				}
				.biao22{
					color:white;
				}
				.jingtai{
					display: none;
				}
				#page2{
					height: 50%;
				}
				.tu{
					width: 200px;
					height:200px;
					margin-top: 30px;
					margin-bottom: 30px;
					margin-left: 80px;
				}
				.wenzi{
					width:24em;
				}
				.an3{
					width:330px;
					height:45px;
				}
				.an3wei{
					text-align: center;
				}
				.yanchang{
					margin-bottom:300px;
				}
			</style>
		</head>
		<body>


		<div class="mui-content">
			<div id="page3" class="mui-control-content ">
				<header class="mui-bar mui-bar-nav mui-bar-transparent biao11">
					<h1 class="mui-title biao12">图签</h1>
					
				</header>
				<div class="zhengti1">
					<div class="mui-content">
						<div id="slider" class="mui-slider">
							<div class="mui-slider-group mui-slider-loop" style="height: 200px">
								<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
								<div class="mui-slider-item mui-slider-item-duplicate">
									<a href="#">
										<img src="4.jpg">
										<p class="mui-slider-title">我说所有的酒 都不如你</p>
									</a>
								</div>
								<div class="mui-slider-item">
									<a href="#">
										<img src="1.jpg">
										<p class="mui-slider-title">我在二环路的里边 想着你</p>
									</a>
								</div>
								<div class="mui-slider-item">
									<a href="#">
										<img src="2.jpg">
										<p class="mui-slider-title">你在远方的山上 春风十里</p>
									</a>
								</div>
								<div class="mui-slider-item">
									<a href="#">
										<img src="3.jpg">
										<p class="mui-slider-title">今天的风吹向你 下了雨</p>
									</a>
								</div>
								<div class="mui-slider-item">
									<a href="#">
										<img src="4.jpg">
										<p class="mui-slider-title">我说所有的酒 都不如你</p>
									</a>
								</div>
								<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
								<div class="mui-slider-item mui-slider-item-duplicate">
									<a href="#">
										<img src="1.jpg">
										<p class="mui-slider-title">我在二环路的里边 想着你</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<a href="dantuqiandao.html"><button type="button" data-loading-icon="mui-spinner mui-spinner-custom" class="mui-btn mui-btn-primary" style="font-size: 25px;">单图签到</button></a> 
					<a href="zutudaka.html"><button type="button" data-loading-icon="mui-spinner mui-spinner-custom" class="mui-btn mui-btn-success" style="font-size: 25px;">组图打卡</button></a>
					<a href="duotushibie.html"><button type="button" data-loading-icon="mui-spinner mui-spinner-custom" class="mui-btn mui-btn-danger" style="font-size: 25px;">多图识别</button></a>
					<a href="zizhudingyi.html"><button type="button" data-loading-icon="mui-spinner mui-spinner-custom" class="mui-btn mui-btn-warning" style="font-size: 25px;">自主定义</button></a>
				</div>
			</div>



		
			<div id="page2" name="tiao2" class="mui-control-content">
				<span id="tiao"></span>
				<header class="mui-bar mui-bar-nav mui-bar-transparent biao21">
					<h1 class="mui-title biao22">搜索</h1>
				</header>
				<div class="zhengti2">
					<form action="sousuo.php" method="post">
					<div class="mui-input-row mui-search ">
						<input type="search"  name="sousuo" class="mui-input-clear sou" placeholder="请输入项目号">
					</div>
					</form>
					<div calss="dongtai">
						<div class="mui-card">
							<!--页眉，放置标题-->
							<div class="mui-card-header mui-card-media">
								<img  src=<?php  echo $_SESSION['touxiang2'];?> />
								<div class="mui-media-body">
									<?php  echo $_SESSION['name'];?>
									<p>发布时间<?php  echo $_SESSION['kaishi'];?></p>
								</div>
							</div>
							<!--内容区-->
							<div class="mui-card-content"><img class="tu" src=<?php  echo $_SESSION['tupian1'];?>></div>
							<!--页脚，放置补充信息或支持的操作-->
							<div class="mui-card-footer  "><p class="wenzi"><?php  echo $_SESSION['miaoshu'];?></p></div>
						</div>
						
					</div>
					<div class="yanchang">
					<form action="jiaru.php">
						<div class="anwei an3wei">
						<button type="submit" class="mui-btn mui-btn-primary an3" >加入项目</button>
						</div>
					</form>
					</div>
				</div>
			</div>






			<div id="page1" class="mui-control-content mui-active">
				<header class="mui-bar mui-bar-nav mui-bar-transparent biao31">
					<h1 class="mui-title ye">个人</h1>
				</header>
				<div class="zhengti3">

					<ul class="mui-table-view">
						<li class="mui-table-view-cell mui-media">
							<a href="javascript:;">
								<img class="mui-media-object mui-pull-left" src="<?php echo $_SESSION['touxiang'];?>">
								<div class="mui-media-body">
									<?php  echo $_SESSION['yonghuming'];?>
									<p class="mui-ellipsis"></p>
								</div>
							</a>
						</li>
					</ul>

					<ul class="mui-table-view">
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="gerenziliaoweb.php">
								个人信息
							</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="wode.php">
								我管理的项目
							</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="jiarudexiangmu.php">
								我加入的项目
							</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="gengduo.html">
								更多
							</a>
						</li>
						
					</ul>
				</div>
			</div>

		</div>


			<nav class="mui-bar mui-bar-tab">
				<a class="mui-tab-item mui-active" href="#page1">
					<span class="mui-icon mui-icon-contact"></span>
					<span class="mui-tab-label">主页</span>
				</a>
				<a class="mui-tab-item" href="#page2" id="fuzhu">
					<span class="mui-icon mui-icon-bars" id="fuzhu"></span>
					<span class="mui-tab-label" id="fuzhu">搜索</span>
				</a>
				<a class="mui-tab-item" href="#page3">
					<span class="mui-icon mui-icon-home"></span>
					<span class="mui-tab-label">功能</span>
				</a>
			</nav>
<script>
    //初始化URL参数
    function GetRequest() {
	var url = location.search; //获取url中"?"符后的字串
	var theRequest = new Object();
	if (url.indexOf("?") != -1) {
	var str = url.substr(1);
	strs = str.split("&");
	for(var i = 0; i < strs.length; i ++) {
	theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
			}
		}
	return theRequest;
	}
	(function caotama(){
	var Request = new Object();
	Request = GetRequest();
	var x = 0;
	x = Request['type'];
	
	if(x>0){
    	
    if (x != null) {
        var tabIndex = x;
    } else {
        var tabIndex = 0;
    }
    if(tabIndex == 1) {
    	//显示指定的tab内容
	    $('.mui-control-content').eq(1).addClass('mui-active').siblings().removeClass('mui-active');
	    //tab选项卡高亮
	    $('.mui-tab-item').eq(x).addClass('mui-active').siblings().removeClass('mui-active');
    }
    else if(tabIndex == 2){
    	//显示指定的tab内容
	    $('.mui-control-content').eq(0).addClass('mui-active').siblings().removeClass('mui-active');
	    //tab选项卡高亮
	    $('.mui-tab-item').eq(x).addClass('mui-active').siblings().removeClass('mui-active');
    }
    }
    
    }());
    
    
    
	</script>
		</body>
	</html>
	
<!--该页面生成由SX html5全栈编辑器制作。全中文专业级编辑器、可开发微信、支付宝、百度小程序，安卓、IOS APP、响应式网站、PHP、软件界面UI等！-->