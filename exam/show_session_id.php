<?php		
	include 'classes/Config.php';
	$con=new Config;
	$conn=$con->createCon();
	$sql="Select * from user_answer";
	$res=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($res))
	{
		$id=$row['session_id'];
		$q_no=$row['q_no'];
		$user_ans=$row['user_ans'];
		$right_ans=$row['right_answer'];
		echo $id.' '.$q_no.' '.$user_ans.' '.$right_ans;
		echo '<br>';
	}
?>