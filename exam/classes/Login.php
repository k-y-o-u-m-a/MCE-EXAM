<?php
	class Login
	{
		function userAuthentication($con,$userid,$password)
		{
			$sql="Select * from user_master where userid='".$userid."' && password='".$password."' && lock_login='N'";
			$result=mysqli_query($con,$sql);
			
			if(mysqli_num_rows($result) > 0)
			{
				return true;
			}
			else
			{
				return false;	
			}
		}
		
		// Create question
		function centerAuthentication($con,$userid,$password)
		{
			$sql="Select * from center_master where userid='".$userid."' && password='".$password."'";
			$result=mysqli_query($con,$sql);
			
			if(mysqli_num_rows($result) > 0)
			{
				return true;
			}
			else
			{
				return false;	
			}
		}
		function adminAuthentication($con,$userid,$password)
		{
			$sql="Select * from log_user where user='".$userid."' && password='".md5($password)."'";
			//$sql="Select * from log_user where user='".$userid."' && password='".$password."'";
			$result=mysqli_query($con,$sql);
			$num=mysqli_num_rows($result);
			return $num;
		}
	}
?>