<?php
	class Config
	{
		var $servername = "localhost";
		var $username = "root";
		var $password = "";
		//var $database="cdpo_test";
		//var $database="hindi_diwas";
		//var $database="exam_final_ict";
		//var $database="exam_final_ict_feb_2018";
		//var $database="entrance_test";
		//var $database="ece_summer_exam";
		 //var $database="examccc";
		var $database="exam";
		//var $database="entrance_test_jan_18";
		//var $database="java_final_exam";
				
//var $database="worldskill";
//var $database="tally_test";
//var $database="phps";
//var $database="entrance_test_ict_minority"; 
//var $database="entrance_test_bihta";
//var $database="entrance_test_bihta_23_08_2018";
//var $database="yskillexam";
//var $database="entrance_test_min_11_09_2018";
//var $database="cybersiksha";
//var $database="adhns27012020";
//var $database="testyskill";



		
		var $conn="";

		// Create connection
		function createCon()
		{
			$this->conn=mysqli_connect($this->servername,$this->username,$this->password,$this->database);
			if (!$this->conn)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			else
			{
				return $this->conn;
			}
		}
		// Close connection
		function closeCon()
		{
			if (!$this->conn)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
		}
	}
?>