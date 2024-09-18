<?php		
	include 'classes/Config.php';
	$con=new Config;
	$conn=$con->createCon();
	$sql="Select userid from user_master";
	$res=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($res))
	{
		$id=$row['userid'];
		$id_enc=md5($row['userid']);
		$sql1="Insert into user_id_enc(id,id_enc) values('".$id."','".$id_enc."')";
		mysqli_query($conn,$sql1);
	}
?>