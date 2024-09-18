<?php
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
        		<?php include 'common/admin_menu.html';?>
			</div>
            <div class="col-md-12">
            <h3 align="center">Beltron Programmer Result</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>Roll No</th>
                <th>Name</th>
                <th>Father's Name</th>
                <th>DOB</th>
                <th>Category</th>
                <th>Marks Obt.</th>
			</tr>
			</thead>
			<tbody>
<?php

$exam=new ExamResult;
//$getExam=$exam->getAllExamDetail($conn);
//$sql="Select user_master.userid,user_master.SName,user_master.FName,user_master.Address,user_master.reg_no,user_master.Exam_name,exam_result.total_que,exam_result.percent,exam_result.grade,exam_result.module from user_master INNER JOIN exam_result ON user_master.userid=exam_result.candidate_id && exam_result.exam_date='$_REQUEST[date]' Order By user_master.Formno ASC";
$sql="Select m.userid,m.SName,m.FName,m.DOB,m.Category,e.total_mark from user_master m,exam_result e where m.userid=e.candidate_id Order By e.total_mark DESC";

$getExam=mysqli_query($conn,$sql);
$i=1;
$pass=0;
$fail=0;
while($row=mysqli_fetch_array($getExam))
{
?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo strtoupper($row['userid']);?></td>
                <td><?php echo strtoupper($row['SName']);?></td>
                <td><?php echo strtoupper($row['FName']);?></td>
                <td><?php echo $row['DOB'];?></td>
                <td><?php echo $row['Category'];?></td>
                <td><?php echo $row['total_mark'];?></td>
			</tr>
<?php
	$i++;
}
?>
			<tr>
				<td colspan="2"><b>Total Pass  </b></td><td colspan="6"><b><?php echo $pass;?></b></td>
			</tr>
            <tr>
				<td colspan="2"><b>Total Fail  </b></td><td colspan="6"><b><?php echo $fail;?></b></td>
			</tr>
    </tbody>
  </table>

			</div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</body>
</html>