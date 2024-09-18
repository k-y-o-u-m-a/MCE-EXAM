<?php
session_start();
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
	include 'classes/Title.php';
	$con=new Config;
	$conn=$con->createCon();
	$title=new Title;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<title>CCCA</title>
</head>

<body>
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
        		<?php include 'common/header.html';?>
			</div>
            <div class="col-md-12">
        		<?php include 'common/center_menu.html';?>
			</div>
            <div class="col-md-12">
            <h3>Candidate Detail</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>Name</th>
                <th>Father's Name</th>
                <th>Address</th>
                <th>Username</th>
                <th>Password</th>
			</tr>
			</thead>
			<tbody>
<?php

$exam=new ExamResult;
//$getExam=$exam->getAllExamDetail($conn);
$sql="Select * from user_master where exam_center_code='".$_SESSION['center_id']."' Order By SName ASC";
$getExam=mysqli_query($conn,$sql);
$i=1;
$pass=0;
$fail=0;
while($row=mysqli_fetch_array($getExam))
{
?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['SName'];?></td>
                <td><?php echo $row['FName'];?></td>
                <td><?php echo $row['Address'];?></td>
                <td><?php echo $row['userid'];?></td>
                <td><?php echo $row['password'];?></td>   
			</tr>
<?php
	$i++;
}
?>
    </tbody>
  </table>

			</div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</body>
</html>