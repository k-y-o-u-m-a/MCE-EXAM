<?php
	session_start();
	include 'classes/Config.php';	
	
	$obj=new Config;
	$conn=$obj->createCon();
	$sql="Update user_master Set lock_login='N',online='N' where 1";
	mysqli_query($conn,$sql);
?>