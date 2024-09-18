<?php
	session_start();
	include 'classes/Config.php';	
	$conn=new Config;
	$con=$conn->createCon();
	$msg="";
	if(isset($_REQUEST['save']))
	{
		$candName=$_REQUEST['candName'];
		$dob=$_REQUEST['dob'];
		$fName=$_REQUEST['f_name'];
		$mName=$_REQUEST['m_name'];
		
		$candMob=$_REQUEST['candMob'];
		
		//$module=6;
		$module=$_REQUEST['module'];
		//$course=$_REQUEST['course'];
		$category=$_REQUEST['category'];
		$gender=$_REQUEST['gender'];
		$edate=date("d-m-Y");
		
		$length = 4;
		$characters = "0123456789";
		$string = '';
		for($i=0;$i<$length;$i++)
		{
			$index=mt_rand(0,strlen($characters)-1);
			$string.=$characters[$index];
		}
		$userid=date('ymd').$string;
		$sql1="Select * from user_master where Formno='".$userid."'";
		$res1=mysqli_query($con,$sql1);
		if(mysqli_num_rows($res1)==0)
		{
		//$sql="Insert into user_master(SName,userid,password,reg_no,Contact_no,module,DOB,FName,S_mother,lock_login,Exam_name) values('".$candName."','".$userid."','".$userid."','".$userid."','".$candMob."','".$module."','".$dob."','".$fName."','".$mName."','N','".$course."')";
		$sql="Insert into user_master(SName,userid,password,reg_no,Contact_no,module,DOB,FName,S_mother,lock_login,Gender,Category,exam_date) values('".$candName."','".$userid."','0','".$userid."','".$candMob."','".$module."','".$dob."','".$fName."','".$mName."','N','".$gender."','".$category."','".$edate."')";
		//echo $sql;
		mysqli_query($con,$sql);
		header("location:index.php?un=".$userid);
		}
		else
		{
			$msg="Try again !!!";
		}
		//echo 'Username = '.$userid;
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<title> Candidate Registration Form</title>
</head>

<body>
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
        		<?php include 'common/header.html';?>
			</div>
            <div class="col-md-4"></div>
            <div class="col-md-4">				
				<h3 align="center">Candidate Registration Form</h3>
				<form role="form" action="" method="post">
                <div class="row">
					<div class="form-group col-lg-12">
				<input type="text" class="form-control" name="candName" placeholder="Candidate Full Name" title="Enter your name"  required onKeyPress="javascript:return isAlpha(event);">
					</div>
                </div>
                <div class="row">
					<div class="form-group col-lg-12">
				<input type="text" class="form-control" name="dob" maxlength="10" placeholder="Date Of Birth (DD-MM-YYYY)" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])[-](0[1-9]|1[012])[-][0-9]{4}" title="Please enter DOB in DD-MM-YYYY Format" required >
					</div>
                </div>
                <div class="row">
					<div class="form-group col-lg-12">
				<input type="text" class="form-control" name="f_name" placeholder="Father's Name" title="Enter your Father's name" required onKeyPress="javascript:return isAlpha(event);">
					</div>
                </div>
                <div class="row">
					<div class="form-group col-lg-12">
				<input type="text" class="form-control" name="m_name" placeholder="Mother's Name" title="Enter your Mother's name" required onKeyPress="javascript:return isAlpha(event);">
					</div>
                </div>
                
                <div class="row">
                	<div class="form-group col-lg-12">
				<input type="text" class="form-control" name="candMob" placeholder="10 Digit Mobile No." title="Enter 10 digit mobile number " required pattern="[6789][0-9]{9}" onKeyPress="javascript:return isNumber(event);" maxlength="10">
					</div>
                </div>
               <div class="row">
                	<div class="form-group col-lg-12">
                		<select class="form-control" name="category" required title="Select Category from list">
                		<option selected value="">Select Category</option>
                    	<option value="GEN">General</option>
						<option value="OBC">OBC</option>
						<option value="SC">SC</option>
						<option value="ST">ST</option>
						<option value="Minority">Minority</option>
                		</select>
					</div>
                </div>
				<div class="row">
                	<div class="form-group col-lg-12">
                		<select class="form-control" name="gender" required title="Select Gender from list">
                		<option selected value="">Select Gender</option>
                    	<option value="M">MALE</option>
						<option value="F">FEMALE</option>
						<option value="O">OTHER</option>
						
                		</select>
					</div>
                </div>
                <div class="row">
                <div class="form-group col-lg-12">
				<select class="form-control" name="module" required title="Select Your Exam">
                	<option selected value="">Select Exam</option>
<?php
$mod="Select * from module where `module_description`";
$resMod=mysqli_query($con,$mod);
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
                
                <div class="row">
                	<div class="form-group col-lg-12" style="text-align:center;">

                <button type="submit" class="btn btn-primary" name="save">Save</button>
				
                	</div>
                </div>
                <div class="row">
                	<div class="form-group" style="color:#F00;">
					<b><?php echo $msg;?></b>
                	</div>
                </div>
				</form>
			</div>            
		</div>     
		 </div>
          
            <div class="col-md-12" style="background:#ffab62;width:100%;height:25px;position:absolute;top:100%;left:0;">
		
				<?php include 'common/footer.html';?>
			</div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
<script type="text/javascript">
	function getCenter(value)
	{
		if(value=='addNewCenter')
		{
			document.getElementById('address').style.display='block';
		}
		if(value!='addNewCenter')
		{
			document.getElementById('address').style.display='none';
		}
		if(value=='')
		{
			alert('Select Center Address');
		}
	}
	 // WRITE THE VALIDATION SCRIPT IN THE HEAD TAG.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    } 
function isAlpha(evt) {
        var k = (evt.which) ? evt.which : evt.keyCode
        if (!((k>64 && k<91)||(k>96 && k<123) || (k==32) || (k==8) || (k==127)))
            return false;

        return true;
    }    	
</script>
</script>
</body>
</html>