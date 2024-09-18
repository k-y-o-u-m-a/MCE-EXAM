<?php
	class Question
	{
		var $var;

		// Create question
		function createQuestion($con,$modName,$questionDesc,$option1,$option2,$option3,$option4,$answerType,$answer,$bilingual,$status)
		{
			if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql="Insert into question(module,que_desc,option1,option2,option3,option4,answer_type,correct_answer,bilingual,creation_ip,status) values('".$modName."','".$questionDesc."','".$option1."','".$option2."','".$option3."','".$option4."','".$answerType."','".$answer."','".$bilingual."','".$_SERVER['REMOTE_ADDR']."','".$status."')";
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
		
		// Update question
		function updateQuestion($con,$modName,$questionDesc,$option1,$option2,$option3,$option4,$answerType,$answer,$status,$id)
		{
			$sql="Update question SET module='".$modName."',que_desc='".$questionDesc."',option1='".$option1."',option2='".$option2."',option3='".$option3."',option4='".$option4."',status='".$status."',answer_type='".$answerType."',correct_answer='".$answer."' where qId=".$id;
			//echo $sql;
			mysqli_query($con,$sql);
		}
		
		// Delete question
		function deleteQuestion()
		{
		}
		
		// Get question
		function getQuestion($con,$created)
		{
			mysqli_query($con,'SET character_set_results=utf8');
			mysqli_query($con,'SET names=utf8');
			mysqli_query($con,'SET character_set_client=utf8');
			mysqli_query($con,'SET character_set_connection=utf8');
			mysqli_query($con,'SET character_set_results=utf8');
			mysqli_query($con,'SET collation_connection=utf8_general_ci');
			//$sql="Select * from question";
			$sql="Select * from question where created_by='".$created."'";
			return mysqli_query($con,$sql);
		}
		
		// Get question details
		function getQuestionDetail($con,$id)
		{
			$sql="Select * from question where qId=".$id;
			return mysqli_query($con,$sql);
		}
		
		// Upload question
		function uploadQuestion($conn,$tempFile,$created)
		{
			if(is_uploaded_file($tempFile))
			{
			//echo "<h1>"."File ".$_FILES['fileToUpload']['name']." uploaded successfully."."</h1>";
			//echo "<h2>Displaying contents:</h2>";
			//readfile($tempFile);
			}
			$handle=fopen($tempFile,"r");
			$i=0;
			while(($data=fgetcsv($handle,1000,",")) !== FALSE)
			{
				mysqli_query($conn,"SET NAMES 'utf8'");
				mysqli_query($conn,'SET character_set_results=utf8');
				mysqli_query($conn,'SET names=utf8');
				mysqli_query($conn,'SET character_set_client=utf8');
				mysqli_query($conn,'SET character_set_connection=utf8');
				mysqli_query($conn,'SET character_set_results=utf8');
				mysqli_query($conn,'SET collation_connection=utf8_general_ci');
				mysqli_set_charset($conn,'utf8');
				$module=mysqli_real_escape_string($conn,$data[0]);
				$module_section=mysqli_real_escape_string($conn,$data[1]);
				$img_stat=mysqli_real_escape_string($conn,$data[2]);
				$que_desc=mysqli_real_escape_string($conn,$data[3]);
				$que_desc1=mysqli_real_escape_string($conn,$data[4]);
				
				$option1=mysqli_real_escape_string($conn,$data[5]);
				$option11=mysqli_real_escape_string($conn,$data[6]);
				
				$option2=mysqli_real_escape_string($conn,$data[7]);
				$option22=mysqli_real_escape_string($conn,$data[8]);
				
				$option3=mysqli_real_escape_string($conn,$data[9]);
				$option33=mysqli_real_escape_string($conn,$data[10]);
				
				$option4=mysqli_real_escape_string($conn,$data[11]);
				$option44=mysqli_real_escape_string($conn,$data[12]);
				
				$correct_answer=strtoupper(trim(mysqli_real_escape_string($conn,$data[13])));
				$ques_img=mysqli_real_escape_string($conn,$data[14]);
				$status=mysqli_real_escape_string($conn,$data[15]);
				$answer_type='single';
				$bilingual='N';
				//$created=$_REQUEST['user'];
				//$status='Y';
				if($que_desc !='' || $option1 !='' || $option2 !='' || $option3 !='' || $option4 !='' || $correct_answer !='')
				{
				if($correct_answer == 'A' || $correct_answer == 'B' || $correct_answer == 'C' || $correct_answer == 'D')
				{
					if(($option1 != $option2 || $option3 || $option4) || ($option2 != $option1 || $option3 || $option4) || ($option3 != $option1 || $option2 || $option4) || ($option4 != $option2 || $option3 || $option1))
					{
				$import="INSERT into question(module,module_section,que_desc,que_hindi,option1,option1_hindi,option2,option2_hindi,option3,option3_hindi,option4,option4_hindi,answer_type,correct_answer,ques_img,bilingual,status,img_status,created_by) values('$module','$module_section','$que_desc','$que_desc1','$option1','$option11','$option2','$option22','$option3','$option33','$option4','$option44','$answer_type','$correct_answer','$ques_img','$bilingual','$status','$img_stat','$created')";
				//echo $import;
				mysqli_query($conn,$import) or die(mysql_error());
				$i++;
					}
				}
				}
			}
			fclose($handle);
			return $i;
		}	
		
	}
?>