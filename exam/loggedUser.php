<?php
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
	$con=new Config;
	$conn=$con->createCon();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<script>
	function myFun()
	{
			setInterval(function(){window.location.reload(); }, 60000);
	}
</script>
<title>ETP</title>
</head>

<body onLoad="myFun();">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
        		<?php include 'common/header.html';?>
			</div>
            <div class="col-md-12">
        		<?php include 'common/admin_menu.html';?>
			</div>
            <div class="col-md-12">
        		<?php include 'loggedGraph.php';?>
			</div>
            <div class="col-md-12">
            <h3>List Of Logged In user</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>User Id</th>
                <th>Name</th>
                <th>Login Locked</th>
                <th>Time Left</th>
                <th>Attempt</th>
                <th>Action</th>
			</tr>
			</thead>
			<tbody>
<?php

$exam=new ExamResult;
//$getExam=$exam->getAllExamDetail($conn);
//$sql="Select user_master.userid,user_master.SName,user_master.Address,user_master.exam_center_address,user_master.lock_login,user_session.time_left from user_master INNER JOIN user_session ON md5(user_master.userid)=user_session.session_id && user_master.online='Y'";
$sql="Select um.userid,um.SName,um.Address,um.exam_center_address,um.lock_login,us.time_left from user_master um,user_session us where md5(um.userid)=us.session_id && um.online='Y'";
//echo $sql;
$con=new Config;
$conn=$con->createCon();
$getExam=mysqli_query($conn,$sql);
$i=1;
while($row=mysqli_fetch_array($getExam))
{
?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['userid'];?></td>
                <td><?php echo $row['SName'];?></td>
                <td><?php echo $row['lock_login'];?></td>
                <td><?php echo $row['time_left'];?></td>
                <td style="color:#F00;">
				<?php
				$attSql="Select count(user_ans) from user_answer where user_id='".$row['userid']."'";
				$attRes=mysqli_query($conn,$attSql);
				$attRow=mysqli_fetch_array($attRes);
				echo $attRow['count(user_ans)'];
				?>
                </td>
                <td><a href="<?php echo 'reset.php?user='.$row['userid'];?>">Reset</a></td>
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