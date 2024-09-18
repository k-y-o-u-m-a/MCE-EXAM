<?php
	session_start();
	if(!isset($_SESSION['id']))
		header("location:index.php");
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
	
	$con=new Config;
	$conn=$con->createCon();
	
	$userOffline="Update user_master SET online='N' where userid='".$_SESSION['id']."'";
	$resUser=mysqli_query($conn,$userOffline);
	
	$totSql="SELECT count(*) FROM `user_answer` WHERE `user_id`='".$_SESSION['id']."'";
	$totRes=mysqli_query($conn,$totSql);
	$tot=mysqli_fetch_array($totRes);
	
	$attSql="SELECT count(*) FROM `user_answer` WHERE `user_id`='".$_SESSION['id']."' && `user_ans` in ('A','B','C','D')";
	$attRes=mysqli_query($conn,$attSql);
	$att=mysqli_fetch_array($attRes);
	
	//$atttSql="SELECT count(*) FROM `user_answer` WHERE `user_id`='".$_SESSION['id']."' && `user_ans` is null";
	//$atttRes=mysqli_query($conn,$atttSql);
	//$notAtt=mysqli_fetch_array($atttRes);
	$notAttempted=$tot['count(*)']-$att['count(*)'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<title><?php echo $_SESSION['exam_name'];?></title>
</head>
<body>
<div class="container">
<div class="col-sm-12">
	<?php include 'common/header.html';?>
</div>
<h2>Exam Details</h2>
<p></p>                                                                                      
<div class="table-responsive">          
<table class="table">
	<tbody>
		<tr>
			<td>Total Questions</td><td><?php echo $tot['count(*)'];?></td>
		</tr>
		<tr>
			<td>Total Attempt</td><td><?php echo $att['count(*)'];?></td>
		</tr>
		<tr>
						<td>Not Attempted</td><td><?php echo $notAttempted;?></td>
		</tr>
	</tbody>
</table>
</div>
<div class="col-sm-12 alert-info">
	Congrats !!! You have successfully completed your exam !!!
</div>
<div class="col-sm-12">
	<ip
</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</body>
</html>
<?php
	session_unset();
	session_destroy();
?>