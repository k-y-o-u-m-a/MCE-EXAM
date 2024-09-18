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
            <h3>Trainer Certification Examination Result as on <?php echo $_REQUEST['date'];?></h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>User Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Grade</th>
                <th>Action</th>
			</tr>
			</thead>
			<tbody>
<?php
$con=new Config;
$conn=$con->createCon();
$exam=new ExamResult;
//$getExam=$exam->getAllExamDetail($conn);
$sql="Select user_master.userid,user_master.SName,user_master.Address,exam_result.total_que,exam_result.percent,exam_result.grade,exam_result.module from user_master INNER JOIN exam_result ON user_master.userid=exam_result.candidate_id && exam_result.exam_date='$_REQUEST[date]' Order By exam_result.id DESC";
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
                <td><?php echo $row['grade'];?></td>
                <td>
<a href="<?php echo 'examPdf.php?user='.$row['userid'].'&mod='.$row['module'].'&name='.$row['SName']?>">Get Detail</a>
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