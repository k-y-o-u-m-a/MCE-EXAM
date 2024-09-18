<?php
	session_start();
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
	include 'classes/UserSession.php';
	$myfile = fopen("userlog/log.csv", "a") or die("Unable to open file!");
	if(!isset($_SESSION['id']))
	{
		header("location:index.php");
	}
	$con=new Config;
	$conn=$con->createCon();
	$lockedSql="Select * from exam_result where candidate_id='".$_SESSION['id']."'";
	$res=mysqli_query($conn,$lockedSql);
	if($row=mysqli_fetch_array($res))
	if($row['candidate_id']==$_SESSION['id'])
	{
		header("location:examDetail.php");
	}
	if(isset($_REQUEST['finish']))
	{
		$con=new Config;
		$conn=$con->createCon();
		$totAttempt=0;
		$rightAns=0;
		$notAttempt=0;
		$totMark=0;
		$wrongAns=0;
		$negMark=0.25;
		$gTotal=0;
		
		$array=array();
		
		if(!isset($_SESSION['id']))
			$_SESSION['id']=$_REQUEST['regNo'];
		$myfile = fopen("userlog/log.csv", "a") or die("Unable to open file!");
		

		for($i=0;$i<$_SESSION['total_que'];$i++)
		{
			if(isset($_REQUEST['userAns'.$i]))
			{
				$txt = $i.",".$_SESSION['id'].",".md5($_SESSION['id']).",".$_REQUEST['userAns'.$i].",".$_REQUEST['correctAnswer'.$i].",".$_REQUEST['qId'.$i].PHP_EOL;
				//$txt=nl2br($txt);
				fwrite($myfile, $txt);
				
				//echo $_REQUEST['userAns'.$i].$_REQUEST['correctAnswer'.$i].'<br>';
				$totAttempt++;
				//$array[$i]=$_REQUEST['userAns'.$i];
				$array[$_REQUEST['qId'.$i]]=$_REQUEST['userAns'.$i];
				if($_REQUEST['correctAnswer'.$i]==$_REQUEST['userAns'.$i])
				{
					$rightAns=$rightAns+1;
				}
				if($_REQUEST['correctAnswer'.$i]!=$_REQUEST['userAns'.$i])
				{
					$wrongAns=$wrongAns+1;
				}
			}
		}
		fclose($myfile);//File Close
		if(!isset($_SESSION['id']))
			$_SESSION['id']=$_REQUEST['regNo'];
		$candId=$_SESSION['id'];
		$module=$_REQUEST['module'];
		$totQue=$_REQUEST['totalQuestion'];

		$totMark=$rightAns*1;
		$negMark=$wrongAns*$_SESSION['negativeMark'];
		$notAttempt=$totQue-$totAttempt;
		$gTotal=$totMark-$negMark;
		$candAns=mysql_escape_string(serialize($array));
		$examDate=date("d-m-Y");
		$examResult=new ExamResult;
		$examResult->evaluateExamResult($conn,$candId,$module,$totQue,$candAns,$totAttempt,$notAttempt,$totMark,$negMark,$gTotal,$examDate);
		$con->closeCon();
		header("location:examDetail.php?regNo=".$_REQUEST['regNo'].'&&session='.md5($_REQUEST['regNo']));
	}
	
	$sqlModule="Select * from exam where status='Y' && module='".$_REQUEST['moda']."'"; // Exam Module
	$resMod=mysqli_query($conn,$sqlModule);
	while($row=mysqli_fetch_array($resMod))
	{
		$_SESSION['module']=$row['module'];
		$_SESSION['total_que']=$row['total_que'];
		$_SESSION['totalTime']=$row['total_time'];// Session Variable
		$_SESSION['negativeMark']=$row['negative_mark'];// Session Variable
	}
	
	$sqlUser="Select * from user_master where userid='".$_SESSION['id']."' && module='".$_SESSION['module']."'"; // User Module
	$resUser=mysqli_query($conn,$sqlUser);
	while($row=mysqli_fetch_array($resUser))
	{
		$_SESSION['userName']=$row['SName'];// Session Variable
		$_SESSION['regNo']=$row['userid'];// Session Variable
		$_SESSION['regNo1']=$row['reg_no'];// Session Variable
	}
	
	$lockLogin="Update user_master SET lock_login='Y',online='Y' where userid='".$_SESSION['id']."'";
	$resUser=mysqli_query($conn,$lockLogin);
	
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
<title><?php echo $_SESSION['exam_name'];?></title>
</head>

