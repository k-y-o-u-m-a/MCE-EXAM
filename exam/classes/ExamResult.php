<?php
	class ExamResult
	{
		// Create ExamResult
		function evaluateExamResult($conn,$candId,$module,$totQue,$candAns,$totAttempt,$notAttempt,$totMark,$negMark,$gTotal,$examDate)
		{
			$percent=($gTotal/$totQue)*100;
			$grade="";
			if($percent < 50.00)
				$grade='X';
			if($percent >= 50.00 && $percent<=54.99)
				$grade='D';
			if($percent >= 55.00 && $percent<=64.99)
				$grade='C';
			if($percent >= 65.00 && $percent<=74.99)
				$grade='B';
			if($percent >= 75.00 && $percent<=84.99)
				$grade='A';
			if($percent >= 85.00)
				$grade='S';
			$sqlcheck="Select * from exam_result where candidate_id='".$candId."'";
			$rescheck=mysqli_query($conn,$sqlcheck);
		//to change
			
			$cnt=mysqli_num_rows($rescheck);
			if($cnt < 1)
			{
			$sql="Insert into exam_result(candidate_id,module,total_que,candidate_ans,total_attempt,not_attempt,total_mark,neg_mark,gross_total,grade,percent,lock_exam,exam_date) values('".$candId."','".$module."','".$totQue."','".$candAns."','".$totAttempt."','".$notAttempt."','".$totMark."','".$negMark."','".$gTotal."','".$grade."',".$percent.",'Y','".$examDate."')";
			mysqli_query($conn,$sql);
			}
			else
			{
			$sql="Update exam_result SET candidate_id='".$candId."',module='".$module."',total_que=".$totQue.",candidate_ans='".$candAns."',total_attempt=".$totAttempt.",not_attempt=".$notAttempt.",total_mark=".$totMark.",neg_mark=".$negMark.",gross_total=".$gTotal.",grade='".$grade."',percent=".$percent.",lock_exam='Y',exam_date='".$examDate."' where candidate_id='".$candId."'";
			//echo $sql;
			mysqli_query($conn,$sql);
			}
			
		}
		
		// Get Exam Details
		function getExamDetail($conn,$candId)
		{
			$sql="Select * from exam_result where candidate_id='".$candId."'";
			$res=mysqli_query($conn,$sql);
			if($row=mysqli_fetch_array($res))
			{
				return $row['total_que'].','.$row['total_attempt'].','.$row['not_attempt'];
			}
		}
		
		// Get All Exam Details
		function getAllExamDetail($conn)
		{
			$sql="Select * from exam_result";
			$res=mysqli_query($conn,$sql);
			return $res;
		}	
	}
?>