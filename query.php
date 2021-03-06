<?
error_reporting(0);
include_once ("config/config.php");
include_once ("config/dsql.php");
if(!isset($dsql)){
	$dsql = new DSQL();
}

?><!DOCTYPE html>
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
	</head>
	<body class="no-skin" style="font-family: 'Microsoft Yahei'" onload="loaded()">
		<div id="loader-wrapper" style="display: none;">
	    <div class="load_title">
				<div class="spinner">
				  <div class="rect1"></div>
				  <div class="rect2"></div>
				  <div class="rect3"></div>
				  <div class="rect4"></div>
				  <div class="rect5"></div>
				</div>
				加载中...
	    </div>
		</div>
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
				<div class="title">项目查询</div>
			</div>
		</div>

		<div id="main-container" class="main-container" style="padding-top: 41px;">
			<div class="main-content">
	      <div style="height: 41px;" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
				  <form style="margin-top: 11px;" role="form" class="search">
					  <div class="input-group">
							<input type="text" name="searchvalue" id="searchvalue"  placeholder="关键字" class="form-control input-mask-date" id="form-field-mask-1">
							<span class="input-group-btn">
								<button type="button"   class="btn btn-sm btn-info click_search">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</span>
						</div>
					</form>
			  	</div> 
				<div class="btmm">
					<div class="query">
						<div class="screening">
					       <ul style="border-left: 0;border-right: 0">
					           <li type="区域" style="border-left: 0" value="1" class="area">区域</li>
					           <li type="产业分类" value="2" class="kind">产业分类</li>
					           <li type="投资额" value="3" class="sum">投资额</li>
					           <li value="4" class="term">筛选</li>
					       </ul>
					  </div>
					  <div class="lock"></div>
					  <div class="lists" style="display: none;">
						  <div class="list_div1">
						  	<span>已选:</span>
								<ul class="list_1">
									<li></li>
									<li></li>
									<li></li>
								</ul>
						  </div>
							<div class="list_div2">
								<span>筛选:</span>
								<ul class="list_2">
								<li id="status"></li>
								<li id="type"></li>
								</ul>
							</div>
						</div>
					  <div class="querys">
					  	<div value="1" class="areas">
				       	<ul class="area_ul">
				       		<li><span value='all'>全部区域</span></li>
				          <?
						  $SQL = "SELECT  distinct(shenbaodanwei) as xianqu   FROM project    ";
							//echo $SQL . "\n"; 

							@$dsql->query($SQL);
							while($dsql->next_record()){
								 
								$xianqu = $dsql->f('xianqu');
								echo "<li><span value='all'>$xianqu</span></li>";
							}
						  ?>
				       	</ul> 
					  	</div>				 
						  <div value="2" class="kinds">
						       <ul class="kinds_ul">
						       	  <li><span>全部种类</span></li>
						          <?
						  $SQL = "SELECT  distinct(fenlei861) as fenlei861   FROM project     ";
							//echo $SQL . "\n"; 

							@$dsql->query($SQL);
							while($dsql->next_record()){
								 
								$fenlei861 = $dsql->f('fenlei861');
								echo "<li><span>$fenlei861</span></li>";
							}
						  ?>
						       </ul>
						  </div>
					  	<div value="3" class="sums sums_hei">
					       <ul class="sums_ul">
					       		<li><span>全部金额</span><span></span></li>
					          <li><span>1亿以下</span><span></span></li>
					          <li><span>1~10亿</span><span></span></li>
					          <li><span>10~100亿</span><span></span></li>
					          <li><span>100亿以上</span><span></span></li>
					       </ul>
					  	</div>
					  	<div value="4" class="terms">
					       <ul class="terms_ul">
					          <li class="status">项目状态
						          <ul style="float: right; width: 77%;" class="sec_ul">
												<li><span>在建</span> <!-- 在建 -->
													<label class="middle">
														<!-- <input type="checkbox" class="ace" id="id-disable-check"> -->
														<!-- <div class="lbl"></div> -->
														<input type="checkbox">
													</label>
												</li>
												<li><!-- <span>已竣工</span> -->已竣工
													<label class="middle">
														<!-- <input type="checkbox" class="ace" id="id-disable-check"> -->
														<!-- <div class="lbl"></div> -->
														<input type="checkbox">
													</label>
												</li>
												<li><!-- <span>已开工</span> -->已开工
													<label class="middle">
														<!-- <input type="checkbox" class="ace" id="id-disable-check"> -->
														<!-- <div class="lbl"></div> -->
														<input type="checkbox">

													</label>
												</li>
												<li><!-- <span>未开工</span> -->未开工
													<label class="middle">
														<!-- <input type="checkbox" class="ace" id="id-disable-check"> -->
														<!-- <div class="lbl"></div> -->
														<input type="checkbox">
 														
													</label>
												</li>
											</ul>
					          </li>
					          <li class="type">建设阶段
						          <ul style="float: right; width: 77%;" class="sec_ul">
												<li>续建
													<label class="middle">
														<!-- <input type="checkbox" class="ace" id="id-disable-check"> -->
														<!-- <div class="lbl"></div> -->
														<input type="checkbox">
													</label>
												</li>
												<li>储备
													<label class="middle">
														<!-- <input type="checkbox" class="ace" id="id-disable-check"> -->
														<!-- <div class="lbl"></div> -->
														<input type="checkbox">
													</label></li>
												<li>计划开工
													<label class="middle">
														<!-- <input type="checkbox" class="ace" id="id-disable-check"> -->
														<!-- <div class="lbl"></div> -->
														<input type="checkbox">
													</label></li>
											</ul>
					          </li>
					          <li style="height: 43px;">
					          	<button class="btn btn-info btn-sm click_aj" type="button" style="margin-top: 3px; margin-left: 77%;">确认</button>
					          </li>
					       </ul>
					  	</div>
					  </div>
					</div>

			  	<div style="margin-top: 110px" id="wrapper">
	  				<div id="scroller" style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
					  	<div class="demo-content">
								<ul class="testul">
									<div class="hidediv" style="display: none;">没有您要找的数据</div>
									<li>
							 			<div class="list-group">
											 
											</div>
									</li>
							 	</ul>
					  	</div>
					</div>
  				</div>
			  </div>
		  </div>
		</div>

		<?include_once('footer.php');?>
		<style type="text/css">
			.chaxun {
				color: #438EB9 !important;
			}
		</style>
		<!-- /.main-container -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("&lt;script src='assets/js/jquery.min.js'&gt;"+"&lt;"+"/script&gt;");
		</script>
		<script type="text/javascript">
			// if('ontouchstart' in document.documentElement) document.write("&lt;script src='assets/js/jquery.mobile.custom.min.js'&gt;"+"&lt;"+"/script&gt;");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/app.js"></script>	
		<script src="assets/js/jquery.hammer.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function(){
				$('body').hammer().on("tap pan",function(){
					$('.search input').blur(
				});
				$('#wrapper').hammer().on("tap pan",function(){
					$('.search input').blur();
				});
				$('#wrapper a').hammer().on("tap",function(){
					$(this).click();
				});
				$('.search input').click(function(event){
					event.stopPropagation()
				});
				$('.lbl').css('display','block');
				// $('.sec_ul li span').hammer().on('tap pan', function(e){
				// 	$(this).parent().find('input').click()
				// 	e.stopPropagation()
				// 	// alert('w');
				// })
			});

		</script>	

</body>
</html>