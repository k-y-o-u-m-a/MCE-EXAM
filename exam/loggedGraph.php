<?php

//including FusionCharts PHP Wrapper
//include 'classes/Config.php';
include 'fusioncharts/fusioncharts.php'; 

//Establish connection with the database
//$dbhandle = mysqli_connect($hostdb, $userdb, $passdb, $namedb);

?>
<html>
<head>
<title>Dash Board</title>
<!-- FusionCharts Core Package File -->
<script src="fusioncharts/js/fusioncharts.js"></script> 
<script type="text/javascript" src="fusioncharts/js/elegant.js"></script>
      
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
</head>
  
<?php

//SQL Query for the Parent chart.
//$strQuery = "Select um.userid,um.SName,um.Address,um.exam_center_address,um.lock_login,us.time_left from user_master um,user_session us where md5(um.userid)=us.session_id && um.online='Y'";
$strQuery = "Select um.userid,um.SName,um.Address,um.exam_center_address,um.lock_login,us.time_left from user_master um,user_session us where md5(um.userid)=us.session_id && um.online='Y'";
//Execute the query, or else return the error message.
$result1 = mysqli_query($conn,$strQuery) or exit("Error code ({$conn->errno}): {$conn->error}");

//If the query returns a valid response, preparing the JSON array.
//if ($result=mysqli_fetch_array($result1))
//{
	//`$arrData` holds the Chart Options and Data.
	$arrData=array(
        "chart" => array(
            "caption" => "Logged Candidate",
            "xAxisName"=> "Candidate",
            "yAxisName"=> "Time Left",
            "paletteColors"=> "#1FD6D1",
            "yAxisMaxValue"=> "90",
            "baseFont"=> "Open Sans",
            "theme" => "elegant"
            
        )
    );
    
    //Create an array for Parent Chart.
    $arrData["data"] = array();
    
    // Push data in array.
    while ($row = mysqli_fetch_array($result1))
	{
        array_push($arrData["data"], array(
            "label" => $row["userid"],
            "value" => $row["time_left"],
            "link"  => "newchart-json-" . $row["userid"]
        ));
        
    }
            
        $jsonEncodedData = json_encode($arrData, JSON_PRETTY_PRINT);
        
        $columnChart = new FusionCharts("column2d", "myFirstChart" , "75%", "200", "linked-chart", "json", "$jsonEncodedData"); 
        
        $columnChart->render();    //Render Method
             
        $conn->close(); //Closing DB Connection
//    }
//}
//}
?> 

     <body>
     <!-- DOM element for Chart -->
     <?php echo "<script type=\"text/javascript\" >
			   FusionCharts.ready(function () {
			FusionCharts('myFirstChart').configureLink({     
			overlayButton: {            
			message: 'Back',
			padding: '13',
			fontSize: '16',
			fontColor: '#F7F3E7',
			bold: '0',
			bgColor: '#22252A',           
			borderColor: '#D5555C'         }     });
			 });
			</script>" 
?>
         <center><div id="linked-chart"></div></center>
         
      </body>
</html>