<?php
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
	include 'classes/Title.php';
	include 'classes/Module.php';
	
	$con=new Config;
	$conn=$con->createCon();
	$title=new Title;
	$mod=new Module;
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
            <h3>Exam Result as on <?php echo $_REQUEST['date'];?></h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>User Id</th>
                <th>Name</th>
                <th>Father's Name</th>
                <th>Mobile No.</th>
                <th>Course</th>
				 <th>Category</th>
				  <th>Gender</th>
                <th>Marks Obt.</th>
                <th>Total Attempt</th>
				<th>EXAM_DATE</th>
                <th>Remarks</th>
                <th>Action</th>
			</tr>
			</thead>
			<tbody>
<?php

$exam=new ExamResult;
//$getExam=$exam->getAllExamDetail($conn);
$sql="Select user_master.userid,user_master.SName,user_master.FName,user_master.Contact_no,user_master.reg_no,user_master.Exam_name,user_master.Category,user_master.Gender,user_master.exam_date,exam_result.total_que,exam_result.percent,exam_result.grade,exam_result.module,exam_result.gross_total,exam_result.total_attempt from user_master INNER JOIN exam_result ON user_master.userid=exam_result.candidate_id && exam_result.exam_date='$_REQUEST[date]' Order By user_master.module,user_master.SName ASC";
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
                <td><?php echo strtoupper($row['Contact_no']);?></td>
                <td><?php echo $mod->getModuleDetail($conn,$row['module']);?></td>
				 <td><?php echo $row['Category'];?></td>
				  <td><?php echo $row['Gender'];?></td>
                <td><?php echo $row['gross_total'];?></td>
                <td><?php echo $row['total_attempt'];?></td>
				 <td><?php echo $row['exam_date'];?></td>
                <td><?php if($row['grade']=='X'){ echo 'Fail';$fail++;} else {echo 'Pass';$pass++;};?></td>
                <td>
				<a href="<?php echo 'examPdf.php?user='.$row['userid'].'&mod='.$row['module'].'&name='.$row['SName']?>">Get Detail</a>
                </td>
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