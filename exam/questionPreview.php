<?php

	session_start();
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
	include 'classes/UserSession.php';
	//$myfile = fopen("userlog/log.csv", "a") or die("Unable to open file!");
	if(!isset($_SESSION['id']))
	{
		header("location:index.php");
	}
	$con=new Config;
	$conn=$con->createCon();
		
	$_SESSION['totalTime']=60;
	if(isset($_REQUEST['id']))	
	$_SESSION['module']=$_REQUEST['id'];
	// User Session Start
	$userSession=new UserSession;
	//$userSession->createCookie($conn,$_SESSION['id'],$_SESSION['totalTime'],$_SERVER['REMOTE_ADDR']);
	// User Session End
	$sessionName=$userSession->getSessionName($conn,$_SESSION['id']);
	$timeLeft=$userSession->getCookie($conn,$_SESSION['id']);
	if($sessionName==md5($_SESSION['id']))
		$_SESSION['timeLeft']=$timeLeft;
	else
		$userSession->createCookie($conn,$_SESSION['id'],$_SESSION['totalTime'],$_SESSION['module'],$_SERVER['REMOTE_ADDR']);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<title><?php echo 'Question Preview';?></title>
</head>

<body onLoad="setTime();">
<form action="" method="post">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-sm-12">
        		<?php include 'common/header.html';?>
			</div>
            <div class="col-md-12">
        		<?php include 'common/admin_menu.html';?>
			</div>
            <h2>Preview Question</h2>
			<div class="row">
				<div class="form-group col-lg-4">
					<select class="form-control" name="module" required onChange="window.location='questionPreview.php?id='+this.value;">
						<option selected value="">Select Module</option>
<?php
$mod="Select * from module";
$resMod=mysqli_query($conn,$mod);
while($rowMod=mysqli_fetch_array($resMod))
{
?>
                    	<option value="<?php echo $rowMod['module_description'];?>"><?php echo $rowMod['module_name'];?></option>
<?php
}
?>
					</select>
				</div>
			</div>
