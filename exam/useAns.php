<?php
	include 'classes/Config.php';
	$con=new Config;
	$conn=$con->createCon();
	
	$userid=strtoupper($_REQUEST['id']);
	$qry="Select * from user_master where userid='".$userid."'";
	$res=mysqli_query($conn,$qry);
	while($row=mysqli_fetch_array($res))
		$module=$row['module'];
	
	$qry1="Delete from user_answer where session_id='".md5($userid)."'";
	$res1=mysqli_query($conn,$qry1);
	
	$qry2="Select * from question where module=".$module;
	$res2=mysqli_query($conn,$qry2);
	$tot=mysqli_num_rows($res2);
	$i=0;
	while($row1=mysqli_fetch_array($res2))
	{
	if($i<50)
	{
	$qry3="Insert into user_answer (user_id,session_id,q_no,que_id,user_ans,right_answer) values('".$userid."','".md5($userid)."','".$i++."','".$row1['qId']."','".$row1['correct_answer']."','".$row1['correct_answer']."')";
	$res3=mysqli_query($conn,$qry3);
	}
	else
	{
		$a=array("A","B","C","D");
		$random_keys=array_rand($a,3);
		//$a[$random_keys[0]];
		$qry3="Insert into user_answer (user_id,session_id,q_no,que_id,user_ans,right_answer) values('".$userid."','".md5($userid)."','".$i++."','".$row1['qId']."','".$a[$random_keys[0]]."','".$row1['correct_answer']."')";
	$res3=mysqli_query($conn,$qry3);
	}
	}
?>