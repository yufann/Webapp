{
	 "data" :[
            <?
error_reporting(0);
include_once ("config/config.php");
include_once ("config/dsql.php");
if(!isset($dsql)){
	$dsql = new DSQL();
}


 

 if($area && $area!='全部区域'){
	$whereinfo .=" and shenbaodanwei='$area'";
 }
 if($kind && $kind != '全部种类'){
	$whereinfo .=" and fenlei861 ='$kind'";
 }
			if($sum){


				if($sum=='全部金额'){

				}else if($sum=='1亿以下'){
					$whereinfo = " and  zongtouzi <1 ";
				}else if($sum=='1~10亿'){
					$whereinfo = " and  zongtouzi >=1 and  zongtouzi<10 ";
				}else if($sum=='10~100亿'){
					$whereinfo = " and  zongtouzi >=10 and  zongtouzi<100 ";
				}else if($sum=='100亿以上'){
					$whereinfo = " and  zongtouzi >=100 ";
				}


			}

			$zhangtailiebiao=explode(',',$status);
			$whereinfo = "";
			for($i=0;$i<count($zhangtailiebiao);$i++)
			{
				if($zhangtailiebiao[$i] == "已开工"){
					$zhuangtaiinfo =" or  isyijingkaigong=1 ";
				}
			}

			if($status) {
				$status = str_replace( ',', "','",$status);
				$whereinfo .= " and (zhuangtai in ('$status') $zhuangtaiinfo )";
			}


			if($type) {
				$type = str_replace( ',', "项目','",$type);
				$whereinfo .= " and jieduan in ('${type}项目') ";
			}


				if($sum=='全部金额'){

				}else if($sum=='1亿以下'){
					$whereinfo = " and  zongtouzi <1 ";
				}else if($sum=='1~10亿'){
					$whereinfo = " and  zongtouzi >=1 and  zongtouzi<10 ";
				}else if($sum=='10~100亿'){
					$whereinfo = " and  zongtouzi >=10 and  zongtouzi<100 ";
				}else if($sum=='100亿以上'){
					$whereinfo = " and  zongtouzi >=100 ";
				}





 if($search){
	$whereinfo .=" and ( xiangmumingcheng like '%$search%' or danweimingcheng like '%$search%'    or shenbaodanwei like '%$search%'    or dizhi like '%$search%'    or xianqu like '%$search%'    or zongtouzi='$search' ) ";
 }
//status:"在建,已竣工,已开工,未开工"
//type:"续建,储备,计划开工"

							
							$SQL = "SELECT  *   FROM project  where 1=1 $whereinfo limit 50  ";
							//echo $SQL . "\n";

							@$dsql->query($SQL);
							while($dsql->next_record()){
								$id = $dsql->f('id');
								$xiangmumingcheng = $dsql->f('xiangmumingcheng');
								$danweimingcheng = $dsql->f('danweimingcheng');
								$xianqu = $dsql->f('shenbaodanwei');
								$dizhi = $dsql->f('dizhi');
								$shenbaodanwei = $dsql->f('shenbaodanwei');
								$fenlei861 = $dsql->f('fenlei861');
								$neirong = $dsql->f('neirong');
								$jiansheqixian = $dsql->f('jiansheqixian');
								$zongtouzi = $dsql->f('zongtouzi');
								$quniantouzi = $dsql->f('quniantouzi');
								$dangniantouzi = $dsql->f('dangniantouzi');
								$zhuangtai = $dsql->f('zhuangtai');
								$jieduan = trim($dsql->f('jieduan'));
								$jihuakaigong = $dsql->f('jihuakaigong');
								$shijikaigong = $dsql->f('shijikaigong');
								$jihuajungong = $dsql->f('jihuajungong');
								$shijijungong = $dsql->f('shijijungong');
								 
								$data[]  = "{
									\"id\":\"$id\",
            	\"name\":\"$xiangmumingcheng\",
            	\"status\":\"$zhuangtai\",
            	\"type\":\"$jieduan\",
            	\"area\":\"$xianqu\"
            	}";
							} 

							echo implode(",",$data);
							?> ]
}
					 		
					 		