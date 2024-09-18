<?php
	include 'classes/Config.php';
	$obj=new Config;
	$conn=$obj->createCon();
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<title><?php echo 'Online Exam';?></title>
</head>

<body>
<form action="" method="post">
	<div class="container-fluid">
    	
    	<div class="row">
        	<div class="col-sm-12">
        		<?php include 'common/header.html';?>
			</div>
			<div class="col-md-12">
        		<?php include 'common/admin_menu.html';?>
			</div>
            </div>
			<?php
			if(isset($_REQUEST['save']))
	{
		$user=$_REQUEST['user'];
		$userEnc=md5($_REQUEST['user']);
		$time=$_REQUEST['time'];
		
		$sql="UPDATE `user_master` SET `lock_login` = 'N' WHERE `userid`='".$user."'";
		mysqli_query($conn,$sql);
		
		$sql1="UPDATE `user_session` SET `time_left` = '".$time."' WHERE `session_id`='".$userEnc."'";
		mysqli_query($conn,$sql1);
		
		$sql2="DELETE FROM `exam_result` WHERE `candidate_id`='".$user."'";
		mysqli_query($conn,$sql2);
		echo "<h4 align=\"center\" style=\"color:green\">Reset Successful - ".$user."</h4>";
	}
	?>
			
            <h2 align="center"> Time Elapsed Reset</h2>
            <div class="col-sm-4">
					<input value="" type="text" name="user" required placeholder="Enter Roll No." class="form-control" />
			</div>
            <div class="col-sm-4">
					<input value="" type="number" name="time" required placeholder="Time to be alloted" class="form-control" min="0" max="180" />
			</div>
            <div class="col-sm-4">
					<input type="submit" name="save" value="Reset" class="btn btn-primary" />
			</div>
		</div>
	</div>
</form>
<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
          
</body>
</html>