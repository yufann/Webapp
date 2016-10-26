<?
error_reporting(0);
include_once ("config/config.php");
include_once ("config/dsql.php");
if(!isset($dsql)){
	$dsql = new DSQL();
}



//$dsql->query("set names utf8");
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
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" type="text/css" href="assets/css/swiper.min.css">
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript" src="assets/js/hammer.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.hammer.js"></script>
		<script type="text/javascript" src="assets/js/iscroll.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script type="text/javascript" src="assets/js/swiper.min.js"></script>
		<script type="text/javascript" src="./assets/js/echarts.js"></script>
		<script>
			$(function(){
				var swiper = new Swiper('.swiper-container', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true,
	        nextButton: '.swiper-button-next',
	        prevButton: '.swiper-button-prev',
	        parallax: true,
	    	});

			});
		</script>
		<script type="text/javascript" >
			var myScroll;
			function loaded () {
				myScroll = new IScroll('#wrapper', { mouseWheel: true });
			}
			document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
		</script>
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
	            	history.back();
		          });
						}
					}
				</script>
				<?
	$SQL = "SELECT  max(yue) as yue   FROM projectyue	     ";
							//echo $SQL . "\n"; 

	@$dsql->query($SQL);
	if($dsql->next_record()){
				$date =  $dsql->f('yue') ;

				$yue = substr($dsql->f('yue'),4,4);
				$yue=$yue*1;
								 
	}

				$dateyue = date('Y-m');



		$whereinfo = " and $type=1 ";

	$SQL = "SELECT  count(*) as c  FROM project  ";
	$dsql->query($SQL);
	if($dsql->next_record()){
		$total = $dsql->f('c');

	}
	echo "<div class=\"title\">明细</div>";
	?>
				
			</div>
		</div>
	
		<div class="main-container" id="main-container" style="padding-top: 50px">
			<div class="main-content" style="padding: 0 1em;border-bottom: 1px solid #ccc;">

				<div id="wrapper" style="top: 21px;">
					<div id="scroller">
					 	<ul class="testul">
							<?

										$SQL = "SELECT  *   FROM project  where 1=1 $whereinfo  ";


							
							//echo $SQL . "\n";

							@$dsql->query($SQL);
							while($dsql->next_record()){
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
								?>
								<li>
					 			<div class="list-group">
									<a class="list-group-item" id="list-group-item" href="project.php?id=<?print($id)?>">
									<?print($xiangmumingcheng)?>
									</a>
									<a class="list-group-item lastchild" href="project.php?id=<?print($id)?>">
										<span class="type_c">
											<i class="glyphicon glyphicon-th-list"></i>
											<?print($jieduan)?>
										</span>
										<span class="statuss"><?print($zhuangtai)?></span>
										<span class="statue">
											<i class="glyphicon glyphicon-map-marker"></i>
											<?print($xianqu)?>
										</span>
									</a>
									</div>
							</li>
								<?
								
							} 
							?>
					 		
					 		
					 	</ul>	
				  </div>
				</div>
			</div>
		</div>

		<?include_once('footer.php');?>

	</body>
</html>
