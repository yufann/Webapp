<?
error_reporting(0);
include_once ("config/config.php");
include_once ("config/dsql.php");
if(!isset($dsql)){
	$dsql = new DSQL();
}



$SQL = "SELECT  max(yue) as yue   FROM projectyue	     ";
//echo $SQL . "\n";

@$dsql->query($SQL);
if($dsql->next_record()){
	$date =  $dsql->f('yue') ;

	$yue = substr($dsql->f('yue'),4,4);
	$yue=$yue*1;

}
//按期开(竣)工','未按期开工','未按期竣工
// 未按期开工'
$SQL = "SELECT count(*) as c FROM  `project` WHERE    isweikaigong=1 ";
//echo $SQL . "\n";
@$dsql->query($SQL);
if($dsql->next_record()){
	$weianqikaigong =  $dsql->f('c') ;
}
$dateyue = date('Y-m');
// 未按期竣工'
$SQL = "SELECT  count(*) as c FROM  `project` WHERE  isweijugong=1  ORDER BY  `project`.`jihuajungong` ASC  ";
//echo $SQL . "\n";
@$dsql->query($SQL);
if($dsql->next_record()){
	$weianqijungong =  $dsql->f('c') ;
}

//按期开(竣)工
$SQL = "SELECT  count(*) as c FROM  `project` WHERE jieduan !=  '储备项目'";
//echo $SQL . "\n";
@$dsql->query($SQL);
if($dsql->next_record()){
	$anqi =  $dsql->f('c') - $weianqikaigong  - $weianqijungong;
}
//$dsql->query("set names utf8");
?><!DOCTYPE html>
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
		<script type="text/javascript" src="assets/js/hammer.min.js"></script>
		<script type="text/javascript" src="assets/js/iscroll.js"></script>
		<script type="text/javascript">
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
		              	window.history.go(-1);
		          });
						}
					}
				</script>
				<div class="title"><?print($yue)?>月未按期开(竣)工项目</div>
			</div>
		</div>
		<div class="main-container" id="main-container">
			<div class="main-content">
				<div id="wrapper">
					<div id="scroller">
				    <div id="main" style="height:250px;width: 100%;"></div>
				    
				    <div class="main-container-inner">
				    <div class="widget-box">
							<div class="widget-header widget-header-flat">
								<h5 class="pull-left">未按期开工项目分区统计</h5>
								<a href="weianqi.php?type=kaigong" class="pull-right" style="line-height: 36px;text-decoration: none;font-size: .9em;padding-left: 3px;position: relative;right: 3px;color:#EF7D11">查看详情 》</a>
							</div>
							<div class="widget-body">
								<div id="main2" style="height:350px;width: 100%;"></div>
								
							</div>
						</div>
				    </div>
				    <div class="main-container-inner">
				    <div class="widget-box">
							<div class="widget-header widget-header-flat">
								<h5 class="pull-left">未按期竣工项目分区统计</h5>
								<a href="weianqi.php?type=jungong" class="pull-right" style="line-height: 36px;text-decoration: none;font-size: .9em;padding-left: 3px;position: relative;right: 3px;color:#EF7D11">查看详情 》</a>
							</div>
							<div class="widget-body">
								<div id="main3" style="height:350px;width: 100%;"></div>
								
							</div>
						</div>
				    </div>
					</div>
				</div>
			</div>
		</div>

		<?include_once('footer.php');?>
		<style type="text/css">
			.weianqi {
				color: #438EB9 !important;
			}
		</style>
		<!-- /.main-container -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<script src="assets/js/jquery.hammer.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function(){
				$('#wrapper a').hammer().on("tap pan",function(){
					// alert('');
					// $(this).click();
					window.location = $(this).attr('href');
				});
			});
		</script>	
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script type="text/javascript" src="./assets/js/echarts.js"></script>
		<script type="text/javascript">
      
              var myChart = echarts.init(document.getElementById('main')); 
              option = {
							    title : {
							        show:false
							    },
							    calculable : false,
							    backgroundColor:'#fff',
							    tooltip : {
							        trigger: 'item',
							        formatter: "{a} <br/>{b} : {c} ({d}%)"
							    },
							    legend: {
							        orient : 'vertical',
							        x : 'left',
							        data:['按期开(竣)工','未按期开工','未按期竣工'],
							        show:false,
							        selectedMode: false
							    },
							    calculable : false,
							    series : [
							        {
							            name:'数量',
							            type:'pie',
							            radius : '50%',
							            center: ['50%', '50%'],
							            data:[
								                {
								                	value:<?print($anqi)?>,
								                	name:'按期开(竣)工',
									                itemStyle:{
									                	normal:{
									                		color:'#9FC9EA'
									                	}
									                }
									              },
								               	 {
								                	value:<?print($weianqikaigong)?>,
								                	name:'未按期开工',
									                itemStyle:{
									                	normal:{
									                		color:'#B6A2DE'
									                	}
									                }
								              	},
								                {
								                	value:<?print($weianqijungong)?>,
								                	name:'未按期竣工',
									                itemStyle:{
									                	normal:{
									                		color:'#2EC7C9'
									                	}
									                }
								              	}			
							            ]
							        }
							    ]
							};
            
              myChart.setOption(option); 
         
