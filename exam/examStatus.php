<?php
session_start();
include 'classes/Config.php';
$conn=new Config;
$con=$conn->createCon();
$status="";
if($_REQUEST['status']=='Y')
	$status='N';
if($_REQUEST['status']=='N')
	$status='Y';
$sql="Update exam SET status='".$status."' where id=".$_REQUEST['id'];
mysqli_query($con,$sql);
header("location:manageExamination.php");
//echo $_REQUEST['q'];
?>