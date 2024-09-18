<?php
include 'classes/Config.php';
$con=new Config;
$conn=$con->createCon();

$sql="Select Formno from user_master";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res))
{
	$string='CCCA'.$row['Formno'];
	$sqlUpd="Update user_master Set userid='".$string."' where Formno='".$row['Formno']."'";
	mysqli_query($conn,$sqlUpd);
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
                <th>Candidate's Name</th>
                <th>Father's Name</th>
                <th>User Id</th>
                <th>Password</th>
                <th>Module</th>
			</tr>
			</thead>
			<tbody>
<?php
$con=new Config;
$conn=$con->createCon();
//$getExam=$exam->getAllExamDetail($conn);
$sql="Select * from user_master";
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
                <td><?php echo $row['module'];?></td>
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