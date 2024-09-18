<?php
	session_start();
	include 'classes/Config.php';
	$conn=new Config;
	$con=$conn->createCon();	
		
	$sql="SELECT `user_id`,count(*) FROM `user_answer` WHERE `user_ans`=`right_answer` Group By `user_id` ORDER BY count(*) DESC";
	//echo $sql;
	$res=mysqli_query($con,$sql);
	//$count=mysqli_num_rows($res);
	
	while($row=mysqli_fetch_array($res))
	{
		//$sql1="UPDATE `exam_result` SET `total_mark`=".$row['count(*)'].",`gross_total`=".$row['count(*)'].",`percent`=".$row['count(*)']." WHERE candidate_id='".$row['user_id']."'";
		$sql1="INSERT INTO `exam_result`(`candidate_id`,`module`,`total_mark`,`gross_total`,`percent`,`lock_exam`,`exam_date`) VALUES ('".$row['user_id']."','1',".$row['count(*)'].",".$row['count(*)'].",".$row['count(*)'].",'Y','".date('d-m-Y')."')";
		//echo $sql1.'<br>';
		mysqli_query($con,$sql1);
	}
	//mysqli_query($con,$sql1);
	
?>