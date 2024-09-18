<?php
include 'classes/Config.php';
$con=new Config;
$conn=$con->createCon();
$length = 4;
$characters = "1234567890";

$sql="Select userid from user_master where password=''";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res))
{
	$string = '';
	for($i=0;$i<$length;$i++)
	{
		$index=mt_rand(0,strlen($characters)-1);
		$string.=$characters[$index];
	}
	$sqlUpd="Update user_master Set password='".strtoupper($string)."' where userid='".$row['userid']."'";
	mysqli_query($conn,$sqlUpd);
}
if(isset($_REQUEST['getPassword']))
{
	header("location:attendanceSheet1.php?bat=".$_REQUEST['exam_batch'].'&&dt='.$_REQUEST['exam_date']);
}
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

<body>
<form action="" method="post">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
        		<?php include 'common/header.html';?>
			</div>
            <div class="col-md-12">
        		<?php include 'common/admin_menu.html';?>
			</div>
            <div class="col-md-12">
            <h3>Attendance Sheet</h3>
            <div class="col-md-3">
            <select class="form-control col-lg-12" name="exam_date" required>
            	<option selected>Select Exam Date</option>
<?php
$sql1="Select DISTINCT exam_date from user_master";
$getExam1=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_array($getExam1))
{
?>
				<option value="<?php echo $row1['exam_date'];?>"><?php echo $row1['exam_date'];?></option>
<?php
}
?>  
            </select>
            </div>
            <div class="col-md-3">
            <select class="form-control col-lg-12" name="exam_batch" required>
            	<option selected value="">Select Batch</option>
<?php
$sql2="Select DISTINCT batch from user_master";
$getExam2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_array($getExam2))
{
?>
				<option value="<?php echo $row2['batch'];?>"><?php echo $row2['batch'];?></option>
<?php
}
?>                
            </select>
            </div>
            <div class="col-md-3">
            	<input type="submit" class="btn btn-primary" value="Generate Attendance Sheet" name="getPassword">
            </div>
<?php
if(isset($_REQUEST['bat']))
{
?>
            <div class="col-md-12">
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>Candidate Image</th>
                <th>Candidate's Name</th>
                <th>User Id</th>
                <th>Candidate's Signature</th>
                <th>Left thumb impression</th>
                <th>Exam Date</th>
                <th>Batch</th>
			</tr>
			</thead>
			<tbody>
<?php
$con=new Config;
$conn=$con->createCon();
//$getExam=$exam->getAllExamDetail($conn);
$sql="Select * from user_master where exam_date='".$_REQUEST['dt']."' && batch='".$_REQUEST['bat']."' Order By SName ASC";
//echo $sql;
$getExam=mysqli_query($conn,$sql);
$i=1;
while($row=mysqli_fetch_array($getExam))
{
?>
			<tr>
				<td align="center"><?php echo $i;?></td>
                <td align="center"><img src="<?php echo 'sign/'.$row['user_img'];?>" width="50" height="50" class="img-rounded"></td>
                <td><?php echo strtoupper($row['SName']);?></td>
                <td><?php echo $row['userid'];?></td>
                <td></td>
                <td></td>
                <td><?php echo $row['exam_date'];?></td>
                <td><?php echo $row['batch'];?></td>
			</tr>
<?php
	$i++;
}
?>
    </tbody>
  </table>

			</div>
<?php
}
?>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</form>
</body>
</html>