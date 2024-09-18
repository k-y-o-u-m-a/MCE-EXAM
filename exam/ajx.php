<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<!--Right Panal Start-->
<div class="right_col" id="right_col">
<hr style="margin:0px;">
<div style=" text-align:left; text-indent:5px;">Set of Questions</div>
<hr style="margin:0px;">
<?php
	//echo $_REQUEST['tot'];
	$conn=mysqli_connect("localhost","root","","examination");
	$model=array();
	$sql="Select * from question where module ='1'";
	$array=mysqli_query($conn,$sql);
	
	while($value=mysqli_fetch_array($array))
	{
		$sql1="Select * from question where qId =".$value['qId'];
		$model[]=mysqli_fetch_array(mysqli_query($conn,$sql1));
	}
	shuffle($model);
	$row=count($model);
	
	for($q=1;$q<=5;$q++)
	{
?>
		<a class="btn goto" val="<?php echo $q; ?>" href="javascript:void(0);" style="text-decoration:none;" onClick="Changetotab(<?php echo $q; ?>);">
			<div class="number_box" id="one"><?php echo $q; ?></div>
		</a>
<?php
	}
?>

<!--Ends-->



<!--Middle-->

<form action="" method="post" id="testform" name="f">
	<input type="hidden" name="examstart" value="<?php echo date('d-m-Y H:i:s'); ?>"/>
	<input type="hidden" name="examend" id="examend" />
	<input type="hidden" name="currenttestid" value="<?php 'id'; ?>"/>
	<input type="hidden" name="testcanid"  value="<?php echo 'testcanid'; ?>"/>
    <input type="hidden" id="hrs" value="" name="hr">
    <input type="hidden" id="mins" value="" name="min">
    <input type="hidden" id="secs" value="" name="sec">
<?php
	
?>
<div>
<?php
	if($row == 1)
	{

	}
	else
	{
		$con=1;
		$count=1;
		$totalquestion=0;
		
		foreach ($model as $key => $value)
		{
			//echo $key;
			//mysqli_fetch_row($value);
			$totalquestion++;echo $totalquestion;
?>
		<div align="left" class="inner-div" style=" <?php if($con > 1)echo 'display:none;' ?>" val="<?php echo $con ?>">
			<h4>Question <?php echo $value['qId']; ?></h4>
			<b class="text-info"><?php echo $value['que_desc'] ?></b>
			<br/>
			<input type="hidden" name="quesno<?php echo $con ?>" value="<?php echo $value['qId'] ?>">
			<input type="hidden" name="answ<?php echo $con ?>" value="<?php echo $value['ans'] ?>">
			<input type="hidden" name="status" value="1">
			<label class="radio inline">
			<input type="radio" val="<?php echo $con ?>" value="A" name="question<?php echo $con; ?>">
			<b class="text-error">A.</b>
			<a class="text-success"><?php echo $value['option1'] ?></a>
			</label>
			<br/>
			<label class="radio inline">
			<input type="radio" val="<?php echo $con ?>" value="B" name="question<?php echo $con; ?>">
			<b class="text-error">B.</b>	
			<a class="text-success">
			<?php echo $value['option2'] ?>
			</a>
			</label>
			<br/>
			<label class="radio inline">
			<input type="radio" val="<?php echo $con ?>" value="C" name="question<?php echo $con; ?>">
			<b class="text-error">C.</b>
			<a class="text-success">
			<?php echo $value['option3'] ?>
			</a>
			</label>
			<br/>
			<label class="radio inline">
			<input type="radio" val="<?php echo $con ?>" value="D" name="question<?php echo $con; ?>">
			<b class="text-error">D.</b>
			<a class="text-success">
			<?php
				echo $value['option4']
			?>
			</a>
			</label>
			<br/>
			<br/>
		</div>
<?php
		$con++;
		$count++;
		}
	}
?>

<input align="left" type="button" style=" <?php if($row==1)echo 'display: none';?>" class="qus_previous btn btn-warning" onclick="Changetoprev();" value="Previous"/>
<input align="left" type="button" style=" <?php if($row==1)echo 'display: none';?>" class="qus_next btn btn-success" onclick="Changetonext();" value="Next"/>
<br/>
<br/>
<input align="left" type="submit" class="btn" name="finish" value="Finish" onClick="timeTaken();"/>
</div>
<input type="hidden" name="totalquestion" value="<?php echo 'totalquestion'; ?>">
</form>
</body>
<script language="javascript">
	function clock()
	{
        var time=new Date()
        var hr=time.getHours()
        var min=time.getMinutes()
        var sec=time.getSeconds()
        document.f.examend.value = hr + ":" + min + ":" + sec
        setTimeout("clock()", 1000)
    }
    window.onload=clock;

