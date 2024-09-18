<?php
	session_start();
	
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
	$con=new Config;
	$conn=$con->createCon();
	
	$obj=new ExamResult;
	$examObj=$obj->getExamDetail($conn,$_SESSION['id']);
	$examData=explode(',',$examObj);
	
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
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
			<td>Total Questions</td><td><?php echo $examData[0];?></td>
		</tr>
		<tr>
			<td>Total Attempt</td><td><?php echo $examData[1];?></td>
		</tr>
		<tr>
			<td>Not Attempted</td><td><?php echo $examData[2];?></td>
		</tr>
	</tbody>
</table>
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