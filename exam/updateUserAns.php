<?php
	session_start();
	include 'classes/Config.php';
	$conn=new Config;
	$con=$conn->createCon();	
	$qNo=$_REQUEST['qNo'];
	$qValue=$_REQUEST['qValue'];
	$rightAns=$_REQUEST['correct_answer'];
	$que_id=$_REQUEST['que_id'];
	
	$sql="Select * from user_answer where session_id='".md5($_SESSION['id'])."' && que_id=".$que_id;
	$res=mysqli_query($con,$sql);
	//$count=mysqli_num_rows($res);
	
	if($row=mysqli_fetch_array($res) > 0)
	{
		$sql1="Update user_answer SET user_ans='".$qValue."' where session_id='".md5($_SESSION['id'])."' && que_id=".$que_id." && right_answer='".$rightAns."'";
		mysqli_query($con,$sql1);
	}
	else
	{
	$sql1="Insert into user_answer(session_id,q_no,user_ans,right_answer,que_id) values('".md5($_SESSION['id'])."',".$qNo.",'".$qValue."','".$rightAns."',".$que_id.")";
	mysqli_query($con,$sql1);
	}
	//mysqli_query($con,$sql1);
	
?>