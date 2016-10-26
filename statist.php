<?
error_reporting(0);
include_once ("config/config.php");
include_once ("config/dsql.php");
if(!isset($dsql)){
	$dsql = new DSQL();
}


function  showjs($element,$title,$SQL,$category,$dsql){
						//$SQL = "SELECT  jieduan ,sum($column) as c   FROM project group by jieduan ";
							//echo $SQL . "\n"; 

							@$dsql->query($SQL);
							$data = "";
							$i = 0;
							$total =0;
							while($dsql->next_record()){
								$i ++;
								$jieduan = trim($dsql->f('jieduan'));
								$c =round($dsql->f('c'),2);
								$jieduans[] = "'$jieduan'";
								$total +=$c;


								$jieduanseries[]="{
																  name:'$jieduan',
																  type:'bar',
																  stack: '总量',
																  roseType : 'area',
																  itemStyle : { normal: {label : {show: true, position: 'insideTop'}}},
																  data:[$c]
																}";


							}
							$data = implode(",",$jieduans);
							$jieduanseriesinfo = implode(",",$jieduanseries);

							?>
							var myChart = echarts.init(document.getElementById('<?print($element)?>'));
							option = {
								title : {
									show:true,
									text:'<?print($title)?> (合计<?print($total)?>)',
							    y:'top',
							    x:'left',
							    textStyle:{
							    	fontSize: 16
							    }
							  },
							  backgroundColor:'#fff',
							  tooltip : {
							    trigger: 'axis',
							    axisPointer : {            // 坐标轴指示器，坐标轴触发有效
							      type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
							    }
							  },
							  legend: {
							    data:[<?print($data)?>],
									selectedMode:false,
							   	top:20,
									x: 'right'
							  },
							  grid: {
        					left: '3%',
        					right: '4%',
        					bottom: '3%',
        					containLabel: true
    						},
							  xAxis : [
							    {
							      type : 'value'
							    }
							  ],
							  yAxis : [
							    {
							      type : 'category',
							      data : ['<?print($category)?>']
							    }
							  ],
							  series : [
							     <?print($jieduanseriesinfo)?>
							  ] 
							};						
              myChart.setOption(option); 
							
							<?
}
$SQL = "SELECT  max(yue) as yue   FROM projectyue	     ";
							//echo $SQL . "\n"; 

	@$dsql->query($SQL);
	if($dsql->next_record()){
				$date =  $dsql->f('yue') ;

				$yue = substr($dsql->f('yue'),4,4);
				$yue=$yue*1;
								 
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
		<link rel="stylesheet" type="text/css" href="assets/css/loading.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript" src="assets/js/hammer.min.js"></script>
		<script type="text/javascript" src="assets/js/iscroll.js"></script>
		<script type="text/javascript" >
			var myScroll;
			function loaded () {
				myScroll = new IScroll('#wrapper', { mouseWheel: true });
				$('#loader-wrapper .load_title').remove();
				$('#main-container').css('opacity','1');
			}
			document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
		</script>
		
	</head>

	<body class="no-skin" style="font-family: 'Microsoft Yahei'" onload="loaded()">
		<div id="loader-wrapper">
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
		<div id="navbar" class="navbar navbar-default">
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
					  window.location='index.php';
		          });
						}
					}
				</script>
				<div class="title"><?print($yue)?>月项目统计</div>
			</div>
		</div>

		<div class="main-container" id="main-container" style="opacity: 0;">
			<div class="main-content statist" style="padding: 0 1em">
				<div id="wrapper" style="top: 40px;">
					<div id="scroller">
					<div id="statist_m" name="年度投资计划"></div>
				    <div id="statist_t" name="1-*月完成投资"></div>
						<div id="statist_num" name="项目个数"></div>
				    <div id="statist_new" name="新开工项目"></div>
						<div id="statist_ed" name="已竣工"></div>
				    <div  style="position: relative; background: rgb(255, 255, 255) none repeat scroll 0% 0%;line-height: 29px;padding-left:9px;padding-right:9px">
						<?
              $SQL = "SELECT  SUM( isyijingkaigong )*100/sum(isjihuaxinkaigong) as kaigonglv,sum(isweikaigong) as isweikaigong,sum(isweijugong) as isweijugong,sum(isjihuaxinkaigong) as isjihuaxinkaigong,sum(isyijingkaigong) as isyijingkaigong,sum(isjihuajungong) as isjihuajungong,sum(isyijingjungong) as isyijingjungong   FROM project";
              @$dsql->query($SQL);

              $i = 0;
              $total =0;
              if($dsql->next_record()) {
								$kaigonglv = round($dsql->f('kaigonglv'),2);
                $isweikaigong = $dsql->f('isweikaigong') ;
                $isweijugong = $dsql->f('isweijugong') ;
                $isjihuaxinkaigong = $dsql->f('isjihuaxinkaigong') ;
                $isyijingkaigong = $dsql->f('isyijingkaigong') ;
                $isjihuajungong = $dsql->f('isjihuajungong') ;
                $isyijingjungong = $dsql->f('isyijingjungong') ;
								echo "<div style='font-size:15px;font-weight:bold;width:90%;margin:auto'>竣工率 ".round(100*$isyijingjungong/$isjihuajungong,2)."%" ;
								echo "<span style=\"float:right;font-size:15px\">开工率 $kaigonglv%</span></div>" ;

								echo "<span>已经竣工<span style=\"color:red\">${isyijingjungong}</span>个<a href=\"weianqi.php?type=isyijingjungong\" style=\"float:right\">查看详情</a> </span>";
								echo "<br/>";

                echo "<span>未按期开工项目<span style=\"color:red\">${isweikaigong}</span>个<a href=\"weianqi.php?type=isweikaigong\" style=\"float:right\">查看详情</a></span> ";
								echo "<br/>";

                echo "<span>未按期竣工项目<span style=\"color:red\">${isweijugong}</span>个<a href=\"weianqi.php?type=isweijugong\" style=\"float:right\">查看详情</a></span><br/> <br/> ";
             	}

						?>
				  </div>
				</div>
			</div>
		</div>
		<br/><br/><br/>


		<?include_once("footer.php");?>
		<style type="text/css">
		.tongji {
			color: #438EB9 !important;
		}
		</style>
		<!-- /.main-container -->
		<!-- <script src="assets/js/jquery.2.1.1.min.js"></script> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/jquery.hammer.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function(){
				$('#wrapper a').hammer().on("tap pan",function(){
					window.location = $(this).attr('href')
				});
			});
		</script>
		<script type="text/javascript" src="./assets/js/echarts.js"></script>

		
		<script type="text/javascript">
	  <?
							$SQL = "SELECT  max(yue) as yue   FROM projectyue	     ";
							//echo $SQL . "\n"; 

							@$dsql->query($SQL);
							if($dsql->next_record()){
								$date =  $dsql->f('yue') ;

								$yue = substr($dsql->f('yue'),4,4);
								 
							}
	  //<div id="statist_m" name="年度投资计划"></div>
					showjs("statist_m","年度投资计划"," SELECT  jieduan ,sum(dangniantouzi)  as c   FROM project group by jieduan " ,"亿元",$dsql);
					showjs("statist_t","1-${yue}月完成投资"," SELECT  jieduan ,sum(bennianleijitouzi)  as c   FROM project p ,projectyue y  where p.id=y.pid and y.yue= '$date' group by jieduan " ,"亿元",$dsql);
					showjs("statist_num","项目个数"," SELECT  jieduan ,count(*)  as c   FROM project group by jieduan " ,"个数",$dsql);
				    showjs("statist_new","新开工项目"," SELECT  jieduan ,count(*)  as c   FROM project  where  isyijingkaigong=1 group by jieduan ","个数",$dsql);
				    //showjs("statist_per_k","开工率","SELECT jieduan,  SUM( CASE WHEN zhuangtai =  '已竣工' THEN 1 WHEN zhuangtai =  '已开工' THEN 1 WHEN zhuangtai =  '在建' THEN 1  ELSE 0 END )*100/ COUNT( id )   AS c FROM project  GROUP BY jieduan ","百分比",$dsql);


				    showjs("statist_ed","已竣工","SELECT  jieduan ,count(*)  as c   FROM project  where  isyijingjungong=1 group by jieduan  ","个数",$dsql);
				   // showjs("statist_per_j","竣工率","SELECT jieduan, SUM( CASE WHEN zhuangtai =  '已竣工' THEN 1  ELSE 0 END )*100 / COUNT( id ) AS c FROM project  GROUP BY jieduan ","个数",$dsql);
				    //showjs("statist_no_j","未按期竣工项目","SELECT  jieduan ,count(*)  as c   FROM project  where  zhuangtai='在建' group by jieduan  ","个数",$dsql);
	  ?>
		</script>
	</body>
</html>
