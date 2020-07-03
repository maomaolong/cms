<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
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
   	if ($error == ""){
   		if (DB::checkUser($name,$password)) {
   			$error = "success";
	   	} else {
	   		$error = "账户名或密码错误";
	   	}
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
<body class="container" style="background-color: #f3f3f4;">
	<div class="row">
		<div class="col-xs-12">
			<?php if ($error != ""): ?>
				<div class="alert alert-warning"><?php echo $error ?></div>
			<?php endif ; ?>
	        <h1 style="font-size: 40px;text-align:center;">后台管理系统</h1>
	        <form action="login.php" method="POST">
				<div class="form-group">
	                <input type="text" class="form-control" placeholder="账号" name="name">
	            </div>
	            <div class="form-group">
	                <input type="password" class="form-control" placeholder="密码" name="password">
	            </div>
	            <input type="submit" class="btn btn-primary btn-lg btn-block" value="登陆">
			</form>
	    </div>
    </div>
</body>
<?php endif ; ?>
</html>