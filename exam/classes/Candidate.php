<?php
	class Candidate
	{		
		// Upload question
		function uploadCandidate($conn,$tempFile)
		{
			if(is_uploaded_file($tempFile))
			{
			//echo "<h1>"."File ".$_FILES['fileToUpload']['name']." uploaded successfully."."</h1>";
			//echo "<h2>Displaying contents:</h2>";
			//readfile($tempFile);
			}
			$handle=fopen($tempFile,"r");

			while(($data=fgetcsv($handle,1000,",")) !== FALSE)
			{
				mysqli_query($conn,'SET character_set_results=utf8');
				mysqli_query($conn,'SET names=utf8');
				mysqli_query($conn,'SET character_set_client=utf8');
				mysqli_query($conn,'SET character_set_connection=utf8');
				mysqli_query($conn,'SET character_set_results=utf8');
				mysqli_query($conn,'SET collation_connection=utf8_general_ci');
				
				$a=mysqli_real_escape_string($conn,$data[0]);
				
				$b=mysqli_real_escape_string($conn,$data[1]);
				$c=mysqli_real_escape_string($conn,$data[2]);
				$d=mysqli_real_escape_string($conn,$data[3]);
				$e=mysqli_real_escape_string($conn,$data[4]);
				$f=mysqli_real_escape_string($conn,$data[5]);
				$g=mysqli_real_escape_string($conn,$data[6]);
				$h=mysqli_real_escape_string($conn,$data[7]);
				$i=mysqli_real_escape_string($conn,$data[8]);
				$j=mysqli_real_escape_string($conn,$data[9]);
				$k=mysqli_real_escape_string($conn,$data[10]);
				$l=mysqli_real_escape_string($conn,$data[11]);
				$m=mysqli_real_escape_string($conn,$data[12]);
				$n=mysqli_real_escape_string($conn,$data[13]);
				$o=mysqli_real_escape_string($conn,$data[14]);
				$p=mysqli_real_escape_string($conn,$data[15]);
				$q=mysqli_real_escape_string($conn,$data[16]);
				$r=mysqli_real_escape_string($conn,$data[17]);
				$s=mysqli_real_escape_string($conn,$data[18]);
				$u='N';
				$v='N';
				$import="INSERT into user_master(Formno,userid,password,Exam_name,SName,FName,S_mother,Address,State,Pincode,Email_id,Contact_no,DOB,Gender,Qualification,Category,reg_no,module,user_img,online,lock_login) values('$a',upper('$b'),upper('$c'),'$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$u','$v')";
				mysqli_query($conn,$import) or die(mysql_error());
			}
			fclose($handle);
		}	
	}
?>