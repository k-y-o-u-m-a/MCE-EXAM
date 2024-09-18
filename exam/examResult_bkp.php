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
            <h3>Examination Result</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>User Id</th>
				<th>Module</th>
                <th>Total Question</th>
                <th>Total Marks</th>
                <th>Grade</th>
                <th>Action</th>
			</tr>
			</thead>
			<tbody>
<?php
$con=new Config;
$conn=$con->createCon();
$exam=new ExamResult;
$getExam=$exam->getAllExamDetail($conn);
$i=1;
while($row=mysqli_fetch_assoc($getExam))
{
?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['candidate_id'];?></td>
                <td><?php echo $row['module'];?></td>
                <td><?php echo $row['total_que'];?></td>
                <td><?php echo $row['gross_total'];?></td>
                <td><?php echo $row['grade'];?></td>
                <td>
                	<a href="<?php echo 'examPdf.php?user='.$row['candidate_id'].'&mod='.$row['module']?>">Get Detail</a>
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