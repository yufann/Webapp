<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>项目管理</title>
		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/loading.css">
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<!-- <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" /> -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/other.css">
		<script type="text/javascript" src="assets/js/hammer.min.js"></script>
		<script type="text/javascript" src="assets/js/iscroll.js"></script>
		<script type="text/javascript" >
			var myScroll;
			function loaded () {
				myScroll = new IScroll('#wrapper', { mouseWheel: true });
			}
			document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
		</script>

		<style type="text/css">
			#wrapper{
				margin-top: 45px !important;
			}
			.widget-box{
				margin: 0 !important;
				box-shadow: 2px 2px 3px #ccc;
			}
			.session{
				margin: 0;
			}
			.session li{
				padding: 5px 5px;
				border-bottom: 1px solid #ccc;
				margin-right: 13px;
			}
			.session li.last{
				border: 0px;
			}
			.user{
				width: 40%;
				height: 30px;
				text-align: left;
				line-height: 30px;
			}
		</style>
	</head>
	<body class="no-skin" style="font-family: 'Microsoft Yahei'" onload="loaded()">
		<div id="navbar" class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-container" id="navbar-container">
				<a class="back">
					<img src="assets/img/back.png" alt="" style="width: 1rem">
				</a>
				<script type="text/javascript">
					var ass = document.getElementsByTagName('a');
					for(var i = 0;i < ass.length;i ++){
						if(ass[i].getAttribute('class') == 'back'){
							var hammertime = new Hammer(ass[i]);
		          hammertime.on("tap", function (ev) {
		              	window.location='index.php';
		          });
						}
					}
				</script>
				<div class="title">更多</div>
			</div>
		</div>

		<div id="main-container" class="main-container">
			<div class="main-content">
				<div id="wrapper">
					<div id="scroller">
						<div class="widget-box">
							<div class="widget-header widget-header-flat">
								<h5 style="text-align:center;font-weight: bold;">扫描二维码下载 </h5>
							</div>
							<div class="widget-body">
								<ul class="session" style="text-align:center">
									 <img src="assets/img/ewm.png?af" alt=""  height="240">
								</ul>
							</div>
						</div>
						<div class="space-14"></div>
						<div class="clearfix">
							<a href="logout.php">
								<button type="button" class="col-xs-5 pull-left btn btn-sm btn-info" style="border-radius: 5px !important;margin-left: 5px;">
							退出登录
							<!-- <span class="bigger-110"></span> -->
								</button>
							</a>
							<a href="query.php">
								<button type="button" class="col-xs-5 pull-right btn btn-sm btn-info" style="border-radius: 5px !important;margin-right: 5px; ">项目查询
								<!-- <span class="bigger-110"></span> -->
								</button>
							</a>
						</div>
					</div>
				</div>
		  </div>
		</div>

		<?include_once("footer.php");?>
		<style type="text/css">
			.more {
				color: #438EB9 !important;
			}
		</style>
		<!-- /.main-container -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("&lt;script src='assets/js/jquery.min.js'&gt;"+"&lt;"+"/script&gt;");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("&lt;script src='assets/js/jquery.mobile.custom.min.js'&gt;"+"&lt;"+"/script&gt;");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/app.js"></script>	
		<script src="assets/js/jquery.hammer.js" type="text/javascript"></script>


</body>
</html>