<body onLoad="setTime();">
<form action="" method="post">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-sm-12">
        		<?php include 'common/header.html';?>
			</div>
            <br>
            <div class="col-sm-12" style="text-align:center;">
				<b><a href="javascript:void(0);"><?php echo $_SESSION['exam_name'];?></a></b>
            </div>
			<div class="col-sm-12">
            	<div class="col-sm-2">
					<ul class="pagination">
        				<li>
                        <a href="javascript:void(0);"><?php echo $_SESSION['userName'];?></a>
                        </li>
					</ul>
				</div>
                <div class="col-sm-2">
					<ul class="pagination">
        				<li class="">
						<a href="javascript:void(0);"><?php echo $_SESSION['regNo1'];?></a>
						</li>
					</ul>
				</div>
                <div class="col-sm-3">
					<ul class="pagination">
        				<li class="">
                        <a href="javascript:void(0);">
							Total Time :<?php echo $_SESSION['totalTime'].' Minutes';?>
                        </a>
                        </li>
					</ul>
				</div>
                <div class="col-sm-3">
					<ul class="pagination">
        				<li class=""><a id="timer" href="javascript:void(0);" style="color:#F00;"></a></li>
                        <li class=""><a id="countdown" href="javascript:void(0);" style="color:#F00;">60</a></li>
					</ul>
				</div>
                <div class="col-sm-2">
					<ul class="pagination">
        				<li class="">
						<button type="button" id="finish1" class="btn btn-primary" name="finish1" value="" style="background-color:#009933;" onClick="finish_exam();">End Exam</button>
                        <button type="submit" id="finish" class="btn btn-primary" name="finish" value="" style="background-color:#009933; display:none;">End Exam</button>
						</li>
					</ul>
				</div>
			</div>
<?php
	mysqli_query($conn,'SET character_set_results=utf8');
	mysqli_query($conn,'SET names=utf8');
	mysqli_query($conn,'SET character_set_client=utf8');
	mysqli_query($conn,'SET character_set_connection=utf8');
	mysqli_query($conn,'SET character_set_results=utf8');
	mysqli_query($conn,'SET collation_connection=utf8_general_ci');
	
	$secSql="Select * from module_section where module=".$_SESSION['module'];
	$secSql=mysqli_query($conn,$secSql);
	$arraySec=array();
	$arrayWeightage=array();
	
	while($secRow=mysqli_fetch_array($secSql))
	{
	$sql="Select * from question where module='".$_SESSION['module']."' && status='Y' && module_section='".$secRow['section']."' Order By RAND() Limit ".$secRow['weightage']; // Question Module
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	echo $sql;
	//echo $count;
	$i=1;
	$j=0;
	$userAns=0;
	$activeDiv="";
	while($row=mysqli_fetch_array($res))
	{
		$sqlAns="Select * from user_answer where session_id='".md5($_SESSION['id'])."' && que_id=".$row['qId']." Order By q_no ASC"; // User Answer Session
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
				$arr=explode('.' , $row['ques_img']);
				$num=sizeof($arr);
				$type=strtoupper($arr[$num-1]);
				if($type == 'JPEG' || $type == 'JPG' || $type == 'PNG' || $type == 'GIF')
				{
				if(getimagesize($ques))
				{
				?>
            	<img src="<?php echo $ques;?>" width="100" height="100" class="img-rounded">
				<?php
				}
				}

				?>
                </p>

            </div>
            <?php $userAnswer=$userAns[$i]; ?>
            <div class="col-sm-12" style="font-size:17px;">
				<input type="radio" id="userAns1<?php echo $userAns; ?>" name="userAns<?php echo $userAns; ?>" value="A" <?php if($savedAns=='A') echo 'checked';?> onClick="saveAns(<?php echo $userAns; ?>,this.value);">
				<?php echo $row['option1'];?>
                <br>
                <?php echo $row['option1_hindi'];?>
            </div>
            <div class="col-sm-12" style="font-size:17px;">
				<input type="radio" id="userAns2<?php echo $userAns; ?>" name="userAns<?php echo $userAns; ?>" value="B" <?php if($savedAns=='B') echo 'checked';?> onClick="saveAns(<?php echo $userAns; ?>,this.value);">
				<?php echo $row['option2'];?>
                <br>
                <?php echo $row['option2_hindi'];?>
            </div>
            <div class="col-sm-12" style="font-size:17px;">
				<input type="radio" id="userAns3<?php echo $userAns; ?>" name="userAns<?php echo $userAns; ?>" value="C" <?php if($savedAns=='C') echo 'checked';?> onClick="saveAns(<?php echo $userAns; ?>,this.value);">
				<?php echo $row['option3'];?>
                <br>
                <?php echo $row['option3_hindi'];?>
            </div>
            <div class="col-sm-12" style="font-size:17px;">
				<input type="radio" id="userAns4<?php echo $userAns; ?>" name="userAns<?php echo $userAns; ?>" value="D" <?php if($savedAns=='D') echo 'checked';?> onClick="saveAns(<?php echo $userAns; ?>,this.value);">
				<?php echo $row['option4'];?>
                <br>
                <?php echo $row['option4_hindi'];?>
            </div>
            <div class="col-sm-4" style="text-align:center;">
            <button type="button" class="btn btn-primary" onClick="clickNext(<?php echo $i;?>,<?php echo $count;?>)">Confirm</button>
            <button type="button" class="btn btn-primary" onClick="delAns(<?php echo $userAns; ?>,this.value);">Reset</button>
            </div>
            
            <div class="col-sm-4" style="text-align:center;">
           	<button type="button" class="btn btn-primary" onClick="clickPrev(<?php echo $i;?>,<?php echo $count;?>)">Previous</button>
            <button type="button" class="btn btn-primary" onClick="clickNext(<?php echo $i;?>,<?php echo $count;?>)">Next</button>
            </div>
            <div class="col-sm-4">
            
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
			alert('Time elapsed !!! Kindly finish your exam !!!');
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
		xmlhttp.open("GET","delUserAns.php?qNo="+qNo+"&qValue="+qValue+"&correct_answer="+correct_answer+"&que_id="+que_id,true);
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
<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</form>
</body>
</html>