<?php
include 'classes/Config.php';
	$con=new Config;
	$conn=$con->createCon();
date_default_timezone_set("Asia/Kolkata");
$sql="Select login_time from batch_master where batch_id IN(Select batch from user_master where userid='1608131001')";
//echo $sql;
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$b=$row['login_time'];
$batch_time=strtotime(date($b));
$login_time=strtotime(date('H:i'));
echo 'Batch-'.$batch_time.'<br>';
echo 'Login-'.$login_time.'<br>';
$tot=$batch_time+90;
$diff = $batch_time - $login_time;
echo $diff.'<br><br>';

echo $str='28-07-2016 10:30';
echo $str1=date('d-m-Y H:i');
echo '<br>';
echo $diff1=strtotime($str)-strtotime($str1);
?>