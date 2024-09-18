<?php
	session_start();
	include 'classes/Config.php';
	include 'classes/Login.php';
	$obj=new Config;
	$conn=$obj->createCon();
	$sql="Update user_master SET lock_login='N' where userid='".$_REQUEST['user']."'";
	$resUser=mysqli_query($conn,$sql);
	header("location:loggedCand.php");
?>