<?php
	session_start();

	include 'classes/Config.php';
	
	$con=new Config;
	$conn=$con->createCon();
	$mod=$_REQUEST['mod'];
	$sql1="SELECT * FROM `module` WHERE `module_description`=".$mod;
	$res1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_array($res1);
	$tot=$row1['tot_que'];
	echo $tot;
	
?>