<?php
session_start();
include 'classes/Config.php';
$conn=new Config;
$con=$conn->createCon();
//$sql="Select * from question where qId =1";
//$res=mysqli_query($con,$sql);
//if(mysqli_num_rows($res) > 0)
//	while($row=mysqli_fetch_assoc($res))
//		echo $row['que_desc'];
$currentTime=$_REQUEST['q']+1;
$nextTime=$currentTime-1;
$currentTime=$_REQUEST['q']-1;

$sql="Update user_session SET time_left=".$nextTime." where session_id='".md5($_SESSION['id'])."'";
mysqli_query($con,$sql);
//echo $_REQUEST['q'];
?>