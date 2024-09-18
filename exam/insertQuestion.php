<?php
	session_start();
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
	$con=new Config;
	$conn=$con->createCon();
	
	$chk="Select count(*) from user_answer where user_id='".$_SESSION['id']."'";
	$resChk=mysqli_query($conn,$chk);
	$rowChk=mysqli_fetch_array($resChk);
	if($rowChk['count(*)'] == 0)
	{
	$secSql="Select * from module_section where module=".$_REQUEST['moda'];
	$secSql=mysqli_query($conn,$secSql);
	$i=0;
	while($secRow=mysqli_fetch_array($secSql))
	{
		//$sql="Select * from question where module='".$_REQUEST['moda']."' && status='Y' && module_section='".$secRow['section']."' Order By RAND() Limit ".$secRow['weightage']; // Question Module
$sql="Select * from question where module='".$_REQUEST['moda']."' && status='Y' && module_section='".$secRow['section']."' && qId NOT IN(SELECT que_id FROM user_answer WHERE user_id = '".$_SESSION['id']."') Order By RAND() Limit ".$secRow['weightage'];
		//$sql="SELECT * FROM questions WHERE question_id NOT IN (SELECT question_id FROM student_answers WHERE student_id = '5') ORDER BY RAND() LIMIT 10;";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($res))
		{
			$ins="INSERT INTO `user_answer`(`user_id`,`session_id`, `q_no`,`right_answer`,`que_id`,`sec_id`) VALUES ('".$_SESSION['id']."','".md5($_SESSION['id'])."',".$i.",'".$row['correct_answer']."',".$row['qId'].",".$secRow['section'].")";
			mysqli_query($conn,$ins);
			//echo $ins.$secRow['section'].'<br>';
			$i++;
		}
	}
	}
header("location:candidateHome.php?regNo=".$_SESSION['id']."&&sessionId=".md5($_SESSION['id'])."&&moda=".$_REQUEST['moda']);
?>