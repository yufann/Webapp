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
	            	//window.history.go(-1);
					  window.location='index.php';
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

	$SQL = "SELECT  count(*) as c  FROM project ";
	$dsql->query($SQL);
	if($dsql->next_record()){
		$total = $dsql->f('c');
	}
	$SQL = "SELECT  count(*) as jiduanc,sum(dangniantouzi) as dangniantouzi,sum(	isjihuaxinkaigong) as 	isjihuaxinkaigong	 ,sum(isyijingkaigong) as isyijingkaigong FROM project  where jieduan='$jd'  ";

	$dsql->query($SQL);
	if($dsql->next_record()){
		$jieduantotal = $dsql->f('jiduanc');
		$isyijingkaigong = $dsql->f('isyijingkaigong');
		$isjihuaxinkaigong = $dsql->f('isjihuaxinkaigong');
		$dangniantouzi = round($dsql->f('dangniantouzi'),2);
	}

	$kaigonglv = round( 100*$isyijingkaigong/$isjihuaxinkaigong ,2);

	$zhanbi = round(100*$jieduantotal/$total);
	$SQL ="SELECT   sum(p.quniantouzi) as quniantouzi,sum(p.dangniantouzi) as dangniantouzi,sum(y.wanchengtouzi) as wanchengtouzi,sum(y.bennianleijitouzi)  as bennianleijitouzi,sum(y.leijitouzi)  as leijitouzi    FROM project p ,projectyue y  where p.id=y.pid and y.yue= '$date'   and  jieduan='$jd'  ";
	$dsql->query($SQL);
	if($dsql->next_record()){
		$quniantouzi = round($dsql->f('quniantouzi'),2);
		
		$wanchengtouzi = round($dsql->f('wanchengtouzi'),2);
		$bennianleijitouzi = round($dsql->f('bennianleijitouzi'),2);
		$leijitouzi = round($dsql->f('leijitouzi'),2);
		
	}
	echo "<div class=\"title\">1~${yue}月${jd} 一览</div>";
	?>
				
			</div>
		</div>
	
		<div class="main-container" id="main-container" style="padding-top: 50px">
			<div class="main-content" style="padding: 0 1em;border-bottom: 1px solid #ccc;">
				<div class="swiper-container">
				  <div class="swiper-wrapper">
				 	 	<div class="swiper-slide">
				    	<div style="height:170px;width: 100%;">
				    		<?
							//，开工率:${kaigonglv}%
							echo "<p>项目个数：${jieduantotal}个。 ";
							if(${isyijingkaigong}>0){
								echo "已开工项目${isyijingkaigong} 个";
							}

							echo "</p>
								<p>本年度投资计划：${dangniantouzi}亿</p>
								<p>本月完成投资：${wanchengtouzi}亿</p>
								<p>截止本月当年完成投资：${bennianleijitouzi}亿</p>
								<p>截止本月完成总投资：${leijitouzi}亿 </p>";
							?>
				    	</div>
				    </div>
				    <!--div class="swiper-slide">
				    	<div id="looking2" style="height:170px;width: 100%;"></div>
				    </div-->
				    <div class="swiper-slide">
				    	<div id="looking" style="height:170px;width: 100%;"></div>
				    </div>
				  </div>
				  <div class="swiper-pagination"></div>
				</div>
				<div id="wrapper" style="top: 221px;">
					<div id="scroller">
					 	<ul class="testul">
							<?
							$SQL = "SELECT  *   FROM project    ";
							
							if($jd){
										$SQL = "SELECT  *   FROM project  where jieduan='$jd'  ";

							}
							
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
		<script type="text/javascript">
			$(function(){
				$('#wrapper a').hammer().on("tap",function(){
						window.location = $(this).attr('href')
					});
			})
		</script>
<?

$SQL = "SELECT  zhuangtai,count(*) as c   FROM project group by jieduan group by zhuangtai";
							//echo $SQL . "\n"; 
	if($jd){
										$SQL = "SELECT  zhuangtai,count(*) as c     FROM project  where jieduan='$jd' group by zhuangtai";

	}
							@$dsql->query($SQL);
							$data = "";
							$i = 0;
							while($dsql->next_record()){
								$i ++;
								$jieduan = trim($dsql->f('zhuangtai'));
								$c = $dsql->f('c');
								$jieduans[] = "'$jieduan$c'";

								 
									$jieduanseries[]="{value:$c, name:'$jieduan$c'}";
								 
								
							}
							$data = implode(",",$jieduans);
							$jieduanseriesinfo = implode(",",$jieduanseries);

?>
		<script type="text/javascript">
		 
       
          
              var myChart = echarts.init(document.getElementById('looking')); 
			  

			option = {

		    backgroundColor: '#fff',

		    title: {
		        text: '',
		        left: 'center',
		        top: 20,
		        textStyle: {
		            color: '#ccc'
		        }
		    },
				legend: {
								  data:[<?print($data)?>],
								  x : 'center',
			        		y : 'top',
			        		selectedMode:false
										  },
			    tooltip : {
			        trigger: 'item',
			        formatter: "{a} <br/>{b} : {c} ({d}%)"
			    },

			    visualMap: {
			        show: false,
			        min: 80,
			        max: 600,
			        inRange: {
			            colorLightness: [0, 1]
			        }
			    },
			    series : [
			        {
			            name:'数量',
			            type:'pie',
			            radius : '55%',
			            center: ['50%', '50%'],
			            data:[
			               <?print($jieduanseriesinfo)?> 
			            ].sort(function (a, b) { return a.value - b.value}),
			            
			            
			        }
			    ]
			};

              
              myChart.setOption(option); 
          

	  <?

/*
$SQL = "SELECT  yue,sum(bennianleijitouzi) as c   FROM project  p ,projectyue y where p.id=y.pid group by yue ";
							//echo $SQL . "\n"; 
if($jd){
							 
 
$SQL = "SELECT  yue,sum(bennianleijitouzi) as c   FROM project  p ,projectyue y where p.id=y.pid   and jieduan='$jd'  group by yue";


	}
							@$dsql->query($SQL);
							$data = "";
							$i = 0;
							while($dsql->next_record()){
								$i ++;
								$xianqu = trim($dsql->f('yue'));
								$c = round($dsql->f('c'),2);
								$xianqus[] = "'$xianqu'";
								$xianqucs[] = "'$c'";

								 
								
							}
							$data = implode(",",$xianqus);
							$xianqucsinfo = implode(",",$xianqucs);

?>
     
            var myChart = echarts.init(document.getElementById('looking2')); 
           	option = {
				        color: ['#3398DB'],
					    title : {
					        show:false
					    },
					    tooltip : {
					        trigger: 'axis'
					    },
					    calculable : false,
					    backgroundColor:'#fff',
					    draggable: false,
					    legend: {
					        data:['亿元'],
					        selectedMode: false
					    },
					    areaStyle:{
					    	color:'#ccc'
					    },
					    xAxis : [
					    {type : 'category',
					            					          data : [<?print($data)?>]
					        }
					        
					    ],
					    yAxis : [
					       {
					       	type : 'value',
					            boundaryGap : [0, 0.01]
					        	
					           
					        } 
					    ],
					    series : [
					        {
					            name:'亿元',
					            type:'line',
					            data:[<?print($xianqucsinfo)?>] 
					        }
					    ],
              grid : {
              	y:'12%',
              	x:'10%',
              	width:'75%'
              }
						};
            myChart.setOption(option); 
        <?
*/
        ?>
		</script>
	</body>
</html>
