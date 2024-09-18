<?php
include 'classes/Config.php';
$con=new Config;
$conn=$con->createCon();
//$array=array();

$sql="Select candidate_ans from exam_result";
$rs=mysqli_query($conn,$sql);
while($row=mysqli_fetch_object($rs))
{
	$arr=$row->candidate_ans;
	//print_r($arr);
	$myarr=unserialize($arr);
	foreach($myarr as $a => $a_value)
	{
		echo $a.' '.$a_value;
		echo "<br />";
	}
	echo "<br /><br />";
	 //$str="ADBCACCBACCCCCDBBDCBABCDDACDDCCCDCADCCDCCAACBCBDBCCACCABCDDDBACDDBCDDCCBBAB";
	 //echo strlen($str);
	 /*$element1=$myarr[0];
	 $element2=$myarr[1];
	 //$element3=$myarr[2];
	 echo $element1;
	 echo "<br />";
	 echo $element2;
	 echo "<br />";
	 //echo $element3;*/
	 
}

?>