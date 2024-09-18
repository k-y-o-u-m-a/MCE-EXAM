<?php
	include 'classes/Config.php';
	include 'classes/Examination.php';
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
            <h3>Manage Examination</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
				<th>Exam Name</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Total Question</th>
				<th>Batch Code</th>
				<th>Module</th>
				<th>Bilingual</th>
                <th>Status</th>
                <th>Action</th>
                <th></th>
			</tr>
			</thead>
			<tbody>
<?php
$con=new Config;
$conn=$con->createCon();
$exam=new Examination;
$getExam=$exam->getExam($conn);
$i=1;
while($row=mysqli_fetch_assoc($getExam))
{
?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['exam_name'];?></td>
				<td><?php echo $row['start_date'];?></td>
                <td><?php echo $row['end_date'];?></td>
                <td><?php echo $row['total_que'];?></td>
                <td><?php echo $row['batch'];?></td>
                <td><?php echo $row['module'];?></td>
                <td><?php echo $row['bilingual'];?></td>
                <td><?php echo $row['status'];?></td>
                <td>
                	<a href="<?php echo 'editExamination.php?id='.$row['id']?>">Edit</a>
                </td>
                <td>
				<?php if($row['status']=='Y') {?> <a href="<?php echo 'examStatus.php?id='.$row['id'].'&&status='.$row['status'];?>">Deactivate</a> <?php } if($row['status']=='N') {?> <a href="<?php echo 'examStatus.php?id='.$row['id'].'&&status='.$row['status'];?>">Activate</a> <?php }?>
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