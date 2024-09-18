<?php
	session_start();
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
            <h3>Logged User</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>User Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Login Locked</th>
                <th>Time Left</th>
                <th>Action</th>
			</tr>
			</thead>
			<tbody>
<?php
$con=new Config;
$conn=$con->createCon();
$exam=new ExamResult;
//$getExam=$exam->getAllExamDetail($conn);
$sql="Select user_master.userid,user_master.SName,user_master.Address,user_master.exam_center_code,user_master.lock_login,user_session.time_left from user_master INNER JOIN user_session ON md5(user_master.userid)=user_session.session_id && user_master.online='Y' && user_master.exam_center_code='".$_SESSION['center_id']."'";
$getExam=mysqli_query($conn,$sql);
$i=1;
while($row=mysqli_fetch_array($getExam))
{
?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['userid'];?></td>
                <td><?php echo $row['SName'];?></td>
                <td><?php echo $row['Address'];?></td>
                <td><?php echo $row['lock_login'];?></td>
                <td><?php echo $row['time_left'];?></td>
                <td>
<a href="<?php echo 'resetCand.php?user='.$row['userid'];?>">Reset</a>
                </td>
			</tr>
<?php
	$i++;
}
?>
    </tbody>
  </table>

			</div>
            <div class="col-md-12">
				<?php include 'common/footer.html';?>
			</div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</body>
</html>