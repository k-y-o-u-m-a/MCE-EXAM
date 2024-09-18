<?php
	include 'classes/Config.php';
	$obj=new Config;
	$conn=$obj->createCon();
	if(isset($_REQUEST['save']))
	{
		$user=$_REQUEST['user'];
		$userEnc=md5($_REQUEST['user']);
		
		$sql="UPDATE `user_master` SET `lock_login` = 'N' WHERE `userid`='".$user."'";
		mysqli_query($conn,$sql);
		
		$sql1="UPDATE `user_session` SET `time_left` = '89' WHERE `session_id`='".$userEnc."'";
		mysqli_query($conn,$sql1);
		
		$sql2="DELETE FROM `exam_result` WHERE `candidate_id`='".$user."'";
		mysqli_query($conn,$sql2);
	}
?>
<form action="" method="post">
<input value="" type="text" name="user" required />
<input type="submit" name="save" value="Reset" />
</form>
          
