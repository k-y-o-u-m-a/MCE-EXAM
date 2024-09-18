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
            <h3>Result of all candidate</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>User Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Que. No.</th>
                <th>Right Answer</th>
                <th>Your Answer</th>
			</tr>
			</thead>
			<tbody>
<?php
$con=new Config;
$conn=$con->createCon();
$exam=new ExamResult;
//$getExam=$exam->getAllExamDetail($conn);
$sql="Select user_master.userid,user_master.SName,user_master.Address,user_master.module,user_answer.q_no,user_answer.user_ans,user_answer.right_answer from user_master INNER JOIN user_answer ON md5(user_master.userid)=user_answer.session_id Order By user_master.userid";
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
                <td><?php echo $row['q_no']+1;?></td>
                <td><?php echo $row['right_answer'];?></td>
                <td><?php echo $row['user_ans'];?></td>
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