<?
					$SQL = "SELECT  xianqu,count(*) as c     FROM project  where (zhuangtai =  '未开工' AND jihuakaigong < NOW( )  AND jieduan !=  '储备项目' ) or (zhuangtai =  '在建' AND jihuakaigong <shijikaigong )group by xianqu";
					@$dsql->query($SQL);
							$data = "";
							$i = 0;

							while($dsql->next_record()){
								$i ++;
								$xianqu = trim($dsql->f('xianqu'));
								$c = $dsql->f('c');
								$xianqus[] = "'$xianqu'";


								$xianquseries[]="{
						            		value:$c,
						            		itemStyle:{
												normal:{
													color:'#B6A2DE'
												}
											}
									}";


							}
							$data = implode(",",$xianqus);
							$xianquseriesinfo = implode(",",$xianquseries);

							?>

 myChart = echarts.init(document.getElementById('main2')); 
             	option = {
						    title : {
						        show:false
						    },
						    calculable : false,
						    draggable: false,
						    tooltip : {
						        trigger: 'axis'
						    },
						    legend: {
						        data:['数量'],
						        selectedMode: false,
						        show:false
						    },
						    calculable : false,
						    xAxis : [
						        {
						            type : 'value',
						            boundaryGap : [0, 0.01]
						        }
						    ],
						    yAxis : [
						        {
						            type : 'category',
						            data : [<?print($data)?>]
						        }
						    ],
						    series : [
						        {
						            name:'数量',
						            type:'bar',
						            data:[
						            	<?print($xianquseriesinfo)?>
						            ]
						        }
						    ],
                grid : {
                	y:'10%',
                	x:'20%',
                	width:'75%'
                }
							};
              myChart.setOption(option);

			  <?

			  unset($xianqus);
			  unset($xianquseries);
					$SQL = "SELECT  xianqu,count(*) as c     FROM project  where jihuajungong !=  '否' AND TRIM( zhuangtai ) !=  '已竣工' AND '$dateyue' > jihuajungong  group by xianqu";
					@$dsql->query($SQL);
							$data = "";
							$i = 0;

							while($dsql->next_record()){
								$i ++;
								$xianqu = trim($dsql->f('xianqu'));
								$c = $dsql->f('c');
								$xianqus[] = "'$xianqu'";


								$xianquseries[]="$c";


							}
							$data = implode(",",$xianqus);
							$xianquseriesinfo = implode(",",$xianquseries);

							?>


			  var myChart = echarts.init(document.getElementById('main3'),'macarons');
           	option = {
					    title : {
					        show:false
					    },
					    tooltip : {
					        trigger: 'axis'
					    },
					    calculable : false,
					    draggable: false,
					    legend: {
					        data:['数量'],
					        selectedMode: false
					    },
					    areaStyle:{
					    	color:'#ccc'
					    },
					    xAxis : [
					        {
					            type : 'value',
					            boundaryGap : [0, 0.01]
					        }
					    ],
					    yAxis : [
					        {
					            type : 'category',
								data : [<?print($data)?>]
					        }
					    ],
					    series : [
					        {
					            name:'数量',
					            type:'bar',
					            data:[<?print($xianquseriesinfo)?>]
					        }
					    ],
              grid : {
              	y:'10%',
              	x:'22%',
              	width:'75%'
              },
              color : [
              	'#2EC7C9'
              ]
						};
            myChart.setOption(option); 
       
		</script>
	</body>
</html>
