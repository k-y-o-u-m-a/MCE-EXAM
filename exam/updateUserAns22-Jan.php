<?php
	session_start();
	include 'classes/Config.php';
	$conn=new Config;
	$con=$conn->createCon();	
	$qNo=$_REQUEST['qNo'];
	$qValue=$_REQUEST['qValue'];
	$sql="Select * from user_answer where session_id='".md5($_SESSION['id'])."' && q_no=".$qNo;
	$res=mysqli_query($con,$sql);
	//$count=mysqli_num_rows($res);
	
	if($row=mysqli_fetch_array($res) > 0)
	{
		$sql1="Update user_answer SET user_ans='".$qValue."' where session_id='".md5($_SESSION['id'])."' && q_no=".$qNo;
	}
	else
	{
	$sql1="Insert into user_answer(session_id,q_no,user_ans) values('".md5($_SESSION['id'])."',".$qNo.",'".$qValue."')";
	}
	mysqli_query($con,$sql1);

	//echo count($res);
?>