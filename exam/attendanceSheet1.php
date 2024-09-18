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
	header("location:attendanceSheet.php?bat=".$_REQUEST['exam_batch'].'&&dt='.$_REQUEST['exam_date']);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<title>Attendance Sheet</title>
</head>

<body>
<form action="" method="post">
	<div class="container">
    	<div class="row">
        <div class="col-md-12">
        <h3 align="center">National Institute Of Electronics & Information Technology</h3>
        <h5 align="center"><b>(An Autonomous Scientific Society of Deity, Ministry of Communications and Information Technology, Government of India)</b></h5>
        <h5 align="center"><b>Attendance Sheet For CCA_DEO Exam 2017</b></h5>
        </div>
        <h5><b>Exam Date : <?php echo $_REQUEST['dt'];?></b></h5>
        <h5><b>Batch : <?php echo $_REQUEST['bat'];?></b></h5>
<?php
$time="Select * from batch_master where batch_id='".$_REQUEST['bat']."'";
$resTime=mysqli_query($conn,$time);
$rowTime=mysqli_fetch_array($resTime);
?>
        <h5><b>Exam Time : <?php echo $rowTime['start_time'];?></b></h5>
<?php
if(isset($_REQUEST['bat']))
{
?>
            <div class="col-md-12">
			<table border="1">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>Candidate Image</th>
                <th>Candidate's Name</th>
                <th>User Id</th>
                <th>Candidate's Signature</th>
                <th>Left thumb impression</th>
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
			<tr style="height:100px;">
				<td height="100" align="center"><?php echo $i;?></td>
                <td align="center"><img src="<?php echo 'sign/'.$row['user_img'];?>" width="50" height="50" class="img-rounded"></td>
                <td><?php echo strtoupper($row['SName']);?></td>
                <td><?php echo $row['userid'];?></td>
                <td></td>
                <td></td>
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