<?php
	session_start();
	if(isset($_SESSION['center_id']))
	{
		session_unset();
		session_destroy();
		header("location:centerLogin.php");
	}
	else
	{
		header("location:centerHome.php");
	}
?>