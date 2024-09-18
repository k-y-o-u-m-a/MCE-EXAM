<?php
include 'classes/Config.php';
$con=new Config;
$conn=$con->createCon();
$length = 4;
$characters = "123456789";

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
	header("location:passwordGenerator.php?bat=".$_REQUEST['exam_batch'].'&&dt='.$_REQUEST['exam_date']);
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
            <h3>Generate Password</h3>
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
            	<input type="submit" class="btn btn-primary" value="Generate Password" name="getPassword">
            </div>
<?php

if(isset($_REQUEST['bat']))
{
?>
            <div class="col-md-12">
			<div id="printableArea">
			<table class="table table-striped table-bordered table-hover table-condensed" >
			<thead>
			<tr align="center">
				
                <th colspan="5" align="center"><?php echo "Exam date: ".$_REQUEST['dt']." &nbsp;&nbsp;&nbsp;&nbsp;             Batch Number:".$_REQUEST['bat']; ?></th>
               
			</tr>
			<tr>
				<th>System Number</th>
                <th>Candidate's Name</th>
                <th>Father's Name</th>
                <th>User Id</th>
                <th>Password</th>
               
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
				<td><?php echo $i;?></td>
                <td><?php echo $row['SName'];?></td>
                <td><?php echo $row['FName'];?></td>
                <td><?php echo $row['userid'];?></td>
                <td><?php echo $row['password'];?></td>
                
			</tr>
<?php
	$i++;
}
?>
<tr><td><a href="javascript:void(0);" onclick="printPageArea('printableArea')">Print</a></td></tr>
    </tbody>
  </table>
  </div>

			</div>
<?php
}
?>
        </div>
    </div>


</form>
<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
<script>
function printPageArea(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>
</body>
</html>