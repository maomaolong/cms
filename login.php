<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/ace.min.css" />
	<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
	<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="css/style.css"/>
	<script src="assets/js/ace-extra.min.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>        
    <script src="assets/layer/layer.js" type="text/javascript"></script>
	<title>登陆</title>
</head>

<?php 
require 'database/DB.php'; 
$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST["name"])) {
      	$error = "请输入用户名和密码";
   	} else {
      	$name = test_input($_POST["name"]);
   	}
   	if (empty($_POST["password"])) {
      	$error = "请输入用户名和密码";
   	} else {
      	$password = test_input($_POST["password"]);
   	}
   	if (DB::checkUser($name,$password)) {
   		$error = "success";
   	} else {
   		$error = "账户名或密码错误";
   	}
}
function test_input($data) {
   	$data = trim($data);
   	$data = stripslashes($data);
   	$data = htmlspecialchars($data);
   	return $data;
}
?>
<?php if ($error == "success"): ?>
<script>
location.href='index.html';
</script>script>
<?php else : ?>
<body class="login-layout">
	<div class="logintop">    
    	<span><?php echo $error ?></span>    
	    <ul>
	    <li><a href="#">返回首页</a></li>
	    <li><a href="#">帮助</a></li>
	    <li><a href="#">关于</a></li>
	    </ul>    
    </div>
    <div class="loginbody">
		<div class="login-container">
			<div class="center">
				<h1>
					<i class="icon-leaf green"></i>
					<span class="orange">思美软件</span>
					<span class="white">后台管理系统</span>
				</h1>
				<h4 class="white">Background Management System</h4>
			</div>

			<div class="space-6"></div>
			<div class="position-relative">
				<div id="login-box" class="login-box widget-box no-border visible">
					<div class="widget-body">
						<div class="widget-main">
							<h4 class="header blue lighter bigger">
								<i class="icon-coffee green"></i>
								管理员登陆
							</h4>

							<div class="login_icon"><img src="images/login.png" /></div>

							<form action="login.php" method="POST">
								<fieldset>
									<label class="block clearfix">
										<span class="block input-icon input-icon-right">
											<input type="text" class="form-control" placeholder="登录名"  name="name">
											<i class="icon-user"></i>
										</span>
									</label>

									<label class="block clearfix">
										<span class="block input-icon input-icon-right">
											<input type="password" class="form-control" placeholder="密码" name="password">
											<i class="icon-lock"></i>
										</span>
									</label>

									<div class="space"></div>

									<div class="clearfix">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl">保存密码</span>
										</label>
										<input type="submit" class="width-35 pull-right btn btn-sm btn-primary" value="登陆">
									</div>

									<div class="space-4"></div>
								</fieldset>
							</form>

							<div class="social-or-login center">
								<span class="bigger-110">通知</span>
							</div>

							<div class="social-login center">
							本网站系统不再对IE8以下浏览器支持，请见谅。
							</div>
						</div><!-- /widget-main -->
						<div class="toolbar clearfix"></div>
					</div><!-- /widget-body -->
				</div><!-- /login-box -->
			</div><!-- /position-relative -->
		</div>
    </div>
    <div class="loginbm">版权所有  2016  <a href="">南京思美软件系统有限公司</a> </div><strong></strong>
</body>
<?php endif ; ?>
</html>