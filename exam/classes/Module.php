<?php
	class Module
	{
		var $var;

		// Create question
		function createModule($con,$modName,$modDesc,$tot)
		{
			if(!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql="Insert into module(module_name,module_description,tot_que) values('".$modName."','".$modDesc."',".$tot.")";
			//echo $sql;
			mysqli_query($con,$sql);
		}
		
		// Update question
		function updateModule()
		{
		}
		
		// Delete question
		function deleteModule()
		{
		}
		
		// Delete question
		function getModule($con)
		{
			$sql="Select * from module";
			return mysqli_query($con,$sql);
		}
		function getModuleDetail($con,$mod)
		{
			$sql="Select * from module where module_description=".$mod;
			$res=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($res);
			return $row['module_name'];
		}
	}
?>