</script>
<script type="text/javascript">
	$(document).ready(function()
	{
		clock();
		Changetoprev();
		init();
	});
	$(document).on('keydown',function(e)
	{
		e.preventDefault();
	});

	$(document).bind("contextmenu",function(e)
	{
		return false;
	});
	//============== next click====================================
	function Changetonext()
	{
		var current = $(".inner-div:visible");
        checkunclick();//if current question is not checked
        //        $('.goto[val="' + cr + '"]').addClass("btn btn-primary");
        $('.inner-div').each(function()
		{
			if($(this).is(':visible'))
			{
				if($(this).next('.inner-div').length > 0)
				{
					current.hide().next().show();
					//will show next div
					//var cr=current.hide().next().attr("val")
                    //$('.goto[val="' + cr + '"]').addClass("btn btn-primary");
					$('.qus_previous').show();
				}
				else
				{
					$('.qus_next').hide();
				}
			}
        });
    }
    //============== next click====================================
	function Changetoprev()
	{
		checkunclick();//if current question is not checked
		var current = $(".inner-div:visible");
		$('.inner-div').each(function()
		{
			if($(this).is(':visible'))
			{
                //                var cr=$(this).attr("val");
                //            $('.goto[val="' + cr + '"]').addClass("btn btn-primary");
                if ($(this).prev('.inner-div').length > 0)
				{
                    current.hide().prev().show();//to show previous
                    if($(".inner-div:first").attr("val") ==  $(".inner-div:visible").attr("val"))
					{
                        $('.qus_next').show();
                        $('.qus_previous').hide();
                    }
					else
					{
                        $('.qus_next').show();
                        // $('.qus_previous').hide();
                    }
                    //   alert($(".inner-div:visible").attr("val"));
               
                    
                }else{
                    if($(".inner-div:first").attr("val") ==  $(".inner-div:visible").attr("val")){
                        $('.qus_previous').hide();
                    }else{
                        $('.qus_next').show();
                        $('.qus_previous').hide();
                    }
                      
                }
            }
        });
    }
    //=====================================================
	function Changetotab(st)
	{
		var tobehide = $(".inner-div:visible");
		tobehide.hide();
		var at=st;

		var tobeshow=$('.inner-div[val="' + at + '"]');
		tobeshow.show();
		if($(".inner-div:visible").prev('.inner-div').length > 0)
		{
			if($(".inner-div:last").attr("val") == $(".inner-div:visible").attr("val"))
			{
				$('.qus_next').hide();
				$('.qus_previous').show();
			}
			else
			{
				$('.qus_next').show();
				$('.qus_previous').show();
			}
		}
		else
		{
			$('.qus_next').show();
			$('.qus_previous').hide();
		}
	}
</script>

<script type="text/javascript">
    //====================================================================
    function review(){ //if review button is is click change color of button
        var current = $(".inner-div:visible");
        var cr = current.attr("val");
        if($('.goto[val="' + cr + '"]').attr("class") =="btn goto btn-success"){
            
        }else{
            $('.goto[val="' + cr + '"]').removeClass().addClass("btn goto btn btn-warning");
        }
    }
    //=======================if radio is not checked=============================================
    function checkunclick(){ //if radio is not checked
        var current = $(".inner-div:visible");
        var cr = current.attr("val");
        if($('.goto[val="' + cr + '"]').attr("class") =="btn goto"){
            $('.goto[val="' + cr + '"]').addClass("btn btn-danger");
        }else{
          
        }
         
        return;
    }
    //==================================================================
    $("input[type='radio']").click(function() {
        var cr = $(this).attr("val");
        $('.goto[val="' + cr + '"]').addClass("btn btn-success"); //if radio is click change color of button
    });
</script>
<script type="text/javascript">
	var hoursLabel = document.getElementById("hours");
	var minutesLabel = document.getElementById("minutes");
	var secondsLabel = document.getElementById("seconds");
	var totalSeconds = 0;
	setInterval(setTime, 1000);
	function setTime()
	{
		++totalSeconds;
		secondsLabel.innerHTML = pad(totalSeconds%60);
		minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
		hoursLabel.innerHTML = pad(parseInt(totalSeconds/3600));
	}
	function pad(val)
	{
		var valString = val + "";
		if(valString.length < 2)
		{
			return "0" + valString;
		}
		else
		{
			return valString;
		}
	}
	function timeTaken()
	{
		document.getElementById('hrs').value=pad(parseInt(totalSeconds/3600));
		document.getElementById('mins').value=pad(parseInt(totalSeconds/60));
		document.getElementById('secs').value=pad(totalSeconds%60);
	}
</script>
</html>