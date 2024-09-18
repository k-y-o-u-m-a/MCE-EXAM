<?php
	class Examination
	{
		var $var;

		// Create examination
		function createExamination($con,$examName,$start,$end,$totQue,$negMark,$batch,$module,$totTime,$bilingual,$status)
		{
			if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql="Insert into exam(exam_name,start_date,end_date,total_que,negative_mark,batch,module,total_time,bilingual,status) values('".$examName."','".$start."','".$end."','".$totQue."','".$negMark."','".$batch."','".$module."',".$totTime.",'".$bilingual."','N')";
			//echo $sql;
			//mysqli_query($con,$sql);
			if(mysqli_query($con, $sql))
			{
				echo "Question saved successfully !!!";
			}
			else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}
		
		// Update examination
		function updateExamination($con,$id,$examName,$start,$end,$totQue,$negMark,$batch,$module,$totTime,$bilingual,$status)
		{
			if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql="Update exam SET exam_name='".$examName."',start_date='".$start."',end_date='".$end."',total_que='".$totQue."',batch='".$batch."',module='".$module."',total_time=".$totTime.",bilingual='".$bilingual."',status='".$status."' where id=".$id;
			//echo $sql;
			//mysqli_query($con,$sql);
			if(mysqli_query($con, $sql))
			{
				echo "Question saved successfully !!!";
			}
			else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}
		
		// Delete examination
		function deleteExamination($id)
		{
		}
		
		// Get question
		function getExam($con)
		{
			$sql="Select * from exam";
			return mysqli_query($con,$sql);
		}
		
		// Get question details
		function getExamDetail($con,$id)
		{
			$sql="Select * from exam where id=".$id;
			return mysqli_query($con,$sql);
		}
	}
?>