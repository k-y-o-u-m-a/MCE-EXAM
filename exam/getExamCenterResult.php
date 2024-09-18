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
	$sqlDate="Select user_master.userid,user_master.SName,user_master.FName,user_master.exam_center_code,user_master.exam_center_address,exam_result.candidate_id from user_master INNER JOIN exam_result ON user_master.userid=exam_result.candidate_id";
	$getExam=mysqli_query($conn,$sqlDate);
?>
<body>
	<div class="container">
    	<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th>Sl no.</th>
                            <th>User Id</th>
                			<th>Candidate's Name</th>
                			<th>Father's Name</th>
                			<th>Center</th>	
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
<?php
$con=new Config;
$conn=$con->createCon();
//$getExam=$exam->getAllExamDetail($conn);
$i=1;
$x=0;
$y=0;
$z=0;
while($row=mysqli_fetch_array($getExam))
{
	if($row['exam_center_code']=='880010')
		$x++;
	if($row['exam_center_code']=='880016')
		$y++;
	if($row['exam_center_code']=='990576')
		$z++;
?>
			<tr>
				<td><?php echo $i;?></td>
                <td><?php echo $row['userid'];?></td>
                <td><?php echo $row['SName'];?></td>
                <td><?php echo $row['FName'];?></td>
                <td><?php echo $row['exam_center_code'];?></td>
                <td><?php echo $row['exam_center_address'];?></td>
			</tr>
<?php
	$i++;
}
echo '880010='.$x.'<br>';
echo '880016='.$y.'<br>';
echo '990576='.$z.'<br>';
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