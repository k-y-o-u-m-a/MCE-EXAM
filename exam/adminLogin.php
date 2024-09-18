<?php
	include 'classes/Config.php';
	include 'classes/Login.php';
	include 'classes/Session.php';
	
	if(isset($_REQUEST['login']))
	{
		$obj=new Config;
		$conn=$obj->createCon();
		$log=new Login;
		$login=$log->adminAuthentication($conn,$_REQUEST['user'],$_REQUEST['password']);
		if($login > 0)
		{
			session_start();
			$_SESSION['id']=$_REQUEST['user'];
			header("location:home.php");
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<title>Online Exam</title>
</head>

<body>
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
        		<?php include 'common/header.html';?>
			</div>
            <div class="col-md-12">
				<div class="col-md-4"></div>
			<div class="col-md-4">
				<h2 align="center">::Admin Login::</h2>
				<form role="form" action="" method="post">
				<div class="form-group">
				<input type="text" class="form-control" name="user" placeholder="Username" required>
				</div>
				<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>            
            </div>
            <div class="col-md-12" style="margin:auto; text-align:center; color:#F00;">
				*Note : Use updated version of Mozilla Firefox or Google Chrome web browser for better view.
			</div>
            <div class="col-md-12" style="background:#ffab62;width:100%;height:25px;position:absolute;bottom:0;left:0;">
				<?php include 'common/footer.html';?>
			</div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</body>
</html>