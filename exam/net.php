<?php
	$connected = @fsockopen("192.168.10.25", 80);
	if($connected)
	{
		echo "Connected...";
	}
	else
	{
		echo "Not Connected...";
	}
	


	$response = null;
	system("ping www.google.com", $response);
	if($response == 0)
	{
		echo $response.'Connected...';
	}
?>