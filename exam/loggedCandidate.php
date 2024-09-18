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
        		<?php include 'presentCand.php';?>
			</div>
            <div class="col-md-12">
            <h3>List Of Logged In user</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>Exam Date</th>
                <th>Batch</th>
                <th>Count</th>
			</tr>
			</thead>
			<tbody>
<?php
$con=new Config;
$conn=$con->createCon();
$sql="SELECT `exam_date`,`batch`,count(*) FROM `user_master` WHERE `lock_login`='Y' Group By `exam_date`,`batch` Order By `exam_date`,`batch` ASC";
$getExam=mysqli_query($conn,$sql);
$i=1;
while($row=mysqli_fetch_array($getExam))
{
?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['exam_date'];?></td>
                <td><?php echo $row['batch'];?></td>
                <td><?php echo $row['count(*)'];?></td>
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