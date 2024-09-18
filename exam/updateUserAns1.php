<?php
session_start();
$con=mysqli_connect("localhost","root","","examination");
//$sql="Select * from question where qId =1";
//$res=mysqli_query($con,$sql);
//if(mysqli_num_rows($res) > 0)
//	while($row=mysqli_fetch_assoc($res))
//		echo $row['que_desc'];
$qNo=$_REQUEST['qNo'];
$qValue=$_REQUEST['qValue'];
$sql1="Select user_ans from user_session where session_id='".md5($_SESSION['id'])."'";
$res=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($res))
{
	$fetchArray=unserialize(urldecode($rs['user_ans']));
	foreach($fetchArray as $x => $x_value)
	{
		echo "Key=" . $x . ", Value=" . $x_value;
		echo "<br>";
	}
	$array[$qNo]=$qValue;
	$userAns=mysql_escape_string(serialize($array));
	//if($qNo==0)
	//{
		//$sql2="Update user_session SET user_ans='".$qNo.':'.$qValue."' where session_id='".md5($_SESSION['id'])."'";
	//	}
	//	else
	//	{
	$sql2="Update user_session SET user_ans='".$userAns."' where session_id='".md5($_SESSION['id'])."'";
//	}
mysqli_query($con,$sql2);
}
//echo $_REQUEST['q'];
echo $sql2;
?>