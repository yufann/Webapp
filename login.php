<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>项目管理登录</title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/other.css" />
		<script src="assets/js/jquery.2.1.1.min.js"></script>
	</head>
	<body style="font-family: 'Microsoft Yahei';" onload="load()" style="background:url('assets/img/sd.jpg');">
		<div class="lglock" id="lglock" style="position: absolute;z-index: 100;background: url('assets/img/sd.jpg');background-size: cover;"></div>
		<script type="text/javascript">
			var wd = $(window).width(),he = $(window).height();
			$('.lglock').css({'width':wd,'height':he});
			function load(){
				$('.lglock').show(10).delay(2000).hide(10);
				$('.main-container').css('display','block');
				$('body').addClass('login-layout blur-login');
			}
		</script>
		<div class="main-container" style="display: none">
			<div class="row" style="margin: 0">
				<div class="col-sm-10 col-sm-offset-1">
					<div style="margin-top: 70px;" class="login-container">
						<div class="center">
							<span class="red"></span>
							<!--img width="113px" class="img-responsive" src="assets/img/gh.png" style="margin: auto;"-->
							<img class="img-responsive" src="assets/img/5.png" style="margin: auto;margin-top: 18px;">
						</div>
						<div class="space-7"></div>
						<div>
							<div style="margin-top: 32px;">
								<div class="widget-main">
									<form id="form1"  name="form1"  action="login_action.php" method="post">
										<fieldset>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="text" name="nickname" placeholder="请输入用户名" class="form-control">
													<i class="ace-icon fa fa-user"></i>
												</span>
											</label>
											<div class="space-14"></div>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password"  name="password"  placeholder="请输入密码" class="form-control">
													<i class="ace-icon fa fa-lock"></i>
												</span>
											</label>
											<div class="clearfix">
												<label class="inline pull-left" style="margin-top: 4px;">
													<input type="checkbox" class="ace" name="autologin">
													<span class="lbl" style="color: #fff">自动登录</span>
												</label>
												<label class="inline pull-right" style="margin-top: 4px;">
													<input type="checkbox" class="ace"  name="savepassword">
													<span class="lbl" style="color: #fff">记住密码</span>
												</label>
											</div>
											<div class="clearfix">
												<button type="button" onclick="form1.submit();" class="col-xs-12 pull-right btn btn-sm btn-primary" style="font-size: 16px">
													<i class="icon-key"></i>登录</button>
											</div>
											<div class="space-4"></div>
										</fieldset>
									</form>
									<div class="space-6"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
