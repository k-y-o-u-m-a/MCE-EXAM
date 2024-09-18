<?php
	session_start();
	include 'classes/Config.php';
	include 'classes/Question.php';
	$con=new Config;
	$conn=$con->createCon();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css"><title>ETP</title>
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
            <h3>Manage Questions</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
				<th>Question</th>
				<th>Option 1</th>
				<th>Option 2</th>
				<th>Option 3</th>
				<th>Option 4</th>
				<th>Correct Answer</th>
				<th>Module</th>
                <th>Status</th>
                <th>Action</th>
			</tr>
			</thead>
            <tbody>
<?php

$que=new Question;
$getQue=$que->getQuestion($conn,$_SESSION['id']);
$i=1;
while($row=mysqli_fetch_assoc($getQue))
{
?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['que_desc'];?></td>
				<td><?php echo $row['option1'];?></td>
                <td><?php echo $row['option2'];?></td>
                <td><?php echo $row['option3'];?></td>
                <td><?php echo $row['option4'];?></td>
                <td><?php echo $row['correct_answer'];?></td>
                <td><?php echo $row['module'];?></td>
                <td><?php echo $row['status'];?></td>
                <td>
                	<a href="<?php echo 'editQuestion.php?id='.$row['qId']?>">Edit</a>
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