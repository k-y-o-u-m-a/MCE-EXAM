<?php
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<title>ETP</title>
</head>
<?php
	$con=new Config;
	$conn=$con->createCon();
	$sqlDate="Select * from user_master where center='".$_REQUEST['center']."'";
	$resDate=mysqli_query($conn,$sqlDate);
?>
<body>
	<div class="container">
    	<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th>Sl no.</th>
                			<th>Candidate's Name</th>
                			<th>Father's Name</th>
                			<th>Center</th>
                			<th>User Id</th>
							<th>Password</th>
						</tr>
					</thead>
					<tbody>
<?php
$con=new Config;
$conn=$con->createCon();
//$getExam=$exam->getAllExamDetail($conn);
$sql="Select * from user_master where `exam_center_code`='".$_REQUEST['center']."' Order by exam_center_code";
$getExam=mysqli_query($conn,$sql);
$i=1;
while($row=mysqli_fetch_array($getExam))
{
?>
			<tr>
				<td><?php echo $i;?></td>
                <td><?php echo $row['SName'];?></td>
                <td><?php echo $row['FName'];?></td>
                <td><?php echo $row['exam_center_address'];?></td>
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