<?php		
	include 'classes/Config.php';
	$con=new Config;
	$conn=$con->createCon();
	$sql="Select * from user_id_enc";
	$res=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($res))
	{
		$id=$row['id'];
		$id_enc=$row['id_enc'];
		$sql1="Update user_answer Set user_id='".$id."' where session_id='".$id_enc."'";
		echo $sql1.'<br>';
		mysqli_query($conn,$sql1);
	}
?>