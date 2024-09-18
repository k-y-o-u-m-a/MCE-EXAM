<?php
	class UserSession
	{
		// Create Session
		function createCookie($con,$session_id,$total_time,$module,$user_ip)
		{
			ob_start();  
       //Get the ipconfig details using system commond  
       system('ipconfig /all');  
       // Capture the output into a variable  
       $mycomsys=ob_get_contents();  
       // Clean (erase) the output buffer  
       ob_clean();  
       $find_mac = "Physical"; //find the "Physical" & Find the position of Physical text  
       $pmac = strpos($mycomsys, $find_mac);  
       // Get Physical Address  
       $macaddress=substr($mycomsys,($pmac+36),17);
			$sql="Insert into user_session(session_id,total_time,module,login_ip,mac_addr) values('".md5($session_id)."',".$total_time.",".$module.",'".$user_ip."','".$macaddress."')";
			mysqli_query($con,$sql);
		}
		
		// Retrieve Session
		function getCookie($con,$session_id)
		{
			$sql="Select * from user_session where session_id='".md5($session_id)."'";
			$res=mysqli_query($con,$sql);
			if($row=mysqli_fetch_array($res))
				return $row['time_left'];
		}
		// Retrieve Session Name
		function getSessionName($con,$session_id)
		{
			$sql="Select * from user_session where session_id='".md5($session_id)."'";
			$res=mysqli_query($con,$sql);
			if($row=mysqli_fetch_array($res))
				return $row['session_id'];
		}
		// Retrieve Total Time
		function getTotalTime($con,$session_id)
		{
			$sql="Select * from user_session where session_id='".md5($session_id)."'";
			$res=mysqli_query($con,$sql);
			if($row=mysqli_fetch_array($res))
				return $row['total_time'];
		}
		// Retrieve Module
		function getModuleSession($con,$session_id)
		{
			$sql="Select * from user_session where session_id='".md5($session_id)."'";
			$res=mysqli_query($con,$sql);
			if($row=mysqli_fetch_array($res))
				return $row['module'];
		}
	}
?>