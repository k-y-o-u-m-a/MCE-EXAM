<?php
	class Title
	{		
		// Get All Exam Details
		function getTitle($conn,$mod)
		{
			$sql="Select * from exam where module='".$mod."'";
			$res=mysqli_query($conn,$sql);
			if($row=mysqli_fetch_array($res))
				return $row['exam_name'];
		}	
	}
?>