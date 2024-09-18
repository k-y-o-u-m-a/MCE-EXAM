<?php
	class Logout
	{
		// Create question
		function userAuthentication($con,$userid,$password)
		{
			$sql="Select * from user_master where userid='".$userid."' && password='".$password."'";
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
	}
?>