<?php
session_start();
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
	include 'classes/Title.php';
	include 'classes/Module.php';
	
	$con=new Config;
	$conn=$con->createCon();
	$title=new Title;
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
        		<?php include 'common/admin_menu.html';?>
			</div>
            <div class="col-md-12">
            <h3>Module Detail</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>Module</th>
                <th>Section</th>
                <th>Weightage</th>
			</tr>
			</thead>
			<tbody>
<?php

$exam=new ExamResult;
//$getExam=$exam->getAllExamDetail($conn);
$sql="Select * from module_section";
$res=mysqli_query($conn,$sql);
$i=1;

while($row=mysqli_fetch_array($res))
{
	$modObj=new Module;
?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $modObj->getModuleDetail($conn,$row['module']);?></td>
                <td><?php echo $row['section_name'];?></td>
                <td><?php echo $row['weightage'];?></td>
			</tr>
<?php
	$i++;
}
?>
    </tbody>
  </table>

			</div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</body>
</html>