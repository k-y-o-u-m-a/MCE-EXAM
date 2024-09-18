<?php
	include 'classes/Config.php';
	$con=new Config;
	$conn=$con->createCon();
	//$array=array();

	$sql="Select * from exam_result";
	$rs=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_object($rs))
	{
		echo $row->candidate_id;
		echo '<br>';
		$arr=$row->candidate_ans;
		//print_r($arr);
		$myarr=unserialize($arr);
		$i=0;
		foreach($myarr as $a => $a_value)
		{
			//echo $a.' '.$a_value;
			$sql1="Insert into user_answer(q_no,user_id,session_id,user_ans,que_id) values('".$i."','".$row->candidate_id."','".md5($row->candidate_id)."','".$a_value."','".$a."')";
			mysqli_query($conn,$sql1);
			$i++;
		}
	}
	$sqlQue="Select DISTINCT que_id from user_answer";
	$rs1=mysqli_query($conn,$sqlQue);
	while($rowQue=mysqli_fetch_array($rs1))
	{
		$sqlQueId="Select * from question where qId=".$rowQue['que_id'];
		$rs2=mysqli_query($conn,$sqlQueId);
		while($rowQue1=mysqli_fetch_array($rs2))
		{
			$updQid="Update user_answer SET right_answer='".$rowQue1['correct_answer']."' where que_id='".$rowQue['que_id']."'";
			mysqli_query($conn,$updQid);
		}
	}
?>