<?php
	session_start();
	include 'classes/Config.php';
	$conn=new Config;
	$con=$conn->createCon();	
	$qNo=$_REQUEST['qNo'];
	$qValue=$_REQUEST['qValue'];
	$rightAns=$_REQUEST['correct_answer'];
	$que_id=$_REQUEST['que_id'];
	
	//$sql="Delete from user_answer where session_id='".md5($_SESSION['id'])."' && que_id=".$que_id;
	$sql="Update user_answer SET user_ans='' where session_id='".md5($_SESSION['id'])."' && que_id=".$que_id;
	$res=mysqli_query($con,$sql);
	//$count=mysqli_num_rows($res);
?>