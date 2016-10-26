<?
include("config/config.php");
 if(@$auth!='login'){
	Header('Location:login.php');
	exit;
 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>项目管理</title>
		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/other.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<!-- <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" /> -->
		<!-- <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" /> -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script type="text/javascript" src="assets/js/iscroll.js"></script>
		<script type="text/javascript" >
			var myScroll;
			function loaded () {
				myScroll = new IScroll('#wrapper', { mouseWheel: true });
			}
			document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
		</script>
	</head>
	<body class="no-skin" onload="loaded()" style="font-family: 'Microsoft Yahei'">
		<div class="main-container" id="main-container">
			<div class="main-content">
				<div id="wrapper">
					<div id="scroller">
				    <div class="main-container-inner">
				    	<img src="assets/img/home.jpg" width="100%" class="home_img">
				    </div>
						<div class="main-container-inner syinner">
							<div class="row row1 col-xs-12 col-sm-12">
								<div class="col-xs-4 col-sm-4">
									<a class="link_to" href="look.php?jd=续建项目" id="test">
										<img src="assets/img/s1.png">
										<div>续建</div>
									</a>
								</div>
								<div class="col-xs-4 col-sm-4">
									<a class="link_to" href="look.php?jd=计划开工项目">
										<img src="assets/img/s3.png">
										<div>计划开工</div>
									</a>
								</div>
								<div class="col-xs-4 col-sm-4">
									<a class="link_to" href="look.php?jd=储备项目">
										<img src="assets/img/s5.png" class="img1">
										<div>储备</div>
									</a>
								</div>
							</div>
							<div class="row row2" style="padding: 0 12px">
								<div class="col-xs-4 col-sm-4">
									<a class="link_to" href="statist.php">
										<img src="assets/img/s2.png">
										<div>项目统计</div>
									</a>
								</div>
								<div class="col-xs-4 col-sm-4">
									<a class="link_to" href="query.php">
										<img src="assets/img/s4.png" class="img2">
										<div>项目查询</div>
									</a>
								</div>
								<div class="col-xs-4 col-sm-4">
									<a class="link_to" href="yue.php">
										<img src="assets/img/s6.png" class="img2">
										<div>月报</div>
									</a>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div><!-- /.main-content -->
		</div>
		<?include_once("footer.php");?>
		<style type="text/css">
			.shouye {
				color: #438EB9 !important;
			}
		</style>
		<!-- /.main-container -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script type="text/javascript" src="assets/js/hammer.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.hammer.js"></script>
		<script>
			$(function(){
				$('.link_to').hammer().on("tap", function(ev) {
	        var hrefs = $(this).attr('href');
	        window.open(hrefs,'_self');
	   		});
	   		hei();
	   		function hei() {
	   			var window_ht = $(window).height(),
	   			 window_wt = $(window).width(),
		   		 img = $('.home_img').height(),
		   		 foot = $('.footer-content').height(),
	   			 h1 =  ((window_wt-24)*0.3333-24)*0.76 + 28;
	   			var left_ht = (window_ht - img - foot - h1 - h1)/3;
	   			$('.row1').css({'height': h1,'margin-top': left_ht,'margin-bottom': left_ht});
	   			$('.row2').css('height',h1);
	   		}
			});
		</script>
	</body>
</html>