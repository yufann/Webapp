<?
error_reporting(0);
include_once ("config/config.php");
include_once ("config/dsql.php");
if(!isset($dsql)){
	$dsql = new DSQL();
}

	$SQL = "SELECT	*	 FROM project	where id = $id	";
							//echo $SQL . "\n"; 

							@$dsql->query($SQL);
							if($dsql->next_record()){
								$id = $dsql->f('id');
								$xiangmumingcheng = $dsql->f('xiangmumingcheng');
								$danweimingcheng = $dsql->f('danweimingcheng');
								$xianqu = $dsql->f('xianqu');
								$dizhi = $dsql->f('dizhi');
								$shenbaodanwei = $dsql->f('shenbaodanwei');
								$fenlei861 = $dsql->f('fenlei861');
								$neirong = $dsql->f('neirong');
								$jiansheqixian = $dsql->f('jiansheqixian');
								$zongtouzi = $dsql->f('zongtouzi');
								$quniantouzi = $dsql->f('quniantouzi');
								$dangniantouzi = $dsql->f('dangniantouzi');
								$zhuangtai = $dsql->f('zhuangtai');
								$jieduan = $dsql->f('jieduan');
								$jihuakaigong = $dsql->f('jihuakaigong');
								$shijikaigong = $dsql->f('shijikaigong');
								$jihuajungong = $dsql->f('jihuajungong');
								$shijijungong = $dsql->f('shijijungong');
								$zerendanwei = $dsql->f('zerendanwei');
								$zerenren = $dsql->f('zerenren');
								$lianxidianhua = $dsql->f('lianxidianhua');
							}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" />
		<title>项目管理</title>
		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/other.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/colorbox.css">
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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

	<body class="no-skin" onload="loaded()" style="font-family: 'Microsoft Yahei'">
		<div id="navbar" class="navbar navbar-default navbar-fixed-top">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
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
								history.back();
							});
						}
					}
				</script>
				<div class="title">项目详情</div>
			</div>
		</div>
		<div class="main-container" id="main-container">
			<div class="main-content">
				<div id="wrapper" style="top:45px">
					<div id="scroller">
						<div id="main2" style="height:350px;width: 100%;"></div>
						<div class="main-container-inner" style="background: #f2f2f2">
							<div class="widget-box">
								<div class="widget-header widget-header-flat">
									<h5>
										<i class="glyphicon glyphicon-list-alt pull-left"></i> 
										 基本信息
									</h5>
								</div>
								<div class="widget-body">
									<p class="pro_name">项目名称：<?print($xiangmumingcheng)?></p>
									<p style="color: #3399FF">
										<small>责任单位：<?print($zerendanwei)?></small>
									</p>
									<p style="color: #3399FF">
										<small>项目联系人：<?print($zerenren)?>(<?print($lianxidianhua)?>)</small>
									</p>
									<p style="color: #3399FF">
										<small>建设阶段：<?print($jieduan)?></small>
										<small style="margin-left: 2em">项目状态：<?print($zhuangtai)?></small>
									</p>

									<p style="color: #3399FF">
										<small>建设地点：<?print($xianqu)?></small>
									</p>
									<?

									if(strlen($dizhi)>2){
										echo "<p style=\"color: #3399FF\">
										<small>地址：$dizhi</small></p>";
									}
									?>

								 	<p style="color: #3399FF"><small>861分类：<?print($fenlei861)?></small></p>
								 	<p>建设期限：<?print($jiansheqixian)?></p>
									<p>业主单位名称：<?print($danweimingcheng)?></p>
									<p>项目申报单位：<?print($shenbaodanwei)?></p>
									<p class="touzi">投资情况：<br>
											<table style="margin-left: 10px;font-size: 14px;color: #444">
												<tr>
													<td>总投资(亿元)：</td>
													<td><?print($zongtouzi)?></td>
												</tr>
												<tr>
													<td>截止去年投资(亿元)：</td>
													<td><?print($quniantouzi)?></td>
												</tr>
												<tr>
													<td>当年投资计划(亿元)：</td>
													<td><?print($dangniantouzi)?></td>
												</tr>
											</table>
										</p>
									<p style="line-height: 1.5em;text-align: justify;">建设内容和规模：<?print($neirong)?></p>
								</div>
							</div>
							<table class="project_tb">
								<tr>
									<td>计划开工时间</td>
									<td><?print($jihuakaigong)?></td>
								</tr>
								<tr>
									<td>实际开工时间</td>
									<td><?print($shijikaigong)?></td>
								</tr>
								<tr>
									<td>计划竣工时间</td>
									<td><?print($jihuajungong)?></td>
								</tr>
								<tr>
									<td>实际竣工时间</td>
									<td><?print($shijijungong)?></td>
								</tr>
							</table>
							<div class="widget-box test_wid month">
								<?

								$jungongriqi = strtotime($shijijungong);
								$yue = date('Ym',$jungongriqi);

								$SQL = "SELECT	 *	FROM	projectyue y where pid = $id	 order by yue desc	";
								
								if($zhuangtai=="已竣工"){
									$SQL = "SELECT	 *	FROM	projectyue y where pid = $id and 	yue <= '$yue' order by yue desc	";

								}
								//echo $SQL . "\n";

								@$dsql->query($SQL);
								$data = "";
								$i = 0;
								while($dsql->next_record()) {

									$pid = $dsql->f('pid');
									$jinzhan = $dsql->f('jinzhan');
									$tupian = $dsql->f('tupian');
									$mubiao = $dsql->f('mubiao');
									$wenti = $dsql->f('wenti');
									$wanchengtouzi = $dsql->f('wanchengtouzi');
									$bennianleijitouzi = $dsql->f('bennianleijitouzi');
									$leijitouzi = $dsql->f('leijitouzi');
									$yue = $dsql->f('yue');

									if ($wanchengtouzi !=''||trim($jinzhan)!='' ) {

										?>
										<div class="widget-header widget-header-flat">
											<h5 class="pull-left">
												<i class="glyphicon glyphicon-calendar"></i>
												<? print($yue) ?>
											</h5>
										</div>
										<div class="widget-body">

											<?
											if (trim($jinzhan)) {
												echo "<p>进展情况：  $jinzhan </p>";
											}
											if (trim($mubiao)) {
												echo "<p>工作目标：  $mubiao </p>";
											}
											if (trim($wenti)) {
												echo "<p>存在问题：  $wenti </p>";
											}
											if ($wanchengtouzi !='' ) {

											?>
											<p class="touzi">投资情况：<br>
											<table style="margin-left: 10px;font-size: 14px;color: #444">
												<tr>
													<td>当月完成投资：</td>
													<td><? print($wanchengtouzi) ?>亿元</td>
												</tr>
												<tr>
													<td>截至当月底本年累计完成投资：</td>
													<td><? print($bennianleijitouzi) ?>亿元</td>
												</tr>
												<tr>
													<td>截至当月底累计完成投资：</td>
													<td><? print($leijitouzi) ?>亿元</td>
												</tr>
											</table>
											</p>
											<?}?>

										</div>

										<?
									}




								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?include_once("footer.php");?>
		<!-- /.main-container -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			// if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.colorbox-min.js"></script>
		<!-- <script type="text/javascript" src="assets/js/jquery.mobile.custom.min.js"></script> -->
		<script type="text/javascript" src="assets/js/jquery.hammer.js"></script>
		<script type="text/javascript">
			$(function(){
				$(".ace-thumbnails li a").hammer().on("tap",function(){
					$(this).click();
				});
			});
		</script>
		<script type="text/javascript">
			jQuery(function($) {
				var colorbox_params = {
					reposition:true,
					scalePhotos:true,
					scrolling:false,
					previous:'pre',
					next:'<i class="icon-arrow-right"></i>',
					close:'&times;',
					current:'{current} of {total}',
					maxWidth:'100%',
					maxHeight:'100%',
					onOpen:function(){
						document.body.style.overflow = 'hidden';
					},
					onClosed:function(){
						document.body.style.overflow = 'auto';
					},
					onComplete:function(){
						$.colorbox.resize();
						$('#cboxTitle').hide();
						$('#cboxPrevious').hide();
						$('#cboxNext').hide();
						$('#cboxCurrent').hide();
					}
				};

				$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
				$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading 
			})
		</script>
	<script type="text/javascript" src="./assets/js/echarts.js"></script><?


		$jungongriqi = strtotime($shijijungong);
		$yue = date('Ym',$jungongriqi);

		$SQL = "SELECT	y.yue	as jieduan, wanchengtouzi		 ,bennianleijitouzi,leijitouzi	FROM	projectyue y where pid = $id	 order by yue asc	";
		//echo $SQL . "\n";
		if($zhuangtai=="已竣工"){
			$SQL = "SELECT	y.yue	as jieduan, wanchengtouzi		 ,bennianleijitouzi,leijitouzi	FROM	projectyue y where pid = $id  and 	yue <= '$yue' 	 order by yue asc	";
		}

							echo $SQL . "\n";

							@$dsql->query($SQL);
							$data = "";
							$i = 0;
							while($dsql->next_record()){
								$i ++;
								$jieduan = trim($dsql->f('jieduan'));
								$c = $dsql->f('leijitouzi');
								$wanchengtouzi = $dsql->f('wanchengtouzi');
								$bennianleijitouzi = $dsql->f('bennianleijitouzi');
								$leijitouzi = $dsql->f('leijitouzi');
								$jieduans[] = "'$jieduan'";


									$jieduanseries[]="$c";
									$wanchengtouzis[]="$wanchengtouzi";
									$bennianleijitouzis[]="$bennianleijitouzi";

							}
							$data = implode(",",$jieduans);
							 
							$wanchengtouziinfo = implode(",",$wanchengtouzis);
							$bennianleijitouziinfo = implode(",",$bennianleijitouzis);
							$datainfo = implode(",",$jieduanseries);

?>
		<script type="text/javascript">
			
			 
			 var myChart = echarts.init(document.getElementById('main2')); 
				option = {
					tooltip : {
							trigger: 'axis',
							position: ['20%', '10%'],
							formatter: '{a0}: {c0}亿元<br />{a1}: {c1}亿元<br />{a2}: {c2}亿元'
					},
					backgroundColor:'#fff',
					legend: {
							data:['当月完成投资','截至当月底本年累计完成投资','截至当月底累计完成投资'],
							selectedMode:false
					},
					toolbox: {
							show : false,
							feature : {
									dataView : {show: true, readOnly: false},
									magicType : {show: true, type: ['line', 'bar']},
									restore : {show: true},
									saveAsImage : {show: true}
							}
					},
					calculable : true,
					xAxis : [
							{
									type : 'category',
								 data : [<?print($data)?>],
							}
					],
					yAxis : [
							{
									type : 'value',
									name : '亿元'
							}
					],
					series : [
							{
									name:'当月完成投资',
									type:'bar',
									data:[<?print( $wanchengtouziinfo)?>],
									markPoint : {
											data : [
													{type : 'max', name: '最大值'},
													{type : 'min', name: '最小值'}
											]
									},
									markLine : {
											data : [
													{type : 'average', name: '平均值'}
											]
									}
							},
							{
									name:'截至当月底本年累计完成投资',
									type:'bar',
									data:[<?print($bennianleijitouziinfo)?>],
									markLine : {
											data : [
													{type : 'average', name : '平均值'}
											]
									}
							},
							{
									name:'截至当月底累计完成投资',
									type:'bar',
									data:[<?print($datainfo)?>],
									markLine : {
											data : [
													{type : 'average', name : '平均值'}
											]
									}
							}
					],
					grid: {
						y: '20%'
					}
			};			 
			myChart.setOption(option); 
				
	</script>
	</body>
</html>
