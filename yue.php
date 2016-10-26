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
		</head>
        <style type="text/css">
            li {
                /*list-style: none;*/
            }
            li a {
                text-decoration: none;
            }
            .yue_ul {
                margin-left: 10px;
                margin-right: 10px;
            }
            .yue_ul li {
                border-bottom: 1px solid #eee;
                padding-bottom: 5px;
                padding-top: 5px;
                word-wrap: normal;
            }
            .yue_ul li:first-child {
            }
        </style>
        <body>
        <div id="navbar" class="navbar navbar-default navbar-fixed-top" onclick="history.back()">
            <div class="title">返回</div>
        </div>
        <div class="main-container" id="main-container" style="padding-top: 50px">

            <div class="main-content">
                <ul class="yue_ul list-group">
                <p  style="text-align: center;font-size: 18px;">各县区(园区)市直部门<br> 重点项目推进情况</p>
                <!-- <li><a href="">1-8月份各县区市直部门重点项目推进情况.xls</a></li> -->
                    <?php
                        $dir = dirname(__FILE__);
                        $open_dir = opendir("$dir/yuebao");
                        // echo "<table border=1   cellpadding=6>";
                        while ($file = readdir($open_dir)) {
                         if ($file!= "." && $file != "..") {

                             $return[] =   $file;
                             $filename[] = $file;//获取文件名称
                         }
                        }
                        array_multisort($filename,SORT_DESC,SORT_STRING, $return);//按名字排序
                        while(list($key,$val) = each($return)) {
                            echo "<li style=\"\">" . str_replace('.xls','',$val) . "<a href='yuebao/$val' style=\"float: right\">查看详情</a></li><br/> ";
                        }

                        // echo "</table>";
                    ?> 
                </ul>
            </div>
            <div id="navbar" class="navbar navbar-default navbar-fixed-top" onclick="history.back()">
            <div class="title">返回</div>
        </div>
        </div>

        <div class="footer">
            <div class="footer-inner">
                <div class="footer-content">
                </div>
            </div>
        </div>
    </body>
    </html>

