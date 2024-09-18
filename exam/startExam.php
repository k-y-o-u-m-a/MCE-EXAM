<?php
	session_start();
	include 'classes/Config.php';
	$con=new Config;
	$conn=$con->createCon();
	$lockedSql="Select * from exam_result where candidate_id='".$_SESSION['id']."'";
	$res=mysqli_query($conn,$lockedSql);
	if($row=mysqli_fetch_array($res))
	if($row['lock_exam']=='Y')
	{
		header("location:examDetail.php");
	}
	if(isset($_REQUEST['start']))
	{
		header("location:candidateHome.php");	
	}
	$lockedSql="Select * from user_master where userid='".$_SESSION['id']."'";
	$res=mysqli_query($conn,$lockedSql);
	$row=mysqli_fetch_array($res);
		$_SESSION['exam_module']=$row['module'];
		
	$lockedSql="Select * from exam where module='".$_SESSION['exam_module']."'";
	$res1=mysqli_query($conn,$lockedSql);
	$row1=mysqli_fetch_array($res1);
		$_SESSION['exam_name']=$row1['exam_name'];

include("common/header.php");

?>

<script>
	function changeStat()
	{
		if(document.getElementById('agree').checked == true)
			document.getElementById('agree_btn').style.display='block';
		if(document.getElementById('agree').checked == false)
			document.getElementById('agree_btn').style.display='none';
		
	}
</script>
<script>
	function myFun(t)
	{
		if(t > 0)
		setInterval(function(){window.location.href='startExam.php'; }, 1000);
	}
</script>
<?php
date_default_timezone_set("Asia/Kolkata");
$sqlz="Select login_time from batch_master where batch_id IN(Select batch from user_master where userid='".$_SESSION['id']."')";
$resz=mysqli_query($conn,$sqlz);
$rowz=mysqli_fetch_array($resz);
$b=$rowz['login_time'];

$sqly1="Select exam_date from user_master where userid='".$_SESSION['id']."'";
$resy1=mysqli_query($conn,$sqly1);
$rowy1=mysqli_fetch_array($resy1);
$d=$rowy1['exam_date'];
//$d=date('d-m-Y');
$batch_time=strtotime($d.' '.$b);
//$batch_time=strtotime('11-08-2016 15:45:00');
$login_time=strtotime(date('d-m-Y H:i:s'));

//echo $d.' '.$b.'<br>';
//echo date('d-m-Y H:i:s');

//echo 'Batch-'.$batch_time.'<br>';
//echo 'Login-'.$login_time.'<br>';
$tot=$batch_time+90;
$diff = $batch_time - $login_time;
//$diff=0;
//echo $diff;
?>
  <body onLoad="myFun(<?php echo $diff; ?>);">
  
<table width="100%" align="center"><tr><td align="center">
<img src="image/BELTRON.jpg"></td></tr></table>
    <div class="form1" style="margin-top:-5px;">
      
     <!-- <ul class="tab-group">
        <li class="tab active" style="width:1050px;"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>-->
      
      <div class="tab-content">
      <form action="insertQuestion.php?regNo=<?php echo $_SESSION['id'].'&&sessionId='.md5($_SESSION['id']).'&&moda='.$_SESSION['exam_module'];?>" method="post">
        <div id="signup">   
          <h1 style="color:#F00;"><strong>Candidate Details</strong></h1>
          
          <table border="0" width="100%">
          	<tr><td><font color="#FFFFFF">Candidate Name</font></td>
            <td><font color="#FFFFFF">-</font></td>
            <td><font color="#FFFFFF"><?php echo $row['SName']; ?></font></td>
           <!-- <td rowspan="4"><img src="<?php echo 'user_img/'.$row['user_img']; ?>" width="108" height="132"></td></tr>-->
           <td rowspan="4"><img src="<?php echo 'sign/'.$row['user_img']; ?>" width="100" height="100"></td></tr>
            <tr><td><font color="#FFFFFF">Father Name</font></td>
            <td><font color="#FFFFFF">-</font></td><td><font color="#FFFFFF"><?php echo $row['FName']; ?></font></td></tr>
            <tr><td><font color="#FFFFFF">Date of Birth</font></td>
            <td><font color="#FFFFFF">-</font></td><td><font color="#FFFFFF"><?php echo $row['DOB']; ?></font></td></tr>
            <tr><td><font color="#FFFFFF">Roll Number</font></td><td><font color="#FFFFFF">-</font></td><td><font color="#FFFFFF"><?php echo $row['reg_no']; ?></font></td></tr>
            <tr><td colspan="3">&nbsp;</td></tr>
           <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">&nbsp;</td></tr>
<?php
//$diff <= 0
if($diff <= 0)
{
?>   
            <tr><td colspan="4" align="center">
            <button type="submit" id="start" name="start" class="button button-block"/>Start Exam</button></td></tr>
<?php
}
else
{
	//echo $diff;
?>
		<tr align="center">
        	<td></td>
        	<td>
            <h2 style="color:#F00;"><?php echo '<b>Time Left :'.gmdate("H:i:s", $diff).'</b>';?></h2>
            </td>
		</tr>
<?php
}
?>
            <tr><td colspan="3">&nbsp;</td></tr>
          </table>
        </div>
        
        <!--<div id="login">   
          <h1>Validate Mobile!</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Mobile No <span class="req">*</span>
            </label>
            <input type="tel"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              OTP<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off"/>
          </div>
          
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>-->
        
      </div><!-- tab-content -->
      </form>
<?php include("common/footer.php"); ?>
