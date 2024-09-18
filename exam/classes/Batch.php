<?php
	class Batch
	{
		var $var;

		// Create question
		function createBatch($con,$batchName,$startTime,$endTime)
		{
			if(!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql="Insert into batch_master(batch_id,start_time,report_time,status) values('".$batchName."','".$startTime."','".$endTime."','Y')";
			//echo $sql;
			//mysqli_query($con,$sql);
			if(mysqli_query($con, $sql))
			{
				echo "Batch created !!!";
			}
		}
		
		// Update question
		function updateBatch()
		{
		}
		
		// Delete question
		function deleteBatch()
		{
		}
		function getBatch($con)
		{
			$sql="Select * from batch";
			return mysqli_query($con,$sql);
		}
	}
?>