<?php
if(isset($_REQUEST['id']))
{
?>
            <div class="col-sm-12" style="text-align:center;">
            </div>
			
<?php
	mysqli_query($conn,'SET character_set_results=utf8');
	mysqli_query($conn,'SET names=utf8');
	mysqli_query($conn,'SET character_set_client=utf8');
	mysqli_query($conn,'SET character_set_connection=utf8');
	mysqli_query($conn,'SET character_set_results=utf8');
	mysqli_query($conn,'SET collation_connection=utf8_general_ci');
	
	$sql="Select * from question where status='Y' && created_by='".$_SESSION['id']."' && module='".$_SESSION['module']."'"; // Question Module
	//echo $sql;
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	
	//echo $count;
	$i=1;
	$j=0;
	$userAns=0;
	$activeDiv="";
	while($row=mysqli_fetch_array($res))
	{
		//echo $row['qId'].'<br>';
		$sqlAns="Select * from user_answer where session_id='".md5($_SESSION['id'])."' && que_id=".$row['qId']." Order By q_no ASC"; // User Answer Session
		//echo $sqlAns.'<br>';
		$resAns=mysqli_query($conn,$sqlAns);
		$savedAns="";
		if($savedRow=mysqli_fetch_array($resAns))
		{
			$savedAns=$savedRow['user_ans'];
		}
		$activeDiv=$i;
		$correct_answer[$userAns]=$row['correct_answer'];
		$que_id[$userAns]=$row['qId'];
		//echo $activeDiv;
?>
		<div id="<?php echo $i;?>" class="col-sm-12" style=" <?php if($i==1){?> display:block;<?php } else{?> display:none;<?php }?>">
            <div class="col-sm-8">
            	<p><b style="color:#F00;">Question <?php echo $i.' of '.$count;?>:</b></p>
            </div>
            <div class="col-sm-12">

            	<p>
                <b style="font-size:18px;">
                <?php echo $row['que_desc'];?>
                <br>
                <?php echo $row['que_hindi'];?>
                </b>
                <?php
$ques='images/'.$row['ques_img'];
//$arr=explode('.' , $row['ques_img']);
//$num=sizeof($arr);
//$type=strtoupper($arr[$num-1]);
//if($type == 'JPEG' || $type == 'JPG' || $type == 'PNG' || $type == 'GIF')
//{
if($row['img_status'] == strtoupper('Y'))
{
?>
            <img src="<?php echo $ques;?>" width="400" height="400" class="img-rounded">
<?php
}
//}

?>
                </p>

            </div>
            <?php $userAnswer=$userAns[$i]; ?>
            <div class="col-sm-12" style="font-size:17px;">
				<b>A . </b><input type="radio" id="userAns1<?php echo $userAns; ?>" name="userAns<?php echo $userAns; ?>" value="A" <?php if($savedAns=='A') echo 'checked';?> onClick="saveAns(<?php echo $userAns; ?>,this.value);">
				<?php echo $row['option1'];?>
                <br>
                <?php echo $row['option1_hindi'];?>
            </div>
            <div class="col-sm-12" style="font-size:17px;">
				<b>B . </b><input type="radio" id="userAns2<?php echo $userAns; ?>" name="userAns<?php echo $userAns; ?>" value="B" <?php if($savedAns=='B') echo 'checked';?> onClick="saveAns(<?php echo $userAns; ?>,this.value);">
				<?php echo $row['option2'];?>
                <br>
                <?php echo $row['option2_hindi'];?>
            </div>
            <div class="col-sm-12" style="font-size:17px;">
				<b>C . </b><input type="radio" id="userAns3<?php echo $userAns; ?>" name="userAns<?php echo $userAns; ?>" value="C" <?php if($savedAns=='C') echo 'checked';?> onClick="saveAns(<?php echo $userAns; ?>,this.value);">
				<?php echo $row['option3'];?>
                <br>
                <?php echo $row['option3_hindi'];?>
            </div>
            <div class="col-sm-12" style="font-size:17px;">
				<b>D . </b><input type="radio" id="userAns4<?php echo $userAns; ?>" name="userAns<?php echo $userAns; ?>" value="D" <?php if($savedAns=='D') echo 'checked';?> onClick="saveAns(<?php echo $userAns; ?>,this.value);">
				<?php echo $row['option4'];?>
                <br>
                <?php echo $row['option4_hindi'];?>
            </div>
            <div class="col-sm-12" style="font-size:17px;">
                <?php echo '<b>Correct Answer : </b> '.$row['correct_answer'];?>
            </div>
            
            <div class="col-sm-6" style="text-align:center;">
<button type="button" class="btn btn-primary" onClick="clickNext(<?php echo $i;?>,<?php echo $count;?>)"><b>Confirm</b></button>
<button type="button" class="btn btn-primary" onClick="delAns(<?php echo $userAns; ?>,this.value);">Reset</button>
            </div>
            <div class="col-sm-6" style="text-align:left;">
<button type="button" class="btn btn-primary" onClick="clickPrev(<?php echo $i;?>,<?php echo $count;?>)">Previous</button>
<button type="button" class="btn btn-primary" onClick="clickNext(<?php echo $i;?>,<?php echo $count;?>)">Next</button>
            </div>
		</div>
        <!--Question Surf Start-->

		<!--Question Surf Ends-->
<input type="hidden" value="<?php echo $row['correct_answer'];?>" name="correctAnswer<?php echo $j;?>">
<input type="hidden" value="<?php echo $row['correct_answer'];?>" name="rightAnswer<?php echo $userAns;?>" id="rightAnswer<?php echo $userAns;?>">
<input type="hidden" value="<?php echo $row['qId'];?>" name="qId<?php echo $userAns;?>" id="qId<?php echo $userAns;?>">
<?php
	$i++;
	$j++;
	$userAns++;
	}
?>
<div id="elapsedTime"></div>
<input type="hidden" value="<?php echo $count;?>" name="totalQuestion">
<input type="hidden" value="<?php echo $_SESSION['module'];?>" name="module">
		<div class="col-sm-8"></div>
		<div class="col-sm-4">
			
		</div>			
            
        <div class="col-sm-12">
			<?php
			for($j=1;$j<=$count;$j++)
			{
			?>
				<ul class="pagination">
					<li class="" style="">
						<a id="<?php echo 'label'.$j;?>" href="javascript:void(0);" style="text-align:center; color:#FFF; background-color:#F00;" onClick="gotoQue(<?php echo $j;?>,this.id);">
							<?php echo $j; ?>
						</a>
					</li>
				</ul>
			<?php
			}
			?>             
		</div>
	</div>
    </div>
<?php
}
?>   
<script type="text/javascript">
	var seconds;
	var temp;
 
	function countdown()
	{
		seconds = document.getElementById('countdown').innerHTML;
		seconds = parseInt(seconds, 10);
 //if(document.getElementById('timer').innerHTML=='Time Left : 0 Mins')
		if (seconds == 0)
		{
			temp = document.getElementById('countdown');
			if(document.getElementById('timer').innerHTML!='Time Left : 0 Mins')
				temp.innerHTML = 59;
			if(document.getElementById('timer').innerHTML=='Time Left : 0 Mins')
				temp.innerHTML = '0 Sec';
			return;
		}
		seconds--;
		temp = document.getElementById('countdown');
		temp.innerHTML = seconds+' Sec';
		timeoutMyOswego = setTimeout(countdown, 1000);
	} 
  
	function clickNext(currentDivId,totQue)
	{
		var activeDiv=currentDivId+1;
		var que=currentDivId-1;
		document.getElementById(activeDiv).style.display='block';
		document.getElementById(currentDivId).style.display='none';
	}
	function clickPrev(currentDivId,totQue)
	{
		//alert(currentDivId);
		var activeDiv=currentDivId-1;
		document.getElementById(activeDiv).style.display='block';
		document.getElementById(currentDivId).style.display='none';
	}
	function gotoQue(currentDivId)
	{
		for (i = 1; i <= <?php echo $count;?>; i++)
		{
			document.getElementById(i).style.display='none';
		}
		//alert(document.getElementById('activeDiv').innerHTML);
		//alert(currentDivId);
		
		document.getElementById(currentDivId).style.display='block';
		//document.getElementById('label'+currentDivId).style.background='#FFFF00';
		//document.getElementById(this.id).style.display='none';
		
	}
	var tot=<?php if($sessionName==md5($_SESSION['id'])){echo $_SESSION['timeLeft']+1;} else{echo $_SESSION['totalTime'];}?>;
	setInterval(setTime, 60000);
	function setTime()
	{
		setQuestion();
		countdown();
		if(tot == 0)
		{
			//alert('Time elapsed !!! Kindly finish your exam !!!');
			//window.location='examDetail.php';
			document.getElementById('finish').click();
		}
		else
		{
			document.getElementById('timer').innerHTML='Time Left : '+ --tot + ' Mins';
			//document.cookie="timeLeft"+tot;
			//window.location="candidateHome.php?tot="+tot;
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
					//alert(tot);
				}
			}
			xmlhttp.open("GET","updateTime.php?q="+tot,true);
			xmlhttp.send();
		}
	}
	function setQuestion()
	{
		for (i = 0; i <= <?php echo $count-1;?>; i++)
		{
			var q_no=i+1;
			if(document.getElementById('userAns1'+i).checked == true)
				document.getElementById('label'+q_no).style.background='#009933';
			if(document.getElementById('userAns2'+i).checked == true)
				document.getElementById('label'+q_no).style.background='#009933';
			if(document.getElementById('userAns3'+i).checked == true)
				document.getElementById('label'+q_no).style.background='#009933';
			if(document.getElementById('userAns4'+i).checked == true)
				document.getElementById('label'+q_no).style.background='#009933';
		}
	}
	function saveAns(qNo,qValue)
	{
		correct_answer=document.getElementById('rightAnswer'+qNo).value;
		que_id=document.getElementById('qId'+qNo).value;
		ques_id=qNo+1;
		document.getElementById('label'+ques_id).style.background='#009933';
		
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				//alert(tot);
			}
		}
		xmlhttp.open("GET","updateUserAns.php?qNo="+qNo+"&qValue="+qValue+"&correct_answer="+correct_answer+"&que_id="+que_id,true);
		xmlhttp.send();
	}
	function delAns(qNo,qValue)
	{
		correct_answer=document.getElementById('rightAnswer'+qNo).value;
		que_id=document.getElementById('qId'+qNo).value;
		ques_id=qNo+1;
		document.getElementById('label'+ques_id).style.background='#F00';
		
		if(document.getElementById('userAns1'+qNo).checked == true)
			document.getElementById('userAns1'+qNo).checked = false;
		if(document.getElementById('userAns2'+qNo).checked == true)
			document.getElementById('userAns2'+qNo).checked = false;
		if(document.getElementById('userAns3'+qNo).checked == true)
			document.getElementById('userAns3'+qNo).checked = false;
		if(document.getElementById('userAns4'+qNo).checked == true)
			document.getElementById('userAns4'+qNo).checked = false;
		
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				//alert(tot);
			}
		}
		xmlhttp.open("GET","a.php?qNo="+qNo+"&qValue="+qValue+"&correct_answer="+correct_answer+"&que_id="+que_id,true);
		xmlhttp.send();
	}
	// Disable Keyboard
	
	document.onkeydown = function (e)
	{
		return false;
	}
</script>
<script language="javascript">
	document.onmousedown=disableclick;
	status="Right Click Disabled";
	function disableclick(event)
	{
		if(event.button==2)
		{
			alert(status);
			return false;    
		}
	}
</script>
<script>
function finish_exam()
{
	var r = confirm("Do you really want to finish your exam ?");
	if(r == true)
	{
		document.getElementById('finish').click();
	}
}
</script>
<script>
$(document).keypress(function(e))
{
	return false;
});
</script>
<script type="text/javascript">
$(document).keydown(function(e))
{
	e.preventDefault();	
};
</script>
<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</form>
</body>
</html>